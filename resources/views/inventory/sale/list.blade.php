@extends('inventory.layout')
@section('title', 'Invoces')
@section('content')
<div class="container-fluid">
	<div class="page-header">
		<div class="row align-items-end">
			<div class="col-lg-8">
				<div class="page-header-title">
					<i class="ik ik-shopping-cart bg-green"></i>
					<div class="d-inline">
						<h5>Invoces</h5>
						<span>View, delete and update Invoces</span>
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
							<a href="#">Invoces</a>
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
						<a href="{{ route('pos.index') }}" class="btn btn-primary btn-rounded">Add Sale</a>
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
							<form action="{{ route('invoice.index') }}" method="GET" enctype="multipart/form-data">
								<input type="text" class="form-control global_filter" id="global_filter" placeholder="Search.." required="">
								<button type="submit" class="btn btn-icon"><i class="ik ik-search"></i></button>
								<button type="button" id="adv_wrap_toggler" class="adv-btn ik ik-chevron-down dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
								<div class="adv-search-wrap dropdown-menu dropdown-menu-right" aria-labelledby="adv_wrap_toggler">
									<div class="row">
										<div class="col-md-12">
											<div class="form-group">
												<input type="text" name="invoice_code" class="form-control column_filter" id="col0_filter" placeholder="Reference No" data-column="0">
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<select class="form-control" name="warehouse_id">
													<option selected="">Select Warehouse</option>
													@foreach ($warehouse as $item)
														<option value="{{ $item->id }}">{{ $item->name }}</option>
													@endforeach
												</select>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<input type="text" name="customer_name" class="form-control column_filter" id="col2_filter" placeholder="Customer" data-column="2">
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<select class="form-control" name="status">
													<option selected="">Select Status</option>
													<option value="1">Process</option>
													<option value="2">Cancel</option>
													<option value="3">Complete</option>
												</select>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<select class="form-control" name="sale_status">
													<option selected="">Select Payment Method</option>
													@foreach ($payment as $item)
														<option value="{{ $item->id }}">{{ $item->name }}</option>
													@endforeach
												</select>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<input type="text" name="customer_name" class="form-control column_filter" id="col2_filter" placeholder="Customer" data-column="2">
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<input type="datetime-local" name="start_date" class="form-control column_filter" id="col2_filter" placeholder="Start Date" data-column="2">
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<input type="datetime-local" name="end_date" class="form-control column_filter" id="col2_filter" placeholder="End Date" data-column="2">
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
								<th class="nosort">Refeence No.</th>
								<th>Customer</th>
								<th>Warehouse</th>
								<th>Status</th>
								<th>Grand Total</th>
								<th>Paid</th>
								<th>Due</th>
								<th>Payment Method</th>
								<th>Created At</th>
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
									<td>
										<button data-toggle="modal" data-target="#InvoiceModal" onclick="detail({{$item->item}})" class="font-weight-bold">
											{{ $item->invoice_code }}
										</button>
									</td>
									<td>{{ ucfirst($item->customer_name) }}</td>
									<td>{{ $item->warehouse->name ?? '' }}</td>
									<td><span class="badge badge-pill badge-success mb-1">{{ statusInvoice($item->status) }}</span></td>
									<td>{{ number_format($item->grand_total) }}</td>
									<td>{{ number_format($item->pay) }}  <span class="badge {{ ($item->pay != 3) ? 'badge-danger' : 'badge-success' }}">{{ paidInvoice($item->paid) }}</span></td>
									<td>{{ typeInvoice($item->type) }}</td>
									<td>{{ $item->payment->name ?? '' }}</td>
									<td>{{ $item->created_at->format('Y-m-d H:i:s') }}</td>
									<td>
										<div class="dropdown d-inline-block">
											<a class="nav-link dropdown-toggle" href="#" id="moreDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
												<i class="ik ik-more-vertical"></i>
											</a>
											<div class="dropdown-menu dropdown-menu-right">
												<a class="dropdown-item" href="/Invoces/1/edit"><i class="ik ik-edit"></i> Edit </a>
												<a class="dropdown-item" href="#InvoiceModal" data-toggle="modal" data-target="#InvoiceModal">
													<i class="ik ik-file-text"></i>
													Preveiw Invoice
												</a>
												<a class="dropdown-item">
													<i class="ik ik-printer"></i>
													Invoice POS
												</a>
												<a class="dropdown-item">
													<i class="ik ik-mail"></i>
													Send on Email
												</a>

												<a class="dropdown-item" href="#">
													<i class="ik ik-trash"></i> Delete </a>
											</div>
										</div>
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


{{-- MODALS DETAIL SALE --}}
<div class="modal fade" id="InvoiceModal" tabindex="-1" role="dialog" aria-labelledby="InvoiceModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="InvoiceModalLabel">Detail Invoice</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			</div>
			<div class="modal-body">
			...
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('Close')}}</button>
				<button type="button" class="btn btn-primary">{{ __('Save changes')}}</button>
			</div>
		</div>
	</div>
</div>

{{-- JS --}}
<script>
	function detail(id) {
		var postForm = {
			'_token': '{{ csrf_token() }}',
			'name'     : $('input[name=name]').val()
		};
		$.ajax({
			url: '/invoice/'+id,', 
			type: 'GET', 
			data : postForm,
			dataType  : 'json',
		})
		.success(function(data) {
			$('#InvoiceModal').modal('show');
			$('#InvoiceModal .modal-body').html(data);
		})
		.fail(function() {
			alert('Load data failed.');
		});
	}
</script>

@endsection