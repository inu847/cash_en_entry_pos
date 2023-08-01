<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProductCategory;
use Illuminate\Http\Request;

class ProductCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = ProductCategory::orderBy('created_at', 'desc')->get();

        return view('inventory.category.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $parent_category = ProductCategory::orderBy('name', 'desc')->get();

        return view('inventory.category.create', compact('parent_category'));
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
            $path = $file->store('inventory/category', 'public');
            $data['image'] = $path;
        }
        $data['user_id'] = auth()->user()->id;
        $data['code'] = 'CAT' . time();
        $create = ProductCategory::create($data);

        return redirect()->back()->with('success', 'Data berhasil di Tambahkan');
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
        $data = ProductCategory::findOrFail($id);
        $parent_category = ProductCategory::whereNot('id', $data->id)->orderBy('name', 'desc')->get();

        return view('inventory.category.edit', compact('data', 'parent_category'));
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
        $data = $request->all();
        if ($request->file('image')) {
            $file = $request->file('image');
            $path = $file->store('inventory/category', 'public');
            $data['image'] = $path;
        }
        $update = ProductCategory::findOrFail($id)->update($data);

        return redirect()->back()->with('success', 'Data Berhasil di Ubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $destroy = ProductCategory::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Berhasil hapus data!');
    }
}
