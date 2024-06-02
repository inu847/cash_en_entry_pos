@extends('inventory.layout')
@section('title', 'Add Payment')
@section('content')
    <div class="container-fluid">
    	<div class="page-header">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        <i class="ik ik-headphones bg-blue"></i>
                        <div class="d-inline">
                            <h5>Add Payment</h5>
                            <span>Add new Payment in inventory</span>
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
                                <a href="#">Add Payment</a>
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
                        <form class="forms-sample" method="POST" action="{{ route('payment.store') }}" enctype="multipart/form-data">
                        @csrf
                            <div class="row">
                                <div class="col-sm-6">

                                    <div class="form-group">
                                        <label for="title">Name<span class="text-red">*</span></label>
                                        <input id="title" type="text" class="form-control" name="name" value="" placeholder="Enter product title" required="">
                                    <div class="help-block with-errors"></div>

                                    </div>
                                    <div class="form-group">
                                        <label>Description</label>
                                        <textarea name="description" class="form-control html-editor h-205" rows="10"></textarea>
                                    </div>

                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Images</label>
                                        <input type="file" class="form-control" name="image">
                                    </div>
                                    <div class="form-group">
                                        <label>Status</label>
                                        <select class="form-control" name="status" required>
                                            <option value="1" selected>Active</option>
                                            <option value="2">Inactive</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Type</label>
                                        <select class="form-control" name="type" required>
                                            <option value="1" selected>Cash</option>
                                            <option value="2">Transfer</option>
                                            <option value="3">Ewallet</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="no_rekening">No Rekening</label>
                                        <input id="no_rekening" type="text" class="form-control" name="no_rekening" value="" placeholder="Enter No Rekening">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                            </div>

                            {{-- BUTTON SUBMIT --}}
                            <div class="text-right">
                                <button type="submit" class="btn btn-primary mr-2">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
