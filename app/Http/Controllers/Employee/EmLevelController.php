<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Employee\EmployeeLevel;
use App\Models\Bussiness;
use App\Models\Employee\Employee;

class EmLevelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = EmployeeLevel::all();
        return view('employee.level.list',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = view('employee.level.create',[
            'bussiness' => Bussiness::all(),
        ])->render();
        return $data;
    }

    /**
     * Store a newly cr eated resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        if ($request->file('image')) {
            $file = $request->file('image');
            $path = $file->store('position', 'public');
            $data['image'] = $path;
        }
        $create = EmployeeLevel::create($data);
        return back()->with('success', 'Data berhasil ditambahkan');
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
        $isi = EmployeeLevel::findOrFail($id);
        $data = view('employee.level.edit',[
            'data' => $isi,
            'bussiness' => Bussiness::all(),
        ])->render();
        return $data;
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
            $path = $file->store('position', 'public');
            $data['image'] = $path;
        }

        return $this->atomic(function () use ($data, $id) {
            $update = EmployeeLevel::findOrFail($id)->update($data);
            
            return redirect()->route('emLevel.index')->with('success', 'Data Berhasil di Ubah');
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
                $delete = EmployeeLevel::find($id)->delete();

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
            'from'   => 'required',
            'until'   => 'required',
            'bussiness_id'   => 'required',
            'image' =>'file|mimes:svg,jpg,jpeg,png|max:2048',
        ]);

        return $validate;
    }

    public function updateValidate(Request $request)
    {
        $validate = $request->validate([
            'name'     => 'required',
            'from'   => 'required',
            'until'   => 'required',
            'bussiness_id'   => 'required',
            'image' =>'file|mimes:svg,jpg,jpeg,png|max:2048',
        ]);

        return $validate;
    }
    }
