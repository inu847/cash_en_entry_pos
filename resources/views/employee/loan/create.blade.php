@extends('employee.layout')
@section('title', 'Add Employee Loan')
@section('content')
    <div class="container-fluid">
    	<div class="page-header">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        <i class="ik ik-headphones bg-blue"></i>
                        <div class="d-inline">
                            <h5>Add Employee Loan</h5>
                            <span>Add new Employee in Employee Loan</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <nav class="breadcrumb-container" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="/dashboard"><i class="ik ik-home"></i></a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="#">Add Employee Loan</a>
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card ">
                    <div class="card-body">
                        <form class="forms-sample" method="POST" action="{{ route('emLoan.store') }}" enctype="multipart/form-data">
                        @csrf
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Employee Name</label>
                                        <select class="form-control" name="employee_id" >
                                            <option selected="selected" value="" >Select Position</option>
                                            @foreach ($employee as $value)
                                                <option value="{{$value->id}}">{{$value->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Bussiness</label>
                                        <select class="form-control" name="bussiness_id" >
                                            <option selected="selected" value="" >Select Bussiness</option>
                                            @foreach ($bussiness as $value)
                                                <option value="{{$value->id}}">{{$value->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Loan Number<span class="text-red">*</span></label>
                                        <input id="" type="text" class="form-control" name="loan_number" value="" placeholder="Enter Loan Number" required="">
                                    <div class="help-block with-errors"></div>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Loan Date<span class="text-red">*</span></label>
                                        <input id="" type="date" class="form-control" name="loan_date" value="" placeholder="Enter Loan Date" required="">
                                    <div class="help-block with-errors"></div>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Loan Amount<span class="text-red">*</span></label>
                                        <input id="" type="number" class="form-control" name="loan_amount" value="" placeholder="Enter Loan Amount">
                                    </div>
                                    <div class="form-group">
                                        <label>Repayment Type</label>
                                        <select class="form-control" name="repayment_type" >
                                            <option selected="selected" value="" >Select Type</option>
                                                <option value="1">Full Repayment</option>
                                                <option value="2">Installment</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Repayment Term</label>
                                        <select class="form-control" name="repayment_term" >
                                            <option selected="selected" value="" >Select Term</option>
                                                <option value="1">Weekly</option>
                                                <option value="2">Monthly</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Installment Amount<span class="text-red">*</span></label>
                                        <input id="" type="number" class="form-control" name="installment_amount" value="" placeholder="Enter Installment Amount">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Approved By<span class="text-red">*</span></label>
                                        <input id="" type="text" class="form-control" name="approved_by" value="" placeholder="Approved By" required="">
                                    <div class="help-block with-errors"></div>
                                    </div>

                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="">Approved At<span class="text-red">*</span></label>
                                        <input id="" type="date" class="form-control" name="approved_at" value="" placeholder="" required="">
                                    <div class="help-block with-errors"></div>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Declined by<span class="text-red">*</span></label>
                                        <input id="" type="text" class="form-control" name="declined_by" value="" placeholder="Declined by" required="">
                                    <div class="help-block with-errors"></div>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Declined At<span class="text-red">*</span></label>
                                        <input id="" type="date" class="form-control" name="declined_at" value="" placeholder="" required="">
                                    <div class="help-block with-errors"></div>
                                    </div>
                                    <div class="form-group">
                                        <label>Loan Status</label>
                                        <select class="form-control" name="loan_status" >
                                            <option selected="selected" value="" >Select status</option>
                                                <option value="1">Waiting Approval</option>
                                                <option value="2">Approved</option>
                                                <option value="3">Rejected</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Repayment Status</label>
                                        <select class="form-control" name="repayment_status" >
                                            <option selected="selected" value="" >Select Repaymen status</option>
                                                <option value="1">None</option>
                                                <option value="2">On Going</option>
                                                <option value="3">Paid</option>
                                                <option value="4">Canceled</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Reason</label>
                                        <textarea name="reason" class="form-control h-205" rows="5"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Description</label>
                                        <textarea name="description" class="form-control h-205" rows="5"></textarea>
                                    </div>

                                    <div class="form-group text-right">
                                        <button type="submit" class="btn btn-primary">Save</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
