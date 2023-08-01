<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Warehouse;
use Illuminate\Http\Request;

class WarehoseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Warehouse::orderBy('created_at', 'desc')->get();

        return view('inventory.warehouse.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $parent_category = Warehouse::orderBy('title', 'desc')->get();

        return view('inventory.warehouse.create', compact('parent_category'));
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
            $path = $file->store('inventory/warehouse', 'public');
            $data['image'] = $path;
        }
        $data['user_id'] = auth()->user()->id;
        $create = Warehouse::create($data);

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
        $data = Warehouse::findOrFail($id);
        $parent_category = Warehouse::whereNot('id', $data->id)->orderBy('title', 'desc')->get();

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
            $path = $file->store('inventory/warehouse', 'public');
            $data['image'] = $path;
        }
        $update = Warehouse::findOrFail($id)->update($data);

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
        $destroy = Warehouse::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Berhasil hapus data!');
    }
}
