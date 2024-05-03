<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\WhyShouldWe;

class WhyShouldWeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = WhyShouldWe::all();

        return view('masterdata.whyShouldWe.list',compact('data'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('masterdata.whyShouldWe.create');
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
            $path = $file->store('whyShouldWe', 'public');
            $data['image'] = $path;
        }
        $create = WhyShouldWe::create($data);
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
        $data = WhyShouldWe::findOrFail($id);

        return view('masterdata.whyShouldWe.edit', compact('data'));
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
            $path = $file->store('whyShouldWe', 'public');
            $data['image'] = $path;
        }

        return $this->atomic(function () use ($data, $id) {
            $update = WhyShouldWe::findOrFail($id)->update($data);
            
            return redirect()->route('whyShouldWe.index')->with('success', 'Data Berhasil di Ubah');
        });
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            return $this->atomic(function () use ($id) {
                $delete = WhyShouldWe::find($id)->delete();

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
            'description' => 'required',
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
            'description' => 'required',
            'status'   => 'required',
            'type'   => 'required',
            'image' =>'file|mimes:svg,jpg,jpeg,png|max:2048',
        ]);

        return $validate;
    }
}