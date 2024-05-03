<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function index()
    {
        if (auth()->check()) {
            $data = Cart::where('user_id', auth()->user()->id)->orWhere('session_id', Session::getId())->get();
            $cartCount = count($data);
        }else{
            $data = Cart::where('session_id', Session::getId())->get();
            $cartCount = count($data);
        }

        return view('front.cart', ['data' => $data, 'cartCount' => $cartCount]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('masterdata.payment.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->storeValidate($request);

        try {
            $data = $request->all();

            $data['user_id'] = auth()->user()->id;
            $data['session_id'] = Session::getId();
            $data['price'] = 200000;
            // $data['price'] = Product::findOrFail($data['product_id'])->price ?? $data['price'];

            Session::put('cart', $data);

            return $this->atomic(function () use ($data) {
                $create = Cart::create($data);
                if (auth()->check()) {
                    $cartCount = Cart::where('user_id', auth()->user()->id)->orWhere('session_id', Session::getId())->count();
                }else{
                    $cartCount = Cart::where('session_id', Session::getId())->count();
                }

                return response()->json([
                    'status' => true,
                    'message' => 'Berhasil Di Tambahkan!',
                    'cartCount' => $cartCount
                ]);
            });
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage(),
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Cart::findOrFail($id);

        return view('masterdata.payment.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->updateValidate($request);

        $data = $request->all();
        if ($request->file('image')) {
            $file = $request->file('image');
            $path = $file->store('promo', 'public');
            $data['image'] = $path;
        }

        return $this->atomic(function () use ($data, $id) {
            $update = Cart::findOrFail($id)->update($data);
            
            return redirect()->route('payment.index')->with('success', 'Data Berhasil di Ubah');
        });
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            return $this->atomic(function () use ($id) {
                $delete = Cart::find($id)->delete();

                return response()->json([
                    'status' => true,
                    'message' => 'Data Berhasil Dihapus!',
                ]);
            });
        } catch (\Throwable $th) {
            return response()->json([
                'status' => true,
                'message' => 'Data Gagal Dihapus!',
            ]);
        }
    }

    public function storeValidate(Request $request)
    {
        $validate = $request->validate([
            'product_id'     => 'required',
        ]);

        return $validate;
    }

    public function updateValidate(Request $request)
    {
        $validate = $request->validate([
            'product_id'     => 'required',
        ]);

        return $validate;
    }
}
