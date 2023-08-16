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
						<h5>Invoces {{ $detail_in['start_date'].' - '.$detail_in['end_date'] }}</h5>
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
								<input type="text" class="form-control global_filter" id="global_filter" placeholder="Search..">
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
													<option value="" selected="">Select Warehouse</option>
													@foreach ($warehouse as $item)
														<option value="{{ $item->id }}" {{ (\Request::get('warehouse_id') == $item->id) ? 'selected' : '' }} >{{ $item->name }}</option>
													@endforeach
												</select>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<input type="text" name="customer_name" value="{{ \Request::get('customer_name') }}" class="form-control column_filter" id="col2_filter" placeholder="Customer" data-column="2">
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<select class="form-control" name="status">
													<option value="" selected="">Select Status</option>
													<option value="1" {{ (\Request::get('status') == 1) ? 'selected' : '' }}>Process</option>
													<option value="2" {{ (\Request::get('status') == 2) ? 'selected' : '' }}>Cancel</option>
													<option value="3" {{ (\Request::get('status') == 3) ? 'selected' : '' }}>Complete</option>
												</select>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<select class="form-control" name="payment_id">
													<option value="" selected="">Select Payment Method</option>
													@foreach ($payment as $item)
														<option value="{{ $item->id }}" {{ (\Request::get('payment_id') == $item->id) ? 'selected' : '' }}>{{ $item->name }}</option>
													@endforeach
												</select>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<input type="date" name="start_date" value="{{ \Request::get('start_date') }}" class="form-control column_filter" id="col2_filter" placeholder="Start Date" data-column="2">
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<input type="date" name="end_date" value="{{ \Request::get('end_date') }}" class="form-control column_filter" id="col2_filter" placeholder="End Date" data-column="2">
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
										<button onclick="detail({{$item->id}})" class="font-weight-bold btn btn-primary">
											#{{ $item->invoice_code }}
										</button>
									</td>
									<td>{{ ucfirst($item->customer_name) }}</td>
									<td>{{ $item->warehouse->name ?? '' }}</td>
									<td>
										@if ($item->status == 1)
											<span class="badge badge-pill badge-warning mb-1">{{ statusInvoice($item->status) }}</span>
										@elseif($item->status == 2)
											<span class="badge badge-pill badge-danger mb-1">{{ statusInvoice($item->status) }}</span>
										@elseif($item->status == 3)
											<span class="badge badge-pill badge-success mb-1">{{ statusInvoice($item->status) }}</span>
										@endif
									</td>
									<td>{{ number_format($item->grand_total) }}</td>
									<td>
										{{ number_format($item->pay) }}
										@if ($item->paid == 1)
											<span class="badge badge-pill badge-danger mb-1">{{ paidInvoice($item->paid) }}</span>
										@elseif ($item->paid == 2)
											<span class="badge badge-pill badge-success mb-1">{{ paidInvoice($item->paid) }}</span>
											@elseif ($item->paid == 3)
											<span class="badge badge-pill badge-warning mb-1">{{ paidInvoice($item->paid) }}</span>
										@endif
									</td>
									<td>{{ typeInvoice($item->type) }}</td>
									<td>{{ $item->payment->name ?? '' }}</td>
									<td>{{ $item->created_at->format('Y-m-d H:i:s') }}</td>
									<td>
										<div class="dropdown d-inline-block">
											<a class="nav-link dropdown-toggle" href="#" id="moreDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
												<i class="ik ik-more-vertical"></i>
											</a>
											<div class="dropdown-menu dropdown-menu-right">
												{{-- <a class="dropdown-item" href="/invoces/1/edit"><i class="ik ik-edit"></i> Edit </a> --}}
												<a class="dropdown-item" href="#javascript:void(0)" onclick="detail({{$item->id}})">
													<i class="ik ik-file-text"></i>
													Preveiw Invoice
												</a>
												<a class="dropdown-item" href="{{ route('invoice.cetak', [$item->invoice_code]) }}">
													<i class="ik ik-printer"></i>
													Invoice POS
												</a>

												<a class="dropdown-item" href="javascript:void(0)" onclick="$('#delete{{$item->id}}').submit()">
													<i class="ik ik-trash"></i> Delete 
												</a>

												<form id="delete{{$item->id}}" action="{{ route('invoice.destroy', [$item->id]) }}" method="POST" enctype="multipart/form-data">
													@csrf
													@method('DELETE')
												</form>
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
<div class="modal fade full-window-modal" id="InvoiceModal" tabindex="-1" role="dialog" aria-labelledby="InvoiceModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			
		</div>
	</div>
</div>

{{-- JS --}}
<script>
	function detail(id) {
		$.ajax({
			url: '/invoice/'+id,
			type: 'GET',
			success: function(data) {
				$('#InvoiceModal').modal('show');
				$('#InvoiceModal .modal-content').html(data);
			}
		});
	}
</script>

@endsection