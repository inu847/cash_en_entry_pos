<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\models\ProductInstruction;
use App\models\Product;
use App\models\Ingredient;
class ProductInstructionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = ProductInstruction::all();

        return view('masterdata.productInstruction.list',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = view('masterdata.productInstruction.create',[
            'product' => Product::all(),
            'ingredient' => Ingredient::all(),
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
        {
            $data = $request->all();
            $create = ProductInstruction::create($data);
            return back()->with('success', 'Data berhasil ditambahkan');
    
        }
    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(string $id)
    {
        $data = view('masterdata.productInstruction.edit',[
            'data' => ProductInstruction::findOrFail($id),
            'product' => Product::all(),
            'ingredient' => Ingredient::all(),
        ])->render();
        return $data;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->updateValidate($request);

        $data = $request->all();
        if ($request->file('image')) {
            $file = $request->file('image');
            $path = $file->store('productInstruction', 'public');
            $data['image'] = $path;
        }

        return $this->atomic(function () use ($data, $id) {
            $update = ProductInstruction::findOrFail($id)->update($data);
            
            return redirect()->route('productInstruction.index')->with('success', 'Data Berhasil di Ubah');
        });
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            return $this->atomic(function () use ($id) {
                $delete = ProductInstruction::find($id)->delete();

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
            'instruction'     => 'required',
            'type'   => 'required',
            'product_id'   => 'required',
        ]);

        return $validate;
    }

    public function updateValidate(Request $request)
    {
        $validate = $request->validate([
            'instruction'     => 'required',
            'type'   => 'required',
            'product_id'   => 'required',
        ]);

        return $validate;
    }
}