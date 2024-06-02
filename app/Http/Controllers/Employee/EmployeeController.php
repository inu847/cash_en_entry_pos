<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Employee\Employee;
use App\Models\User;
use App\Models\Bussiness;
use App\Models\Employee\EmployeePosition;
use App\Models\Employee\EmployeeStatus;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = employee::all();

        return view('employee.employee.list',compact('data'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = view('employee.employee.create',[
            'user' => User::all(),
            'bussiness' => Bussiness::all(),
            'employee_position' => EmployeePosition::all(),
            'employee_status' => EmployeeStatus::all(),
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
            $path = $file->store('employee', 'public');
            $data['image'] = $path;
        }
        $create = employee::create($data);
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
        $isi = employee::findOrFail($id);
        $data = view('employee.employee.edit',[
            'data' => $isi,
            'user' => User::all(),
            'bussiness' => Bussiness::all(),
            'employee_position' => EmployeePosition::all(),
            'employee_status' => EmployeeStatus::all(),
        ])->render();
        return $data;
    }
    public function editt(string $id)
    {
        $data = view('employee.employee.create',[
            'user' => User::all(),
            'bussiness' => Bussiness::all(),
            'employee_position' => EmployeePosition::all(),
            'employee_status' => EmployeeStatus::all(),
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
            $path = $file->store('employee', 'public');
            $data['image'] = $path;
        }

        return $this->atomic(function () use ($data, $id) {
            $update = employee::findOrFail($id)->update($data);
            
            return redirect()->route('employee.index')->with('success', 'Data Berhasil di Ubah');
        });
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            return $this->atomic(function () use ($id) {
                $delete = employee::find($id)->delete();

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
            'email'   => 'required',
            'phone'   => 'required',
            'address'   => 'required',
            'start_date'   => 'required',
            'end_date'   => 'required',
            'employee_position_id'   => 'required',
            'bussiness_id'   => 'required',
            'employee_status_id'   => 'required',
            'user_id'   => 'required',
            'image' =>'file|mimes:svg,jpg,jpeg,png|max:2048',
        ]);

        return $validate;
    }

    public function updateValidate(Request $request)
    {
        $validate = $request->validate([
            'name'     => 'required',
            'email'   => 'required',
            'phone'   => 'required',
            'address'   => 'required',
            'start_date'   => 'required',
            'end_date'   => 'required',
            'employee_position_id'   => 'required',
            'bussiness_id'   => 'required',
            'employee_status_id'   => 'required',
            'user_id'   => 'required',
            'image' =>'file|mimes:svg,jpg,jpeg,png|max:2048',
        ]);

        return $validate;
    }
}