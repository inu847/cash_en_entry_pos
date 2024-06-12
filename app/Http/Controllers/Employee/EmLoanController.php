<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Employee\EmployeeLoan;
use App\Models\Employee\Employee;
use App\Models\Bussiness;
use Barryvdh\DomPDF\Facade\Pdf;

class EmLoanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = EmployeeLoan::all();

        return view('employee.loan.list',compact('data'));
    }

    public function createPDF($id)
    {
        // retreive all records from db
        $data = EmployeeLoan::find($id)->repayment()->get();
        return Pdf::loadView('employee.loan.repaymentpdf',compact('data'))->stream();
        
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = view('employee.loan.create',[
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
        if ($request->file('image')) {
            $file = $request->file('image');
            $path = $file->store('position', 'public');
            $data['image'] = $path;
        }
        $create = EmployeeLoan::create($data);
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
                
        $data = EmployeeLoan::findOrFail($id);

        return view('employee.loan.detail', compact('data'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $isi = EmployeeLoan::findOrFail($id);
        $data = view('employee.loan.edit',[
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
            $path = $file->store('position', 'public');
            $data['image'] = $path;
        }

        return $this->atomic(function () use ($data, $id) {
            $update = EmployeeLoan::findOrFail($id)->update($data);
            
            return redirect()->route('emLoan.index')->with('success', 'Data Berhasil di Ubah');
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
                $delete = EmployeeLoan::find($id)->delete();

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
            'bussiness_id'   => 'required',
            'employee_id'   => 'required',
            'loan_amount'     => 'required',
            'loan_status'   => 'required',
            'repayment_status'   => 'required',
        ]);

        return $validate;
    }

    public function updateValidate(Request $request)
    {
        $validate = $request->validate([
            'bussiness_id'   => 'required',
            'employee_id'   => 'required',
            'loan_amount'     => 'required',
            'loan_status'   => 'required',
            'repayment_status'   => 'required',
        ]);

        return $validate;
    }

}