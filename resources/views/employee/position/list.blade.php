@extends('employee.layout')
@section('title', 'Employee Position')
@section('content')

<div class="container-fluid">
	<div class="page-header">
		<div class="row align-items-end">
			<div class="col-lg-8">
				<div class="page-header-title">
					<i class="ik ik-headphones bg-green"></i>
					<div class="d-inline">
						<h5>Employee Position</h5>
						<span>View, delete and update products</span>
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
							<a href="#">Employee Position</a>
						</li>
					</ol>
				</nav>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header row">
					<div class="col col-sm-2">
						<a href="{{ route('emPosition.create') }}" class="btn btn-sm btn-primary btn-rounded">Add Position</a>
					</div>
					<div class="col col-sm-1">
						<div class="card-options d-inline-block">
							<div class="dropdown d-inline-block">
								<a class="nav-link dropdown-toggle" href="#" id="moreDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="ik ik-more-horizontal"></i></a>
								<div class="dropdown-menu dropdown-menu-left" aria-labelledby="moreDropdown">
									<a class="dropdown-item" href="#">Delete</a>
									<a class="dropdown-item" href="#">More Action</a>
								</div>
							</div>
						</div>

					</div>
					<div class="col col-sm-6">
						<div class="card-search with-adv-search dropdown">
							<form action="">
								<input type="text" class="form-control global_filter" id="global_filter" placeholder="Search.." required="">
								<button type="submit" class="btn btn-icon"><i class="ik ik-search"></i></button>
								<button type="button" id="adv_wrap_toggler_1" class="adv-btn ik ik-chevron-down dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
								<div class="adv-search-wrap dropdown-menu dropdown-menu-right" aria-labelledby="adv_wrap_toggler_1">
									<div class="row">
										<div class="col-md-12">
											<div class="form-group">
												<input type="text" class="form-control column_filter" id="col0_filter" placeholder="Title" data-column="0">
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<input type="text" class="form-control column_filter" id="col1_filter" placeholder="Price" data-column="1">
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<input type="text" class="form-control column_filter" id="col2_filter" placeholder="SKU" data-column="2">
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
												<input type="text" class="form-control column_filter" id="col3_filter" placeholder="Qty" data-column="3">
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
												<input type="text" class="form-control column_filter" id="col4_filter" placeholder="Category" data-column="4">
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
												<input type="text" class="form-control column_filter" id="col5_filter" placeholder="Tag" data-column="5">
											</div>
										</div>
									</div>
									<button class="btn btn-theme">Search</button>
								</div>
							</form>
						</div>
					</div>
					<div class="col col-sm-3">
						<div class="card-options text-right">
							<span class="mr-5" id="top">1 - 50 of 2,500</span>
							<a href="#"><i class="ik ik-chevron-left"></i></a>
							<a href="#"><i class="ik ik-chevron-right"></i></a>
						</div>
					</div>
				</div>
				<div class="card-body">
					<table id="advanced_table" class="table">
						<thead>
							<tr>
								<th class="nosort" width="10">
									<label class="custom-control custom-checkbox m-0">
										<input type="checkbox" class="custom-control-input" id="selectall" name="" value="option2">
										<span class="custom-control-label">&nbsp;</span>
									</label>
								</th>
								<th>Name</th>
								<th>Bussiness</th>
								<th>Status</th>
								<th>image</th>
								<th>Description</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($data as $item)
								<tr>
									<td>
										<label class="custom-control custom-checkbox">
											<input type="checkbox" class="custom-control-input select_all_child" id="" name="" value="option2">
											<span class="custom-control-label">&nbsp;</span>
										</label>
									</td>
									<td>{{ $item->name }}</td>
									<td>{{ $item->bussiness->name }}</td>
									<td>{{ status($item->status) }}</td>
									<td>
										<img src="{{ asset('storage/'.$item->image) }}" class="table-user-thumb" alt="">
									</td>									
									<td>{{ ($item->description) }}</td>
									<td>
										<a href="#detailView" data-toggle="modal" data-target="#detailView"><i class="ik ik-eye f-16 mr-15"></i></a>
										<a href="javascript::void(0)" onclick="edit({{ $item->id }})"><i class="ik ik-edit f-16 mr-15 text-green"></i></a>
										<a href="javascript::void(0)" onclick="confirmDelete(event, {{ $item->id }})"><i class="ik ik-trash-2 f-16 text-red"></i></a>
									</td>
								</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="modal fade edit-layout-modal pr-0" id="productView" tabindex="-1" role="dialog" aria-labelledby="productViewLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="productViewLabel">Iphone 6</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-4">
						<img src="../img/products/ipone-6.jpg" class="img-fluid" alt="">
						<div class="other-images">
							<div class="row">
								<div class="col-sm-4">
									<img src="../img/widget/p2.jpg" class="img-fluid" alt="">
								</div>
								<div class="col-sm-4">
									<img src="../img/widget/p2.jpg" class="img-fluid" alt="">
								</div>
								<div class="col-sm-4">
									<img src="../img/widget/p2.jpg" class="img-fluid" alt="">
								</div>
							</div>
						</div>
					</div>
					<div class="col-8">
						<p>
						</p>
						<div class="badge badge-pill badge-dark">Electronics</div>
						<div class="badge badge-pill badge-dark">Accesories &amp; Gadgets</div>
						<p></p>
						<h3 class="text-danger">
							$ 1234
							<del class="text-muted f-16">$ 1250</del>
						</h3>
						<p class="text-green">Purchase Price: $ 1000</p>
						<p>Apple iPhone 6 smartphone. Announced Sep 2014. Features 4.7″ display, Apple A8 chipset, 8 MP primary camera, 1.2 MP front camera, 1810 mAh</p>
						<p>In Stock: 100</p>
						<p>Spplier: PZ Tech</p>
					</div>
				</div>
				<h5><strong>Sales</strong></h5>
				<div id="line_chart" class="chart-shadow"></div>

			</div>
		</div>
	</div>
</div>

	<div class="modal fade" id="modal_update_data" tabindex="-1" role="dialog" aria-labelledby="modal_update_dataLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="modal_update_dataLabel">Update Employee</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				</div>
				<div class="modal-body" id="formEdit">
				...
				</div>
			</div>
		</div>
	</div>	
	@endsection
	@push('script')
	<script src="{{ asset('plugins/amcharts/amcharts.js') }}"></script>
	<script src="{{ asset('plugins/amcharts/gauge.js') }}"></script>
	<script src="{{ asset('plugins/amcharts/serial.js') }}"></script>
	<script src="{{ asset('plugins/amcharts/themes/light.js') }}"></script>
	<script src="{{ asset('plugins/amcharts/animate.min.js') }}"></script>
	<script src="{{ asset('plugins/amcharts/pie.js') }}"></script>
	<script src="{{ asset('plugins/ammap3/ammap/ammap.js') }}"></script>
	<script src="{{ asset('plugins/ammap3/ammap/maps/js/usaLow.js') }}"></script>
	<script src="{{ asset('js/product.js') }}"></script>

	<script>
		function edit(id) {
			$.ajax({
				url: '/emPosition/'+id+'/edit',
				type: 'GET',
				success: function(data) {
					$('#formEdit').html(data);
					$('#modal_update_data').modal('show');
                    actionCloseModals();
				}
			})
		}

        function confirmDelete(event, id) {
            event.preventDefault();
            Swal.fire({
                title: 'Are you sure?',
                text: 'You will not be able to recover this record!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, cancel!',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    var postForm = {
                        '_token': '{{ csrf_token() }}',
                        '_method': 'DELETE',
                    };
                    $.ajax({
                        url: '/emPosition/'+id,
                        type: 'POST', 
                        data : postForm,
                        dataType  : 'json',
                    })
                    .done(function(data) {
                        Swal.fire('Deleted!', data['message'], 'success');
                        location.reload();
                    })
                    .fail(function() {
                        Swal.fire('Error!', 'An error occurred while deleting the record.', 'error');
                    });
                }
            });
        }
	</script>
@endpush