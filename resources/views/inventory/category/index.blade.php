@extends('inventory.layout')
@section('title', 'Categories')
@section('content')
<!-- push external head elements to head -->
<div class="container-fluid">
    <div class="page-header">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="ik ik-list bg-blue"></i>
                    <div class="d-inline">
                        <h5>{{ __('Categories')}}</h5>
                        <span>Add, remove or edit product categories</span>
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
                            <a href="#">{{ __('Categories')}}</a>
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
                    <button class="btn btn-primary" href="#categoryAdd" data-toggle="modal" data-target="#categoryAdd">
                        Add Category
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
                                        <input type="text" class="form-control" placeholder="Category Title">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Category Code">
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
                @foreach($data as $key => $category)
                <div class="col-xl-3 col-lg-4 col-12 col-sm-6 mb-4 list-item list-item-grid">
                    <div class="card d-flex flex-row mb-3">
                        <a class="d-flex card-img" href="#categoryView" data-toggle="modal" data-target="#categoryView">
                            <img src="{{asset('storage/'.$category['image'])}}" alt="{{$category['name']}}" class="list-thumbnail responsive border-0">
                        </a>
                        <div class="d-flex flex-grow-1 min-width-zero card-content">
                            <div class="card-body align-self-center d-flex flex-column flex-md-row justify-content-between min-width-zero align-items-md-center mb-0">
                                <a class="mb-1 list-item-heading  truncate w-40 w-xs-100" href="#categoryView" data-toggle="modal" data-target="#categoryView">
                                    <b>{{$category['name']}}
                                    </b>
                                    @if($category['parent_category'])
                                    <span class="text-muted">
                                        {{$category['parent_category']}}
                                    </span>
                                    @endif
                                </a>
                                <p class="mb-1 w-15 w-xs-100">
                                    Total {{$category['items'] ?? 0}} items
                                </p>
                            </div>
                            <div class="list-actions">
                                <a href="#categoryView{{$category->id}}" data-toggle="modal" data-target="#categoryView{{$category->id}}"><i class="ik ik-edit-2"></i></a>
                                <a href="javascript:void()" onclick="$('#delete{{$category->id}}').submit()" class="list-delete"><i class="ik ik-trash-2"></i></a>
                                {{-- ACTION DELETE --}}
                                <form id="delete{{$category->id}}" action="{{ route('product-category.destroy', $category->id) }}" method="POST" id="delete-form-{{ $category->id }}" style="display: none;">
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
<!-- category add modal-->
<div class="modal fade edit-layout-modal pr-0 " id="categoryAdd" tabindex="-1" role="dialog" aria-labelledby="categoryAddLabel" aria-hidden="true">
    <div class="modal-dialog w-300" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="categoryAddLabel">{{ __('Add Category')}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <form action='{{ route('product-category.store') }}' method='POST' enctype='multipart/form-data'>
                    @csrf
                    <div class="form-group">
                        <label class="d-block">Category Image</label>
                        <input type="file" name="image" class="form-control">
                    </div>
                    <div class="form-group">
                        <label class="d-block">Category Name</label>
                        <input type="text" name="name" class="form-control" placeholder="Enter Category Title">
                    </div>
                    {{-- <div class="form-group">
                        <label class="d-block">Category Code</label>
                        <input type="text" name="code" class="form-control" placeholder="Enter Category Code">
                    </div> --}}
                    <div class="form-group">
                        <label class="d-block">Parent Category</label>
                        <select name="parent_category" class="form-control select2 ">
                            <option selected="selected" value="" data-select2-id="3">Select Category</option>
                            @foreach ($data as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    @if (\Auth::user()->bussiness->count() > 1))
                        <div class="form-group">
                            <label class="d-block">Bussiness</label>
                            <select name="bussiness_id" class="form-control select2 ">
                                <option selected="selected" value="" data-select2-id="3">Select Bussiness</option>
                                @foreach ($data as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    @else
                        <input type="hidden" name="bussiness_id" value="{{\Auth::user()->bussiness->first()->id ?? '-'}}">
                    @endif
                    <div class="form-group">
                        <input class="btn btn-primary" type="submit" name="Save" value="Save">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- category edit modal -->
@foreach ($data as $item)
    <div class="modal fade edit-layout-modal pr-0 " id="categoryView{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="categoryView{{$item->id}}Label" aria-hidden="true">
        <div class="modal-dialog w-300" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="categoryView{{$item->id}}Label">{{ __('Edit Category')}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <form action='{{ route('product-category.update', [$item->id]) }}' method='POST' enctype='multipart/form-data'>
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label class="d-block">Category Image</label>
                            <input type="file" name="image" class="form-control">
                        </div>
                        <div class="form-group">
                            <label class="d-block">Category Name</label>
                            <input type="text" name="name" value="{{ $item->name }}" class="form-control" placeholder="Enter Category Title">
                        </div>
                        <div class="form-group">
                            <label class="d-block">Category Code</label>
                            <input type="text" name="code" value="{{ $item->code }}" disabled class="form-control" placeholder="Enter Category Code">
                        </div>
                        <div class="form-group">
                            <label class="d-block">Parent Category</label>
                            <select name="parent_category" class="form-control select2 ">
                                <option selected="selected" value="">Select Category</option>
                                @foreach ($data as $parent)
                                    <option value="{{ $parent->id }}" {{ ($item->parent_category == $parent->id) ? 'selected' : '' }}>{{ $parent->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        @if (\Auth::user()->bussiness->count() > 1))
                            <div class="form-group">
                                <label class="d-block">Bussiness</label>
                                <select name="bussiness_id" class="form-control select2 ">
                                    <option selected="selected" value="" data-select2-id="3">Select Bussiness</option>
                                    @foreach (\Auth::user()->bussiness as $bussiness)
                                        <option value="{{ $bussiness->id }}" {{ ($item->id == $bussiness->id) ? 'selected' : '' }}>{{ $bussiness->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        @else
                            <input type="hidden" name="bussiness_id" value="{{\Auth::user()->bussiness->first()->id}}">
                        @endif
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