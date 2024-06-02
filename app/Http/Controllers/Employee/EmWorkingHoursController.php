<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Employee\EmployeeWorkingHour;
use App\Models\Employee\Employee;
use App\Models\Bussiness;

class EmWorkingHoursController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = EmployeeWorkingHour::all();

        return view('employee.workingHours.list',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = view('employee.workingHours.create',[
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
        $create = EmployeeWorkingHour::create($data);
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
        $isi = EmployeeWorkingHour::findOrFail($id);
        $data = view('employee.workingHours.edit',[
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
        if ($request->file('image')) {
            $file = $request->file('image');
            $path = $file->store('employee', 'public');
            $data['image'] = $path;
        }

        return $this->atomic(function () use ($data, $id) {
            $update = EmployeeWorkingHour::findOrFail($id)->update($data);
            
            return redirect()->route('emWorkingH.index')->with('success', 'Data Berhasil di Ubah');
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
                    $delete = EmployeeWorkingHour::find($id)->delete();
    
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
                'employee_id'   => 'required',
                'bussiness_id'   => 'required',
                'date'   => 'required',
                'start_time'   => 'required',
                'end_time'   => 'required',
            ]);
    
            return $validate;
        }
    
        public function updateValidate(Request $request)
        {
            $validate = $request->validate([
                'employee_id'   => 'required',
                'bussiness_id'   => 'required',
                'date'   => 'required',
                'start_time'   => 'required',
                'end_time'   => 'required',
            ]);
    
            return $validate;
        }
    
    }
