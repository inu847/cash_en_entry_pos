@extends('layouts.main')
@section('title', 'Add Product Instruction')
@section('content')
    <div class="container-fluid">
    	<div class="page-header">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        <i class="ik ik-headphones bg-blue"></i>
                        <div class="d-inline">
                            <h5>Add Product Instruction</h5>
                            <span>Add new Instruction in Master Data</span>
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
                                <a href="#">Add Instruction</a>
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
                        <form class="forms-sample" method="POST" action="{{ route('productInstruction.store') }}" enctype="multipart/form-data">
                        @csrf

                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="instruction">Instruction<span class="text-red">*</span></label>
                                        <input id="instruction" type="text" class="form-control" name="instruction" value="" placeholder="Enter product code" required="">
                                        <div class="help-block with-errors"></div>
                                    </div>

                                    <div class="form-group">
                                        <label>Type</label>
                                        <select class="form-control" name="type" >
                                            <option selected="selected" value="" >Select type</option>
                                                <option value="1">Required</option>
                                                <option value="2">Optional</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Product Name</label>
                                        <select class="form-control" name="product_id" >
                                            <option selected="selected" value="" >Select Product</option>
                                            @foreach($product as $value)
                                                <option value="{{$value->id}}">{{$value->title}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label>Ingredient Name</label>
                                        <select class="form-control" name="ingredient_id" >
                                            <option selected="selected" value="" >Select Ingredient</option>
                                            @foreach($ingredient as $value)
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
