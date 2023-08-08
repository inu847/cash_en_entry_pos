<!doctype html>
<html class="no-js" lang="en">
    <head> 
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Cash N Entry | Point Of Sales Multi Vendor</title>
        <meta name="description" content="">
        <meta name="keywords" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <link rel="icon" href="{{ asset('favicon.png') }}" type="image/x-icon" />

        <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:300,400,600,700,800" rel="stylesheet">
        
        <script src="{{ asset('js/app.js') }}"></script>

        <!-- themekit admin template asstes -->
        <link rel="stylesheet" href="{{ asset('all.css') }}">
        <link rel="stylesheet" href="{{ asset('dist/css/theme.css') }}">
        <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
        <link rel="stylesheet" href="{{ asset('plugins/icon-kit/dist/css/iconkit.min.css') }}">
        <link rel="stylesheet" href="{{ asset('plugins/ionicons/dist/css/ionicons.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    </head>

	<style>
		.topbar_menu{
			margin: 0px 20px;
			font-size: 20px;
			font-weight: 600;
		}
		/* STICKY TOP WHEN SCROLL */
		.sticky-top{
			padding: 15px 50px !important;
			background-color: rgba(255, 255, 255, 0.801);
		}
		.btn-success{
			background-color: #fb9800;
			border-color: #fb9800;
		}
		.down-lp{
			background-image: url('{{asset("/img/down_lp.jpg")}}');
			height: 358px;
		}
		.content-down-lp{
			padding-top: 100px;
			text-align: center;
			color: white;
			font-size: 40px;
			font-weight: 600;
		}
	</style>

    <body class="home-gradient-bg">
		<div class="sticky-top">
			<div class="d-flex justify-content-between">
				<div>
					<a href="/">
		            	<img height="40" src="{{ asset('img/logo_horizontal.png') }}">
		            </a>
				</div>
				<div>
					<a class="topbar_menu" href="">Beranda</a>
					<a class="topbar_menu" href="">Tentang Kami</a>
					<a class="topbar_menu" href="">Fitur</a>
					<a class="topbar_menu" href="">Our Team</a>
					<a class="topbar_menu" href="">Contact Us</a>
					<a href="" style="margin: 0px 20px;">
						<select class="p-2" id="language" name="language" onchange="location = this.value;">
							<option value="EN">EN</option>
							<option value="ID">ID</option>
						</select>
					</a>
					<a style="margin-left: 20px;" class="btn btn-success btn-rounded mr-3" href="">Pesan Sekarang</a>
				</div>
			</div>
		</div>

		<div class="radmin-bannner text-center">
			<img  src="{{asset('/img/banner.gif')}}">
		</div>

		{{-- CONTENT --}}
		<div class="container mb-3">
			<div class="text-center" style="margin-bottom: 50px;">
				<div style="color: blue; font-size: 40px; font-weight: 600;">Kenapa Harus Kami?</div>
				<p style="font-size: 15px; font-weight: 600;">Bagaimana Cash n Entry Mendukung Bisnis Anda secara End-to-End</p>
			</div>

			<div class="row">
				<div class="col-md-4 mb-3">
					<img src="{{ asset('img/qrcode_code_lp.png') }}" width="100%" alt="">
				</div>
				<div class="col-md-4 mb-3">
					<img src="{{ asset('img/menu_digital_lp.png') }}" width="100%" alt="">
				</div>
				<div class="col-md-4 mb-3">
					<img src="{{ asset('img/tracking_order_lp.png') }}" width="100%" alt="">
				</div>
				<div class="col-md-4 mb-3">
					<img src="{{ asset('img/image_vidio_lp.png') }}" width="100%" alt="">
				</div>
				<div class="col-md-4 mb-3">
					<img src="{{ asset('img/online_payment_lp.png') }}" width="100%" alt="">
				</div>
				<div class="col-md-4 mb-3">
					<img src="{{ asset('img/pos_lp.png') }}" width="100%" alt="">
				</div>
				<div class="col-md-4 mb-3">
					<img src="{{ asset('img/custom_design_lp.png') }}" width="100%" alt="">
				</div>
				<div class="col-md-4 mb-3">
					<img src="{{ asset('img/so_lp.png') }}" width="100%" alt="">
				</div>
			</div>
		</div>

		<div class="radmin-bannner text-center down-lp">
			{{-- ADD IMAGE AND SET TEXT IN CENTER IMAGE --}}
			<div class="content-down-lp">
				<div style="font-weight: 600;">
					Newslatters
				</div>
				<p class="text-thite" style="font-weight: 600 !important;">Dapatkan informasi seputar penawaran spesial kami, serta berbagai artikel menarik seputar bisnis F&B</p>
			</div>
			<input type="text" style="color: black; border-radius: 25px; padding: 15px 50px;" placeholder="Enter Your Email">
		</div>

		<div class="container" style="margin-top: 30px;">
			<div class="row">
				<div class="col-md-6">
					<div style="font-size: 35px;color: #40128b;border-bottom: 3px solid #b78dc2;margin-bottom: 10px;">Frequently Asked Questions</div>
					<div class="accordion" id="accordionExample">
						<div class="card">
						  <div class="card-header" id="headingOne" style="background-color: #6b3080;">
							<h2 class="mb-0">
							  <button class="btn btn-link btn-block text-left text-white" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
								Apakah Konsumen perlu mendownload aplikasi
							  </button>
							</h2>
						  </div>
					  
						  <div id="collapseOne" style="background-color: #b78dc2;" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
							<div class="card-body text-white">
								Tidak Cash n Entry Berbasis website jadi konsumen hanya perlu melakukan scan barcode yang nantinya akan terhubung ke website restoran tanpa perlu install aplikasi
							</div>
						  </div>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<img src="{{ asset('img/foo_lp.png') }}" alt="">
				</div>
			</div>
		</div>

		<div class="row justify-content-center">
			<div class="my-5">
				<p class="text-center">Need Help?</p>
				<div class="card-body template-demo text-center">
					<a href="" class="btn social-btn text-white btn-google"><i class="ik ik-globe"></i></a>
					<a href="" class="btn social-btn text-white btn-facebook "><i class="fab fa-github"></i></a>
					<a href="" class="btn social-btn text-white btn-twitter"><i class="fab fa-twitter"></i></a>
					<a href="" class="btn social-btn text-white btn-linkedin"><i class="fab fa-linkedin"></i></a>
				</div>
			</div>
		</div>

		<script src="{{ asset('all.js') }}"></script>
        
    </body>
</html>

