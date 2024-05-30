@extends('layouts.main')
@section('title', 'Add Manage Table')
@section('content')
    <div class="container-fluid">
    	<div class="page-header">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        <i class="ik ik-headphones bg-blue"></i>
                        <div class="d-inline">
                            <h5>Manage Table</h5>
                            <span>Managemen Data Table</span>
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
                                <a href="#">Managemen Data</a>
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
                        <form class="forms-sample" method="POST" action="{{ route('manageTable.store') }}" enctype="multipart/form-data">
                        @csrf

                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="number">Number<span class="text-red">*</span></label>
                                        <input id="number" type="number" class="form-control" name="number" value="" placeholder="Enter number" required="">
                                        <div class="help-block with-errors"></div>
                                    </div>

                                    <div class="form-group">
                                        <label for="capacity">Capacity<span class="text-red">*</span></label>
                                        <input id="capacity" type="number" class="form-control" name="capacity" value="" placeholder="Enter number" required="">
                                        <div class="help-block with-errors"></div>
                                    </div>

                                    <div class="form-group">
                                        <label>Status</label>
                                        <select class="form-control" name="status" >
                                            <option selected="selected" value="" >Select Status</option>
                                                <option value="1">Available</option>
                                                <option value="2">Reserved</option>
                                                <option value="3">Occupied</option>
                                                <option value="">Unavailable</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Bussiness Name</label>
                                        <select class="form-control" name="bussiness_id" >
                                            <option selected="selected" value="" >Select Bussiness Name</option>
                                            @foreach($bussiness as $value)
                                                <option value="{{$value->id}}">{{$value->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label>User</label>
                                        <select class="form-control" name="user_id" >
                                            <option selected="selected" value="" >Select User Name</option>
                                            @foreach($user as $value)
                                                <option value="{{$value->id}}">{{$value->name}}</option>
                                            @endforeach
                                        </select>
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
