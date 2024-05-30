@extends('layouts.main')
@section('title', 'Add Stock In'){{-- ubah --}}
@section('content')
    <div class="container-fluid">
    	<div class="page-header">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        <i class="ik ik-headphones bg-blue"></i>
                        <div class="d-inline">
                            <h5>Add Stock In</h5>{{-- ubah --}}
                            <span>Add, edit and delete srock in</span>{{-- ubah --}}
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
                                <a href="#">Add stock in</a>{{-- ubah --}}
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
                        <form class="forms-sample" method="POST" action="{{ route('stockIn.store') }}" enctype="multipart/form-data">
                        @csrf
                            <div class="row">
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

                                    <div class="form-group">
                                        <label>Product image</label>
                                        <input type="file" class="form-control" name="image">
                                    </div>

                                    <div class="form-group">
                                        <label for="qty">Qty<span class="text-red">*</span></label>
                                        <input id="qty" type="number" class="form-control" name="qty" value="" placeholder="Enter Qty" required="">
                                        <div class="help-block with-errors"></div>
                                    </div>

                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="pic">PIC<span class="text-red">*</span></label>
                                        <input id="pic" type="text" class="form-control" name="pic" value="" placeholder="Enter PIC"{{-- ubah --}} required="">
                                        <div class="help-block with-errors"></div>
                                    </div>

                                    <div class="form-group">
                                        <label for="pic">PIC Phone<span class="text-red">*</span></label>
                                        <input id="pic" type="number" class="form-control" name="pic_phone" value="" placeholder="Enter Pic Phone" required="">
                                        <div class="help-block with-errors"></div>
                                    </div>

                                    <div class="form-group">
                                        <label for="sendby">Send By<span class="text-red">*</span></label>
                                        <input id="sendby" type="text" class="form-control" name="send_by" value="" placeholder="Enter Text"{{-- ubah --}} required="">
                                        <div class="help-block with-errors"></div>
                                    </div>

                                    <div class="form-group">
                                        <label for="received_by">Received By<span class="text-red">*</span></label>
                                        <input id="received_by" type="text" class="form-control" name="received_by" value="" placeholder="Enter Text"{{-- ubah --}} required="">
                                        <div class="help-block with-errors"></div>
                                    </div>

                                    <input type="number" name="type" value="1" hidden>
                                    <div class="form-group text-right">
                                        <button type="submit" class="btn btn-primary">Save</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
                @elseif (session('danger'))
                <div class="alert alert-danger">
                    {{ session('danger') }}
                </div>
                @endif
            </div>
        </div>
    </div>
@endsection
