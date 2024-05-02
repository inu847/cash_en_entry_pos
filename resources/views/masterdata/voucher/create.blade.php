@extends('layouts.main')
@section('title', 'Add voucher')
@section('content')
    <div class="container-fluid">
    	<div class="page-header">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        <i class="ik ik-headphones bg-blue"></i>
                        <div class="d-inline">
                            <h5>Add Voucher</h5>
                            <span>Add new Banner in Master Data</span>
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
                                <a href="#">Add Banner</a>
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
                        <form class="forms-sample" method="POST" action="{{ route('voucher.store') }}" enctype="multipart/form-data">
                        @csrf

                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="title">Code<span class="text-red">*</span></label>
                                        <input id="code" type="text" class="form-control" name="code" value="" placeholder="Enter product code" required="">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                    <div class="form-group">
                                        <label>Description</label>
                                        <textarea name="description" class="form-control html-editor h-205" rows="10"></textarea>
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                 <div class="form-group">
                                        <label>Product image</label>
                                        <input type="file" class="form-control" name="file">
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
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="sku">Max-Qty<span class="text-red">*</span></label>
                                        <input id="max_qty" type="number" class="form-control" name="max_qty" value="" placeholder="Enter Qty" required="">
                                        <div class="help-block with-errors"></div>
                                    </div>

                                    <div class="form-group">
                                        <label for="discount">Discount<span class="text-red">*</span></label>
                                        <input id="discount" type="number" class="form-control" name="discount" value="" placeholder="Enter Product Discount" required="">
                                        <div class="help-block with-errors"></div>
                                    
                                    <div class="form-group">
                                        <label for="tittle">Tittle<span class="text-red">*</span></label>
                                        <input id="tittle" type="text" class="form-control" name="title" value="" placeholder="Enter Product Title" required="">
                                        <div class="help-block with-errors"></div>
                                    </div>

                                    <div class="form-group">
                                        <label for="expired-at">Expired At<span class="text-red">*</span></label>
                                        <input id="expired-at" type="date" class="form-control" name="expired_at" value="" required="">
                                        <div class="help-block with-errors"></div>
                                    </div>

                                    <div class="form-group">
                                        <label for="started_at">Started At<span class="text-red">*</span></label>
                                        <input id="started-at" type="date" class="form-control" name="started_at" value="" required="">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                    <div class="form-group">
                                        <label for="sku">URL<span class="text-red">*</span></label>
                                        <input id="sku" type="text" class="form-control" name="url" value="" placeholder="Enter Product url" required="">
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
