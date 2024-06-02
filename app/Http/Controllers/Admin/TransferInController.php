<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ingredient;
use App\Models\Warehouse;
use App\Models\Bussiness;
use App\Models\Product;
use App\Models\Stock;
use Illuminate\Support\Facades\Auth;

class TransferInController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Stock::where('bussiness_id', Auth::user()->bussiness_id)->where('type',3)->get();

        return view('masterdata.stock.transferIn.list',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = view('masterdata.stock.transferIn.create',[
            'product' => Product::all(),
            'ingredient' => Ingredient::all(),
            'fromwarehouse' => Warehouse::all(),
            'towarehouse' => Warehouse::all(),
        ])->render();
        return $data;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        if ($request->file('image')) {
            $file = $request->file('image');
            $path = $file->store('transferIn', 'public');
            $data['image'] = $path;
        }

        $create = Stock::create($data);
        return back()->with('success', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(string $id)
    {
        $data = view('masterdata.stock.transferIn.edit',[
            'data' => Stock::findOrFail($id),
            'product' => Product::all(),
            'ingredient' => Ingredient::all(),
            'fromwarehouse' => Warehouse::all(),
            'towarehouse' => Warehouse::all(),
        ])->render();
        return $data;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->updateValidate($request);
        if ($request->file('image')) {
            $file = $request->file('image');
            $path = $file->store('transferIn', 'public');
            $data['image'] = $path;
        }

        $data = $request->all();

        return $this->atomic(function () use ($data, $id) {
            $update = Stock::findOrFail($id)->update($data);
            
            return redirect()->route('transferIn.index')->with('success', 'Data Berhasil di Ubah');
        });
    }

    /**
     * Remove the specified resource from storage.  
     */ 
    public function destroy($id)
    {
        try {
            return $this->atomic(function () use ($id) {
                $delete = Stock::find($id)->delete();

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
            'bussiness_id'     => 'required',
            'pic'   => 'required',
            'pic_phone'   => 'required',
            'send_by'   => 'required',
            'received_by'   => 'required',
            'type'   => 'required',
            'qty'   => 'required',
        ]);

        return $validate;
    }

    public function updateValidate(Request $request)
    {
        $validate = $request->validate([
            'pic'   => 'required',
            'pic_phone'   => 'required',
            'send_by'   => 'required',
            'received_by'   => 'required',
            'qty'   => 'required',
        ]);

        return $validate;
    }
}