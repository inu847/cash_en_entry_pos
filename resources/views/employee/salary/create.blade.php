@extends('employee.layout')
@section('title', 'Add Employee Salary')
@section('content')
    <div class="container-fluid">
    	<div class="page-header">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        <i class="ik ik-headphones bg-blue"></i>
                        <div class="d-inline">
                            <h5>Add Employee Salary</h5>
                            <span>Add new Salary in Employee</span>
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
                                <a href="#">Add Employee Salary</a>
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
                        <form class="forms-sample" method="POST" action="{{ route('emSalary.store') }}" enctype="multipart/form-data">
                        @csrf
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Bussiness Name</label>
                                        <select class="form-control" name="bussiness_id" >
                                            <option selected="selected" value="" >Select Bussiness</option>
                                            @foreach ($bussiness as $value)
                                                <option value="{{$value->id}}">{{$value->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Employee</label>
                                        <select class="form-control" name="employee_id" >
                                            <option selected="selected" value="" >Select Employee</option>
                                            @foreach ($employee as $value)
                                                <option value="{{$value->id}}">{{$value->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Status</label>
                                        <select class="form-control" name="status" >
                                            <option selected="selected" value="" >Select status</option>
                                                <option value="1">Active</option>
                                                <option value="2">Inactive</option>
                                        </select>
                                    </div>
                                        <div class="form-group">
                                            <label>Type</label>
                                            <select class="form-control" name="type" >
                                                <option selected="selected" value="" >Select Type</option>
                                                    <option value="1">Basic</option>
                                                    <option value="2">Bonus</option>
                                                    <option value="3">Allowance</option>
                                                    <option value="4">Deduction</option>
                                                    <option value="5">Over Time</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Amount<span class="text-red"></span></label>
                                            <input id="" type="number" class="form-control" name="amount" value="" placeholder="Enter Amount" required="">
                                        <div class="help-block with-errors"></div>
                                        </div>
    
                                    </div>
                                    <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="">Date<span class="text-red"></span></label>
                                        <input id="" type="date" class="form-control" name="date" value="" placeholder="Enter Date" required="">
                                    <div class="help-block with-errors"></div>
                                    </div>
                                    <div class="form-group">
                                        <label>Note</label>
                                        <textarea name="notes" class="form-control html-editor h-205" rows="10"></textarea>
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
