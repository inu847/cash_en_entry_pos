@extends('inventory.layout')
@section('title', 'Add Product')
@section('content')
    <div class="container-fluid">
    	<div class="page-header">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        <i class="ik ik-headphones bg-blue"></i>
                        <div class="d-inline">
                            <h5>Add Product</h5>
                            <span>Add new product in inventory</span>
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
                                <a href="#">Add Product</a>
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
                        <form class="forms-sample" method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data">
                        @csrf
                            <div class="row">
                                <div class="col-sm-6">

                                    <div class="form-group">
                                        <label for="title">Title<span class="text-red">*</span></label>
                                        <input id="title" type="text" class="form-control" name="title" value="" placeholder="Enter product title" required="">
                                    <div class="help-block with-errors"></div>

                                    </div>
                                    <div class="form-group">
                                        <label>Description</label>
                                        <textarea name="description" class="form-control html-editor h-205" rows="10"></textarea>
                                    </div>

                                    <div class="form-group">
                                        <label>Product Images</label>
                                        <input type="file" class="form-control" name="image">
                                    </div>

                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label>Warehouse</label>
                                        <select class="form-control" name="warehouse" >
                                            <option selected="selected" value="" >Select Warehouse</option>
                                            @foreach ($warehouse as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="sku">SKU<span class="text-red">*</span></label>
                                        <input id="sku" type="text" class="form-control" name="sku" value="" placeholder="Enter Product SKU" required="">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                    <div class="form-group">
                                        <label for="price">Price<span class="text-red">*</span></label>
                                        <input id="price" type="text" class="form-control" name="price" value="" placeholder="Enter product price" required="">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                    <div class="form-group">
                                        <label for="purchase_price">Purchase Price<span class="text-red">*</span></label>
                                        <input id="purchase_price" type="text" class="form-control" name="purchase_price" value="" placeholder="Enter product price" required="">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                    <div class="form-group">
                                        <label for="offer_price">Offer Price</label>
                                        <input id="offer_price" type="text" class="form-control" name="offer_price" value="" placeholder="Enter offer price" required="">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                    <div class="form-group">
                                        <label for="qty">Qty<span class="text-red">*</span></label>
                                        <input id="qty" type="text" class="form-control" name="qty" value="" placeholder="Enter Product Qty" required="">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                    <div class="form-group">
                                        <label for="stock_alert">Stock Alert<span class="text-red">*</span></label>
                                        <input id="stock_alert" type="text" class="form-control" name="stock_alert" value="" placeholder="Enter Stock Alert" required="">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label>Select Categories</label>
                                        <div class="border-checkbox-section ml-3">
                                            @foreach ($category as $item)
                                                <div class="border-checkbox-group border-checkbox-group-success d-block">
                                                    <input class="border-checkbox" type="radio" name="category_id" id="checkbox{{ $item->id }}" value="{{ $item->id }}">
                                                    <label class="border-checkbox-label" for="checkbox{{ $item->id }}">{{ $item->name }}</label>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Shiping</label>
                                        <div class="border-checkbox-section ml-3">
                                            <div class="border-checkbox-group border-checkbox-group-success d-block">
                                                <input class="border-checkbox" type="checkbox" name="free_shipping" id="checkboxfree" value="1">
                                                <label class="border-checkbox-label" for="checkboxfree">Free Shipping</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="tax_type">Tax Type<span class="text-red">*</span></label>
                                        <select name="tax_type" class="form-control">
                                            <option>Select</option>
                                            <option value="Inclusive">Inclusive</option>
                                            <option value="Exclusive">Exclusive</option>
                                        </select>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                    <div class="form-group">
                                        <label for="input">Product Tag</label>
                                        <input type="text" name="tags" id="tags" class="form-control h-100" value="">
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
