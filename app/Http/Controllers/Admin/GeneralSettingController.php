<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\GeneralSetting;

class GeneralSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = GeneralSetting::first();

        return view('masterdata.generalSetting.list',compact('data'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function edit(string $id)
    {
        $data = GeneralSetting::findOrFail($id);

        return view('masterdata.generalSetting.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->updateValidate($request);

        $data = $request->all();
        if ($request->file('logo')) {
            $file = $request->file('logo');
            $path = $file->store('generalSetting', 'public');
            $data['logo'] = $path;
        }
        if ($request->file('favicon')) {
            $file = $request->file('favicon');
            $path = $file->store('generalSetting', 'public');
            $data['favicon'] = $path;
        }

        return $this->atomic(function () use ($data, $id) {
            $update = GeneralSetting::findOrFail($id)->update($data);
            
            return redirect()->route('generalSetting.index')->with('success', 'Data Berhasil di Ubah');
        });
    }
    public function updateValidate(Request $request)
    {
        $validate = $request->validate([
            'app_name'     => 'required',
            'phone'   => 'required',
            'email'   => 'required',
            'facebook'   => 'required',
            'twitter'   => 'required',
            'instagram'   => 'required',
            'whatsapp'   => 'required',
            'map'   => 'required',
        ]);

        return $validate;
    }
}