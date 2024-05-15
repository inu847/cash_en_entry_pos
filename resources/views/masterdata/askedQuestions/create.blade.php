@extends('layouts.main')
@section('title', 'Add FAQ'){{-- ubah --}}
@section('content')
    <div class="container-fluid">
    	<div class="page-header">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        <i class="ik ik-headphones bg-blue"></i>
                        <div class="d-inline">
                            <h5>Add FAQ</h5>{{-- ubah --}}
                            <span>Add new FAQ in Master Data</span>{{-- ubah --}}
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
                                <a href="#">Add FAQ</a>{{-- ubah --}}
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
                        <form class="forms-sample" method="POST" action="{{ route('askedQuestions.store') }}" enctype="multipart/form-data">
                        @csrf
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="title">Question<span class="text-red">*</span></label>
                                        <input id="title" type="text" class="form-control" name="question" value="" placeholder="Enter Question"{{-- ubah --}} required="">
                                    <div class="help-block with-errors"></div>
                                    <div class="form-group">
                                        <label>Status</label>
                                        <select class="form-control" name="status" >
                                            <option selected="selected" value="" >Select status</option>
                                                <option value="1">Active</option>
                                                <option value="2">Inactive</option>
                                        </select>
                                    </div>

                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Type</label>
                                        <select class="form-control" name="type" >
                                            <option selected="selected" value="" >Select type</option>
                                                <option value="1">General</option>
                                                <option value="2">Help</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="sku">Answer<span class="text-red">*</span></label>
                                        <input id="sku" type="text" class="form-control" name="answer" value="" placeholder="Enter Answer"{{-- ubah --}} required="">
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
