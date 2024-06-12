@extends('employee.layout')
@section('title', 'Employee Loan')
@section('content')

<div class="container-fluid">
	<div class="page-header">
		<div class="row align-items-end">
			<div class="col-lg-8">
				<div class="page-header-title">
					<i class="ik ik-headphones bg-green"></i>
					<div class="d-inline">
						<h5>Employee Loan</h5>
						<span>View, delete and update Employee Loan</span>
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
							<a href="#">Employee Loan</a>
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
						<a href="{{ route('emLoan.create') }}" class="btn btn-sm btn-primary btn-rounded">Add Employee Loan</a>
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
								<th>Loan Number</th>
								<th>Loan Date</th>
								<th>Employe Name</th>
								<th>Bussiness Name</th>
								<th>Loan Status</th>
								<th>Repayment Status</th>
								<th>Repayment Type</th>
								<th>Repayment Term</th>
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
									<td>{{ $item->loan_number }}</td>
									<td>{{ $item->loan_date }}</td>
									<td>{{ $item->employee->name }}</td>
									<td>{{ $item->bussiness->name }}</td>
									<td>{{ loanStatus($item->loan_status) }}</td>
									<td>{{ repaymentStatus($item->repayment_status) }}</td>
									<td>{{ repaymentType($item->repayment_type) }}</td>
									<td>{{ repaymentTerm($item->repayment_term) }}</td>
									<td>
										<a href="javascript::void(0)" onclick="detail({{ $item->id }})"><i class="ik ik-eye f-16 mr-15"></i></a>
										<a href="javascript::void(0)" onclick="edit({{ $item->id }})"><i class="ik ik-edit f-16 mr-15 text-green"></i></a>
										<a href="{{URL('/repaymentpdf/pdf/'.$item->id)}}"><i class="ik ik-edit f-16 mr-15 text-green"></i></a>
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
	<div class="modal fade" id="modal_update_data" tabindex="-1" role="dialog" aria-labelledby="modal_update_dataLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="modal_update_dataLabel">Update Employee Attendance</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				</div>
				<div class="modal-body" id="formEdit">
				...
				</div>
			</div>
		</div>
	</div>	
	<div class="modal fade" id="modal_detail_data" tabindex="-1" role="dialog" aria-labelledby="modal_detail_dataLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="modal_detail_dataLabel">Detail</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				</div>
				<div class="modal-body" id="formDetail">
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
				url: '/emLoan/'+id+'/edit',
				type: 'GET',
				success: function(data) {
					$('#formEdit').html(data);
					$('#modal_update_data').modal('show');
                    actionCloseModals();
				}
			})
		}
		function detail(id) {
		$.ajax({
			url: '/emLoan/'+id,
			type: 'GET',
			success: function(data) {
				$('#formDetail').html(data);
				$('#modal_detail_data').modal('show');
				actionCloseModals();
			}
		})
	}
		function pdf(id) {
		$.ajax({
			url: '/repaymentpdf/pdf/'+id,
			type: 'GET',
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
                        url: '/attendance/'+id,
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