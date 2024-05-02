<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AskedQuestions;

class AskedQuestionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = AskedQuestions::all();

        return view('masterdata.askedQuestions.list',compact('data'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('masterdata.askedQuestions.create');
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
        $create = askedQuestions::create($data);
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
        $data = askedQuestions::findOrFail($id);

        return view('masterdata.askedQuestions.edit', compact('data'));
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
            $update = AskedQuestions::findOrFail($id)->update($data);
            
            return redirect()->route('askedQuestions.index')->with('success', 'Data Berhasil di Ubah');
        });
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            return $this->atomic(function () use ($id) {
                $delete = AskedQuestions::find($id)->delete();

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
            'question'     => 'required',
            'status'   => 'required',
            'type'   => 'required',
        ]);

        return $validate;
    }

    public function updateValidate(Request $request)
    {
        $validate = $request->validate([
            'question'     => 'required',
            'status'   => 'required',
            'type'   => 'required',
        ]);

        return $validate;
    }
}