<?php

namespace App\Http\Controllers\Employee;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Employee\EmployeeAttendance;
use App\Models\Employee\Employee;
use App\Models\Bussiness;

class EmAttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = EmployeeAttendance::all();

        return view('employee.attendance.list', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = view('employee.attendance.create',[
            'bussiness' => Bussiness::all(),
            'employee' => Employee::all(),
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
        if ($request->file('clock_in_photo')) {
            $file = $request->file('clock_in_photo');
            $path = $file->store('attendace', 'public');
            $data['clock_in_photo'] = $path;
        }
        if ($request->file('clock_out_photo')) {
            $file = $request->file('clock_out_photo');
            $path = $file->store('attendace', 'public');
            $data['clock_out_photo'] = $path;
        }
        $create = EmployeeAttendance::create($data);
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
        
            $data = EmployeeAttendance::findOrFail($id);
            return view('employee.attendance.detail', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $isi = EmployeeAttendance::findOrFail($id);
        $data = view('employee.attendance.edit',[
            'data' => $isi,
            'bussiness' => Bussiness::all(),
            'employee' => Employee::all(),
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
        if ($request->file('clock_in_photo')) {
            $file = $request->file('clock_in_photo');
            $path = $file->store('attendace', 'public');
            $data['clock_in_photo'] = $path;
        }
        if ($request->file('clock_out_photo')) {
            $file = $request->file('clock_out_photo');
            $path = $file->store('attendace', 'public');
            $data['clock_out_photo'] = $path;
        }

        return $this->atomic(function () use ($data, $id) {
            $update = EmployeeAttendance::findOrFail($id)->update($data);
            
            return redirect()->route('emAttendance.index')->with('success', 'Data Berhasil di Ubah');
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
                $delete = EmployeeAttendance::find($id)->delete();

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
            //
        ]);

        return $validate;
    }

    public function updateValidate(Request $request)
    {
        $validate = $request->validate([
            //
        ]);

        return $validate;
    }

    }
