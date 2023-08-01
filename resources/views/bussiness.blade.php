@extends('layouts.main')
@section('title', 'Bussiness')
@section('content')
<!-- push external head elements to head -->
<div class="container-fluid">
    <div class="page-header">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="ik ik-list bg-blue"></i>
                    <div class="d-inline">
                        <h5>{{ __('Bussiness')}}</h5>
                        <span>Add, remove or edit Bussiness</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <nav class="breadcrumb-container" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{url('dashboard')}}"><i class="ik ik-home"></i></a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="#">{{ __('Bussiness')}}</a>
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <div class="row">
        <!-- start message area-->
        @include('include.message')
        <!-- end message area-->
        <div class="col-md-12">
            <div class="mb-2 clearfix">
                <div class="d-block mb-3 text-right">
                    <button class="btn btn-primary" href="#bussinessAdd" data-toggle="modal" data-target="#bussinessAdd">
                        Add Bussiness
                    </button>
                </div>
                <a class="btn pt-0 pl-0 d-md-none d-lg-none" data-toggle="collapse" href="#displayOptions" role="button" aria-expanded="true" aria-controls="displayOptions">
                    {{ __('Display Options')}}
                    <i class="ik ik-chevron-down align-middle"></i>
                </a>
                <div class="collapse d-md-block display-options" id="displayOptions">
                    <span class="mr-3 d-inline-block float-md-left dispaly-option-buttons">
                        <a href="#" class="mr-1 view-thumb ">
                            <i class="ik ik-list view-icon"></i>
                        </a>
                        <a href="#" class="mr-1 view-grid active">
                            <i class="ik ik-grid view-icon"></i>
                        </a>
                    </span>
                    <div class="d-block d-md-inline-block">
                        <div class="btn-group float-md-left mr-1 mb-1">
                            <button class="btn btn-outline-dark btn-xs dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ __('
                                    Order By')}}
                                <i class="ik ik-chevron-down mr-0 align-middle"></i>
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="#">{{ __('DESC')}}</a>
                                <a class="dropdown-item" href="#">{{ __('ASC')}}</a>
                            </div>
                        </div>
                        <div class="search-sm d-inline-block float-md-left mr-1 mb-1 align-top">
                            <form action="">
                                <input type="text" class="form-control" placeholder="Search.." required>
                                <button type="submit" class="btn btn-icon"><i class="ik ik-search"></i></button>
                                <button type="button" id="adv_wrap_toggler" class="adv-btn ik ik-chevron-down dropdown-toggle" data-toggle="dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
                                <div class="adv-search-wrap dropdown-menu dropdown-menu-right" aria-labelledby="adv_wrap_toggler">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="bussiness Title">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="bussiness Code">
                                    </div>
                                    <button class="btn btn-theme">{{ __('Search')}}</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="float-md-right">
                        <span class="text-muted text-small mr-2">{{ __('Displaying 1-10 of 210 items')}} </span>
                        <button class="btn btn-outline-dark btn-xs dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            20
                            <i class="ik ik-chevron-down mr-0 align-middle"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="#">10</a>
                            <a class="dropdown-item" href="#">20</a>
                            <a class="dropdown-item" href="#">30</a>
                            <a class="dropdown-item" href="#">50</a>
                            <a class="dropdown-item" href="#">100</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="separator mb-20"></div>

            <div class="row layout-wrap" id="layout-wrap">
                @foreach($data as $key => $bussiness)
                <div class="col-xl-3 col-lg-4 col-12 col-sm-6 mb-4 list-item list-item-grid">
                    <div class="card d-flex flex-row mb-3">
                        <a class="d-flex card-img" href="#bussinessView" data-toggle="modal" data-target="#bussinessView">
                            <img src="{{asset('storage/'.$bussiness->image)}}" alt="{{$bussiness['name']}}" class="list-thumbnail responsive border-0">
                        </a>
                        <div class="d-flex flex-grow-1 min-width-zero card-content">
                            <div class="card-body align-self-center d-flex flex-column flex-md-row justify-content-between min-width-zero align-items-md-center mb-0">
                                <a class="mb-1 list-item-heading  truncate w-40 w-xs-100" href="#bussinessView" data-toggle="modal" data-target="#bussinessView">
                                    <b>{{$bussiness['name']}}
                                    </b>
                                    @if($bussiness['parent_bussiness'])
                                    <span class="text-muted">
                                        {{$bussiness['parent_bussiness']}}
                                    </span>
                                    @endif
                                </a>
                            </div>
                            <div class="list-actions">
                                <a href="#bussinessView{{$bussiness->id}}" data-toggle="modal" data-target="#bussinessView{{$bussiness->id}}"><i class="ik ik-edit-2"></i></a>
                                <a href="javascript:void()" onclick="$('#delete{{$bussiness->id}}').submit()" class="list-delete"><i class="ik ik-trash-2"></i></a>
                                {{-- ACTION DELETE --}}
                                <form id="delete{{$bussiness->id}}" action="{{ route('bussiness.destroy', $bussiness->id) }}" method="POST" id="delete-form-{{ $bussiness->id }}" style="display: none;">
                                    @csrf
                                    @method('DELETE')
                                </form>
                            </div>
                            <div class="custom-control custom-checkbox pl-1 align-self-center">
                                <label class="custom-control custom-checkbox mb-0">
                                    <input type="checkbox" class="custom-control-input">
                                    <span class="custom-control-label"></span>
                                </label>
                            </div>

                        </div>
                    </div>
                </div>
                @endforeach
        </div>
    </div>
</div>
<!-- bussiness add modal-->
<div class="modal fade edit-layout-modal pr-0 " id="bussinessAdd" tabindex="-1" role="dialog" aria-labelledby="bussinessAddLabel" aria-hidden="true">
    <div class="modal-dialog w-300" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="bussinessAddLabel">{{ __('Add bussiness')}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <form action='{{ route('bussiness.store') }}' method='POST' enctype='multipart/form-data'>
                    @csrf
                    <div class="form-group">
                        <label class="d-block">Bussiness Image</label>
                        <input type="file" name="image" class="form-control">
                    </div>
                    <div class="form-group">
                        <label class="d-block">Bussiness Name</label>
                        <input type="text" name="name" class="form-control" placeholder="Enter bussiness Title">
                    </div>
                    
                    <div class="form-group">
                        <label class="d-block">User</label>
                        <select name="user_id" class="form-control select2 ">
                            <option selected="selected" value="" data-select2-id="3">Select bussiness</option>
                            @foreach ($user as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach 
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="d-block">Status</label>
                        <select name="status" class="form-control select2 ">
                            <option selected="selected" value="" data-select2-id="3">Select bussiness</option>
                            <option value="1">Active</option>
                            <option value="2">Inactive</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <input class="btn btn-primary" type="submit" name="Save" value="Save">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- bussiness edit modal -->
@foreach ($data as $key => $item)
    <div class="modal fade edit-layout-modal pr-0 " id="bussinessView{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="bussinessViewLabel" aria-hidden="true">
        <div class="modal-dialog w-300" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="bussinessViewLabel">{{ __('Edit bussiness')}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <form action='{{ route('bussiness.update', $item->id) }}' method='POST' enctype='multipart/form-data'>
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label class="d-block">Bussiness Image</label>
                            <input type="file" name="image" class="form-control">
                        </div>
                        <div class="form-group">
                            <label class="d-block">Bussiness Name</label>
                            <input type="text" name="name" value="{{ $item->name }}" class="form-control" placeholder="Enter bussiness Title">
                        </div>
                        
                        <div class="form-group">
                            <label class="d-block">User</label>
                            <select name="user_id" class="form-control select2 ">
                                <option selected="selected" value="" data-select2-id="3">Select bussiness</option>
                                @foreach ($user as $usr)
                                    <option value="{{ $usr->id }}" {{ ($item->user_id == $usr->id) ? 'selected' : '' }}>{{ $usr->name }}</option>
                                @endforeach 
                            </select>
                        </div>

                        <div class="form-group">
                            <label class="d-block">Status</label>
                            <select name="status" class="form-control select2 ">
                                <option selected="selected" value="" data-select2-id="3">Select bussiness</option>
                                <option value="1" {{ ($item->status == 1) ? 'selected' : '' }}>Active</option>
                                <option value="2" {{ ($item->status == 2) ? 'selected' : '' }}>Inactive</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <input class="btn btn-primary" type="submit" name="Save" value="Save">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endforeach
@endsection