<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
	<title>POS | Cash N Entry</title>
	<!-- initiate head with meta tags, css and script -->
	@include('include.head')

	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins&display=swap">
	<link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
	<style>
		.topbar_menu {
			top: 5px;
			margin: 0px 20px;
			font-size: 20px;

		}

		/* STICKY TOP WHEN SCROLL */
		.sticky-top {
			padding: 15px 50px !important;
			background-color: rgba(255, 255, 255, 0.801) !important;
		}

		.list-thumbnail {
			width: 100%;
			height: 175px;
			border-radius: 6px;
		}

		.badge-bestseller {
			background-color: #68FE6E;
			color: #fff;
			font-size: 10px;
			border-radius: 15px;
			position: absolute;
			margin: 10px;
			font-family: 'Poppins', sans-serif;
			font-weight: 900;
		}

		.badge-discount {
			background-color: #FF3030;
			color: #fff;
			font-size: 10px;
			border-radius: 15px;
			position: absolute;
			margin: 10px;
			font-family: 'Poppins', sans-serif;
			font-weight: 900;
		}

		.badge-add-product {
			background-color: #000000;
			color: #fff;
			font-size: 23px;
			position: absolute;
			margin: 10px;
			font-weight: 900;
			top: 143px;
			right: 3px;
			padding: 1px;
			border-radius: 3px;
		}

		.badge-add-favorite {
			position: absolute;
			right: 15px;
			top: 7px;
		}

		.product-title {
			font-family: 'Inter';
			font-style: normal;
			font-weight: 700;
			font-size: 18px;
			line-height: 22px;
			color: #000000;
		}

		.product-price {
			font-family: 'Inter';
			font-style: normal;
			font-weight: 600;
			font-size: 16px;
			line-height: 19px;
		}

		.badge-soldout {
			padding: 10px 0px;
			width: 90%;
		}

		.no-border{
			border: none;
			border-radius: 25px;
		}

		.border1{
			border: 2px solid;
			border-radius: 25px;
		}

		.f1{
			font-family: "Poppins";
			font-weight: bold;
		}
	</style>
</head>

<body id="app">
	<div class="wrapper">
		<div class="pos-container p-3 pt-0">
			<div class="row">
				<div class="col-sm-1 bg-white h-100vh ">
					<div class="pos top-menu mt-20 text-center">
						<a href="{{url('/inventory')}}" class="nav-link m-auto mb-10"><i class="ik ik-arrow-left-circle"></i></a>
						<a href="#" class="nav-link m-auto mb-10" id="apps_modal_btn" data-toggle="modal" data-target="#appsModal"><i class="ik ik-grid"></i></a>
						<a class="nav-link m-auto mb-10" href="#" id="notiDropdown"><i class="ik ik-bell"></i><span class="badge bg-danger">3</span></a>
						<a class="nav-link m-auto mb-10" href="{{url('profile')}}"><i class="ik ik-user"></i></a>
						<a class="nav-link m-auto mb-10" href="{{ url('logout') }}">
							<i class="ik ik-power"></i>
						</a>
					</div>
				</div>
				<div class="col-sm-7 bg-white">
					<div class="customer-area">
						<div class="row">
							<div class="col-sm-3">
								<div class="form-group">
									<select class="form-control select2" name="warehouse">
										<option selected="selected" value="">Select Warehouse</option>
										@foreach ($warehouse as $item)
										<option value="{{ $item->id }}">{{ $item->name }}</option>
										@endforeach
									</select>
								</div>
							</div>
							<div class="col-sm-9">
								<div class="form-group">
									<input type="text" name="product" class="form-control" placeholder="Search products">
								</div>
							</div>

						</div>

						<div class="row pos-products layout-wrap" id="layout-wrap">

							<!-- include product preview page -->
							@foreach($products as $key => $product)
							<div class="col-xl-3 col-lg-4 col-12 col-sm-6 mb-2 list-item list-item-grid p-2">
								<div class="mb-1 pos-product-card" data-info="{{ htmlentities(json_encode($product)) }}">
									{{-- <div class="card mb-1 pos-product-card" data-info="{{ htmlentities(json_encode($product)) }}"> --}}
									<div class="mb-2">
										{{-- <div class="d-flex card-img"> --}}
										@if ($key % 2 == 0)
										<div class="badge badge-bestseller">
											Best Seller
										</div>

										<img src="{{asset('img/fav.png')}}" class="badge-add-favorite" alt="">

										@elseif ($key % 2 == 1)
										<div class="badge badge-discount">
											20%
										</div>
										@endif

										<i class="ik ik-plus badge-add-product"></i>

										<img src="{{asset('storage/'.$product['image'])}}" alt="{{$product['title']}}" class="list-thumbnail responsive border-0">
									</div>

									<div class="row">
										<div class="col-md-8">
											<div class="product-title mb-2">
												{{$product['title']}}
											</div>
											@if($product['offer_price'])
											<div class="product-price">
												Rp.{{ number_format($product['offer_price'])}}
											</div>
											<div class="product-price text-muted">
												<small>Rp.<s>{{number_format($product['regular_price'])}}</s></small>
											</div>
											@else
											<span class="product-price"><span class="price-symbol">Rp.</span>{{ number_format($product['regular_price'])}}</span>
											@endif
										</div>
										<div class="col-md-4">
											<img src="{{asset('img/sold.png')}}" alt="" class="badge-soldout">
										</div>
									</div>
								</div>
							</div>
							@endforeach
						</div>
					</div>
				</div>
				<div class="col-sm-4 bg-white product-cart-area f1">
					<div class="product-selection-area">
						<div class="d-flex justify-content-between align-items-center">
							<h5 class="mb-0"> Order Details</h6>
								<i class="text-danger ik ik-refresh-ccw cursor-pointer font-15" onclick="cleartCart()"></i>
						</div>
						<hr>
						<div id="product-cart" class="product-cart mb-3">
							<!-- Uncomment to preview original cart html
							====================================================
							<div class="d-flex justify-content-between position-relative">
								<i class="text-red ik ik-x-circle cart-remove cursor-pointer" onclick="removeCartItem(ID)"></i>
								<div class="cart-image-holder">
									<img src="IMAGE_SRC">
								</div>
								<div class="w-100 p-2">
									<h5 class="mb-2 cart-item-title">ITEM_NAME</h5>
									<div class="d-flex justify-content-between">
										<span class="text-muted">QUANTITYx</span>
										<span class="text-success font-weight-bold cart-item-price">SUBTOTAL</span>
									</div>
								</div>
							</div> -->
						</div>
							<div class="d-flex justify-content-between font-15 align-items-center my-2">
								<span>Total</span>
								<strong id="total-products">0.00</strong>
							</div>
							<div class="d-flex justify-content-between font-15 align-items-center my-2">
								<span>Tax {{ \Auth::user()->bussiness->first()->tax}}%</span>
								<strong id="tax-products">0.00</strong>
							</div>
							<div class="d-flex justify-content-between font-15 align-items-center">
								<span>Discount</span>
								<input class="form-control font-15 text-right" style="width: 150px;" id="discount">
							</div>
							<div class="d-flex justify-content-between font-15 align-items-center">
								<span>Pay</span>
								<input class="form-control font-15 text-right" style="width: 150px;" id="pay">
							</div>
							<div class="d-flex justify-content-between font-20 align-items-center mt-2">
								<b>Total</b>
								<b id="total-bill">0.00</b>
							</div>
							<div class="d-flex justify-content-between font-20 align-items-center">
								<b>Change</b>
								<b id="change">0.00</b>
							</div>
							<hr>
							<label class="d-block">Customer Information</label>
							<div class="d-block">
								<div class="form-group">
									<input type="text" name="customer_name" id="customer_name" class="form-control" placeholder="Enter Customer Name">
								</div>
								<div class="form-group">
									{{-- SELECT TABLE --}}
									<select class="form-control select2" id="table_id" name="table_id">
										<option selected="selected" value="">Select Table</option>
										@foreach ($tables as $item)
										<option value="{{ $item->id }}" {{ ($item->qty_available == 0 || $item->status == 3 || $item->status == 4) ? 'disabled' : '' }}>
											{{ $item->number }}

											@if ($item->status == 1)
											<span class="badge badge-success">{{ "(Available $item->qty_available)" }}</span>
											@elseif ($item->status == 2)
											<span class="badge badge-warning">{{ "(Reserved $item->qty_available)" }}</span>
											@elseif ($item->status == 3)
											<span class="badge badge-danger">Occupied</span>
											@else
											<span class="badge badge-danger">Not Available</span>
											@endif
										</option>
										@endforeach
									</select>
								</div>
								<div class="form-group">
									<textarea type="text" id="note" name="note" class="form-control h-82px" placeholder="Note"></textarea>
								</div>
							</div>
						<div class="box">
							<button class="btn btn-danger btn-checkout btn-pos-checkout" onclick="updateInvoice()">PLACE ORDER</button>
						</div>
					</div>

				</div>
			</div>
		</div>
	</div>
	<!-- initiate modal menu section-->
	@include('include.modalmenu')

	<!-- Preview Invoice Modal -->
	<div class="modal fade edit-layout-modal pr-0 " id="InvoiceModal" role="dialog" aria-labelledby="InvoiceModalLabel" aria-hidden="true">
		<div class="modal-dialog mw-70" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="InvoiceModalLabel">Preview Invoice</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
				</div>
				<div class="modal-body">
					<form action="{{ route('invoice.store') }}" method="POST" enctype="multipart/form-data">
						@csrf
						<div class="card-header">
							<h3 class="d-block w-100">{{ \Auth::user()->bussiness->first()->name ?? '-' }}<small class="float-right">{{ \Auth::user()->name }}</small></h3>
						</div>
						<div class="card-body">
							<div id="detailInvoice"></div>
							<div class="row no-print">
								<div class="col-12">
									<button type="submit" class="btn btn-success pull-right"><i class="fa fa-credit-card"></i> Submit Payment</button>
									<button type="button" class="btn btn-primary pull-right"><i class="fa fa-download"></i> Generate PDF</button>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<!-- initiate scripts-->
	<script src="{{ asset('all.js') }}"></script>
	<script src="{{ asset('dist/js/theme.js') }}"></script>
	<script>
		const parser = new DOMParser();

		function decodeString(inputStr) {
			return parser.parseFromString(`<!doctype html><body>${inputStr}`, 'text/html').body.textContent
		}

		var cart = {};
		$(document).on('click', '.pos-product-card', function() {
			var product = JSON.parse(decodeString($(this).data('info')));
			var price = product.offer_price ? product.offer_price : product.regular_price;
			var id = product.id;

			if (cart.hasOwnProperty(id)) {
				cart[id].quantity++;
				cart[id].subtotal = price * cart[id].quantity;
			} else {
				cart[id] = {
					name: product.title,
					image: 'storage/' + product.image,
					price: price,
					quantity: 1,
					subtotal: price,
				};
			}
			// Update cart table
			updateCartTable();
		});

		$(document).on('keyup', '#discount', function() {
			updateCartTable();
		});

		$(document).on('keyup', '#pay', function() {
			updateCartTable();
		});

		function removeCartItem(id) {
			delete cart[id];
			updateCartTable();
		}

		function cleartCart() {
			if (confirm('Are you sure to clear cart?')) {
				cart = {};
				$('#discount').val(0)
				updateCartTable();
			}
		}

		// Function to update the cart table
		function updateCartTable() {
			var $cartTable = $('#product-cart'),
				$cartTotal = $('#subtotal-products'),
				$totalText = $('#total-bill');
			$change = $('#change');
			$total = $('#total-products');
			$tax = $('#tax-products');

			var cartTotal = 0,
				discount = $('#discount').val();
			pay = $('#pay').val();
			change = $('#change').val();

			// Empty cart table
			$cartTable.empty();

			// Loop through cart items and add them to cart table
			for (var id in cart) {
				if (cart.hasOwnProperty(id)) {
					var item = cart[id];
					// CONVERT item.subtotal TO INTEGER
					item.subtotal = parseInt(item.subtotal);
					// CONVERT TO CURENCY FORMAT IDR
					item.subtotal_format = item.subtotal.toLocaleString('id-ID', {
						style: 'currency',
						currency: 'IDR'
					});
					var $tr = `<div class="d-flex justify-content-between position-relative">
								<div class="cart-image-holder">
									<img src="${item.image}">
								</div>
								<div class="w-100 p-2">
								<div class="d-flex justify-content-between">
								<h5 class="mt-3 cart-item-title">${item.name}</h5>
								<div class="d-flex justify-content-between mt-2">
									<div class="border1">
										<button type="button" class="btn btn-sm btn-outline-primary no-border" onclick="decrease(${id})">-</button>
										<span class="text-muted" style="line-height: 30px;">${item.quantity}x</span>
										<button type="button" class="btn btn-sm btn-outline-primary no-border" onclick="increase(${id})">+</button>
									</div>           
										<span class="text-black font-weight-bold cart-item-price mt-1">${item.subtotal_format}</span>
									</div>           
								</div>
								</div>
							</div>`;
					$cartTable.append($tr);
					cartTotal += item.subtotal;
				}
			}
			// CONVERT TO CURENCY FORMAT IDR
			cartTotal_format = cartTotal.toLocaleString('id-ID', {
				style: 'currency',
				currency: 'IDR'
			});

			var total = cartTotal - discount;
			tax = total * 0.{{ \Auth::user()->bussiness->first()->tax}};
			grandtotal = total + tax;
			var change = pay - grandtotal;
			// CONVERT TO CURENCY FORMAT IDR
			total_format = total.toLocaleString('id-ID', {
				style: 'currency',
				currency: 'IDR'
			});
			// CONVERT TO CURENCY FORMAT IDR
			change_format = change.toLocaleString('id-ID', {
				style: 'currency',
				currency: 'IDR'
			});
			// CONVERT TO CURENCY FORMAT IDR
			tax_format = tax.toLocaleString('id-ID', {
				style: 'currency',
				currency: 'IDR'
			});
			// CONVERT TO CURENCY FORMAT IDR
			grandtotal_format = grandtotal.toLocaleString('id-ID', {
				style: 'currency',
				currency: 'IDR'
			});

			// Update cart total
			$totalText.text((grandtotal_format));
			$change.text((change_format));
			$total.text((cartTotal_format));
			$cartTotal.text(grandtotal_format);
			$tax.text((tax_format));
		}

		function decrease(id) {
			if (cart[id].quantity == 1) {
				removeCartItem(id);
			}
			cart[id].quantity--;
			cart[id].subtotal = cart[id].price * cart[id].quantity;
			updateCartTable();
		}

		function increase(id) {
			cart[id].quantity++;
			cart[id].subtotal = cart[id].price * cart[id].quantity;
			updateCartTable();
		}

		function updateInvoice() {
			// GET DATA ITEM FROM CART
			var items = [];
			for (var id in cart) {
				if (cart.hasOwnProperty(id)) {
					var item = cart[id];
					items.push({
						name: item.name,
						price: item.price,
						tax: 0.{{ \Auth::user()->bussiness->first()->tax}},
						quantity: item.quantity,
						subtotal: item.subtotal,
						product_id: parseInt(id),
					});
				}
			}

			var discount = $('#discount').val();
			var customer_name = $('#customer_name').val();
			var table_id = $('#table_id').val();
			var note = $('#note').val();
			var pay = $('#pay').val();

			// POST WITH AJAX
			$.ajax({
				url: "{{ route('pos.updateInvoice') }}",
				type: "POST",
				data: {
					_token: "{{ csrf_token() }}",
					items: items,
					discount: discount,
					customer_name: customer_name,
					table_id: table_id,
					note: note,
					pay: pay,
				},
				success: function(data) {
					$('#detailInvoice').html(data);
					// OPEN TOGGLE AND MODAL in ID InvoiceModal
					$('#InvoiceModal').toggleClass('show');
					$('#InvoiceModal').modal('show');

				}
			});
		}
	</script>
</body>

</html>