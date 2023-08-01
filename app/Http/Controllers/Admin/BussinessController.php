<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Bussiness;
use App\Models\User;
use Illuminate\Http\Request;

class BussinessController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Bussiness::orderBy('created_at', 'desc')->get();
        $user = User::orderBy('created_at', 'desc')->get();

        return view('bussiness', compact('data', 'user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $parent_category = Bussiness::orderBy('name', 'desc')->get();

        return view('bussiness', compact('parent_category'));
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
            $path = $file->store('bussiness', 'public');
            $data['image'] = $path;
        }
        $create = Bussiness::create($data);

        return redirect()->route('bussiness.index')->with('success', 'Data berhasil di Tambahkan');
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
        $data = Bussiness::findOrFail($id);
        $parent_category = Bussiness::whereNot('id', $data->id)->orderBy('name', 'desc')->get();

        return view('bussiness', compact('data', 'parent_category'));
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
            $path = $file->store('bussiness', 'public');
            $data['image'] = $path;
        }
        $update = Bussiness::findOrFail($id)->update($data);

        return redirect()->route('bussiness.index')->with('success', 'Data Berhasil di Ubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $destroy = Bussiness::findOrFail($id)->delete();
        return redirect()->route('bussiness.index')->with('success', 'Berhasil hapus data!');
    }
}
