@extends('layouts.main') 
@section('title', 'General Setting')
@section('content')
    

    <div class="container-fluid">
        <div class="page-header">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        <i class="ik ik-file-text bg-blue"></i>
                        <div class="d-inline">
                            <h5>{{ __('General Setting')}}</h5>
                            <span>{{ __('lorem ipsum dolor sit amet, consectetur adipisicing elit')}}</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <nav class="breadcrumb-container" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{route('dashboard')}}"><i class="ik ik-home"></i></a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="#">{{ __('Pages')}}</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">{{ __('Profile')}}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-4 col-md-5">
                <div class="card">
                    <div class="card-body">
                        <div class="text-center"> 
                            <img src="{{ asset('storage/'.$data->logo) }}" class="rounded-circle" width="150" />
                            <h4 class="card-title mt-10">{{$data->app_name}}</h4>
                            <small class="text-muted d-block pt-39">{{ __('Social Profile')}}</small>
                            <br/>
                            <button class="btn btn-icon btn-facebook"><i class="fab fa-facebook-f"></i></button>
                            <button class="btn btn-icon btn-twitter"><i class="fab fa-twitter"></i></button>
                            <button class="btn btn-icon btn-instagram"><i class="fab fa-instagram"></i></button>
                            <button class="btn btn-icon btn-whatsapp"><i class="fab fa-whatsapp"></i></button>
                            <button class="btn btn-icon btn-youtube"><i class="fab fa-youtube"></i></button> 
                            <img src="{{ asset('storage/'.$data->favicon) }}" class="table-user-thumb" alt="">   
                        </div>
                    </div>
                    <hr class="mb-0"> 
                    <div class="card-body"> 
                        <small class="text-muted d-block">{{ __('Email address')}} </small>
                        <h6>{{$data->email}}</h6> 
                        <small class="text-muted d-block pt-10">{{ __('Phone')}}</small>
                        <h6>{{$data->phone}}</h6> 
                        <small class="text-muted d-block pt-10">{{ __('Address')}}</small>
                        <h6>{{$data->address}}</h6>
                        <div class="map-box">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d248849.886539092!2d77.49085452149588!3d12.953959988118836!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bae1670c9b44e6d%3A0xf8dfc3e8517e4fe0!2sBengaluru%2C+Karnataka!5e0!3m2!1sen!2sin!4v1542005497600" width="100%" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>
                        </div> 
                    </div>
                </div>
            </div>
            <div class="col-lg-8 col-md-7">
                <div class="card">
                    <ul class="nav nav-pills custom-pills" id="pills-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="pills-aboutus-tab" data-toggle="pill" href="#current-month" role="tab" aria-controls="pills-aboutus" aria-selected="true">{{ __('About Us')}}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-privacy-tab" data-toggle="pill" href="#last-month" role="tab" aria-controls="pills-privacy" aria-selected="false">{{ __('Privacy Police')}}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-conditionterms-tab" data-toggle="pill" href="#previous-month" role="tab" aria-controls="pills-conditionterms" aria-selected="false">{{ __('Condition and Terms')}}</a>
                        </li>
                        <li class="nav-item">
                            <a href="javascript::void(0)" onclick="edit({{ $data->id }})"><i class="ik ik-edit f-16 mr-15 text-green"></i></a>
                        </li>
                    </ul>
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="current-month" role="tabpanel" aria-labelledby="pills-aboutus-tab">
                            <div class="card-body">
                                <h4 class="mt-30">{{ __('About Us')}}</h4>
                                <hr>
                                        <p class="mt-30">{{$data->about_us}}</p>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="last-month" role="tabpanel" aria-labelledby="pills-privacy-tab">
                            <div class="card-body">
                                <h4 class="mt-30">{{ __('Privacy Policy')}}</h4>
                                <hr>
                                <p class="mt-30">{{$data->privacy_policy}}</p>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="previous-month" role="tabpanel" aria-labelledby="pills-conditionterms-tab">
                            <div class="card-body">
                                <h4 class="mt-30">{{ __('Terms and Conditions')}}</h4>
                                <hr>
                                <p class="mt-30">{{$data->terms_and_conditions}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modal_update_data" tabindex="-1" role="dialog" aria-labelledby="modal_update_dataLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal_update_dataLabel">Update General Setting</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body" id="formEdit">
                ...
                </div>
            </div>
        </div>
    </div>	
        
@push('script')
<script>
	function edit(id) {
		$.ajax({
			url: '/generalSetting/'+id+'/edit',
			type: 'GET',
			success: function(data) {
				$('#formEdit').html(data);
				$('#modal_update_data').modal('show');
				actionCloseModals();
			}
		})
	}
</script>
@endpush
@endsection