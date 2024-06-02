<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Banner;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = banner::all();

        return view('masterdata.banner.list',compact('data'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('masterdata.banner.create');
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
        if ($request->file('file')) {
            $file = $request->file('file');
            $path = $file->store('banner', 'public');
            $data['file'] = $path;
        }
        $create = Banner::create($data);
        return back()->with('success', 'Peserta didik berhasil ditambahkan');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(string $id)
    {
        $data = banner::findOrFail($id);

        return view('masterdata.banner.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->updateValidate($request);

        $data = $request->all();
        if ($request->file('file')) {
            $file = $request->file('file');
            $path = $file->store('banner', 'public');
            $data['file'] = $path;
        }

        return $this->atomic(function () use ($data, $id) {
            $update = banner::findOrFail($id)->update($data);
            
            return redirect()->route('banner.index')->with('success', 'Data Berhasil di Ubah');
        });
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            return $this->atomic(function () use ($id) {
                $delete = Banner::find($id)->delete();

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
            'title'     => 'required',
            'status'   => 'required',
            'type'   => 'required',
            'image' =>'file|mimes:svg,jpg,jpeg,png|max:2048',
        ]);

        return $validate;
    }

    public function updateValidate(Request $request)
    {
        $validate = $request->validate([
            'title'     => 'required',
            'status'   => 'required',
            'type'   => 'required',
            'image' =>'file|mimes:svg,jpg,jpeg,png|max:2048',
        ]);

        return $validate;
    }

    public function show($id)
    {
        $data = banner::findOrFail($id);

        return view('masterdata.banner.detail', compact('data'));
    }
}