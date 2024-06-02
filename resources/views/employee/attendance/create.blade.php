@extends('employee.layout')
@section('title', 'Add Employee Attendance')
@section('content')
    <div class="container-fluid">
    	<div class="page-header">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        <i class="ik ik-headphones bg-blue"></i>
                        <div class="d-inline">
                            <h5>Add Employee Attendance</h5>
                            <span>Add new Employee in Employee Attendance</span>
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
                                <a href="#">Add Employee Attendance</a>
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
                        <form class="forms-sample" method="POST" action="{{ route('emAttendance.store') }}" enctype="multipart/form-data">
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
                                        <label for="">Clock In<span class="text-red">*</span></label>
                                        <input id="" type="datetime-local" class="form-control" name="clock_in" value="" placeholder="Enter Clock In" >
                                    </div>
                                    <div class="form-group">
                                        <label>Clock In Photo</label>
                                        <input type="file" class="form-control" name="clock_in_photo">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Clock In Long<span class="text-red">*</span></label>
                                        <input id="" type="text" class="form-control" name="clock_in_long" value="" placeholder="Enter Clock In Long" required="">
                                    <div class="help-block with-errors"></div>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Clock In Lat<span class="text-red">*</span></label>
                                        <input id="" type="text" class="form-control" name="clock_in_lat" value="" placeholder="Enter Clock In Lat" required="">
                                    <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="">Clock Out<span class="text-red">*</span></label>
                                        <input id="" type="datetime-local" class="form-control" name="clock_out" value="" placeholder="Enter Clock Out">
                                    </div>
                                    <div class="form-group">
                                        <label>Clock In Photo</label>
                                        <input type="file" class="form-control" name="clock_out_photo">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Clock out Long<span class="text-red">*</span></label>
                                        <input id="" type="text" class="form-control" name="clock_out_long" value="" placeholder="Enter Clock out Long" required="">
                                    <div class="help-block with-errors"></div>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Clock out Lat<span class="text-red">*</span></label>
                                        <input id="" type="text" class="form-control" name="clock_out_lat" value="" placeholder="Enter Clock Out Lat" required="">
                                    <div class="help-block with-errors"></div>
                                    </div>
                                    <div class="form-group">
                                        <label>Status</label>
                                        <select class="form-control" name="status" >
                                            <option selected="selected" value="" >Select status</option>
                                                <option value="1">On Time</option>
                                                <option value="2">Half Day</option>
                                                <option value="3">Zero Wage</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Platform<span class="text-red">*</span></label>
                                        <input id="" type="text" class="form-control" name="platform" value="" placeholder="Web, Mobile" required="">
                                    <div class="help-block with-errors"></div>
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
