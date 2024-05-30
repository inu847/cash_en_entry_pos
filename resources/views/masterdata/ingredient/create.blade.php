@extends('layouts.main')
@section('title', 'Add ingredient')
@section('content')
    <div class="container-fluid">
    	<div class="page-header">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        <i class="ik ik-headphones bg-blue"></i>
                        <div class="d-inline">
                            <h5>Add Ingredient</h5>
                            <span>Add new ingredient in Master Data</span>
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
                                <a href="#">Add Ingredient</a>
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
                        <form class="forms-sample" method="POST" action="{{ route('ingredient.store') }}" enctype="multipart/form-data">
                        @csrf

                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="name">Name<span class="text-red">*</span></label>
                                        <input id="name" type="text" class="form-control" name="name" value="" placeholder="Enter product name" required="">
                                        <div class="help-block with-errors"></div>
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
                                            <option selected="selected" value="" >Select type</option>
                                                <option value="1">Product</option>
                                                <option value="2">Service</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="qty">Qty<span class="text-red">*</span></label>
                                        <input id="qty" type="number" class="form-control" name="qty" value="" placeholder="Enter Qty" required="">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                  </div>

                                    
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Product image</label>
                                            <input type="file" class="form-control" name="image">
                                        </div>
                                        
                                        <div class="form-group">
                                            <label>Description</label>
                                            <textarea name="description" class="form-control html-editor h-205" rows="10"></textarea>
                                        </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="price">Price<span class="text-red">*</span></label>
                                        <input id="price" type="number" class="form-control" name="price" value="" placeholder="Enter Price" required="">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                    <div class="form-group">
                                        <label for="weight">Weight<span class="text-red">*</span></label>
                                        <input id="weight" type="number" class="form-control" name="weight" value="" placeholder="Enter Product Weight" required="">
                                        <div class="help-block with-errors"></div>
                                    </div>

                                    <div class="form-group">
                                        <label for="uom">Uom<span class="text-red">*</span></label>
                                        <input id="uom" type="text" class="form-control" name="uom" value="" required="">
                                        <div class="help-block with-errors"></div>
                                    </div>

                                    <div class="form-group">
                                        <label for="note">Note<span class="text-red">*</span></label>
                                        <input id="note" type="text" class="form-control" name="note" value="" required="">
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
