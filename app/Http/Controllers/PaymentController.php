<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Payment::orderBy('id', 'desc')->get();

        return view('masterdata.payment.list', ['data' => $data]);
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
            if ($request->file('image')) {
                $file = $request->file('image');
                $path = $file->store('promo', 'public');
                $data['image'] = $path;
            }
            return $this->atomic(function () use ($data) {
                $create = Payment::create($data);
    
                return redirect()->route('payment.index')->with('success', 'Data berhasil di Tambahkan');
            });
        } catch (\Throwable $th) {
            return redirect()->route('payment.index')->with('danger', $th->getMessage());
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
        $data = Payment::findOrFail($id);

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
            $update = Payment::findOrFail($id)->update($data);
            
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
                $delete = Payment::find($id)->delete();

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
            'name'     => 'required',
            'status'   => 'required',
            'type'   => 'required',
            'image' =>'file|mimes:svg,jpg,jpeg,png|max:2048',
        ]);

        return $validate;
    }

    public function updateValidate(Request $request)
    {
        $validate = $request->validate([
            'name'     => 'required',
            'status'   => 'required',
            'type'   => 'required',
            'image' =>'file|mimes:svg,jpg,jpeg,png|max:2048',
        ]);

        return $validate;
    }
}
