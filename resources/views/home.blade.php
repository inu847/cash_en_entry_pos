@extends('layouts.front2')

@section('title')
    Product
@endsection

@push('css')
    <link href="https://fonts.googleapis.com/css2?family=Russo+One&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Inter&display=swap" rel="stylesheet" >
    <style>
		.topbar_menu{
			top: 5px;
			margin: 0px 20px;
			font-size: 20px;
			
		}
		/* STICKY TOP WHEN SCROLL */
		.sticky-top{
			padding: 15px 50px !important;
			background-color: rgba(255, 255, 255, 0.801) !important;
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

		/* custom */
		.f1{
			font-family: "Russo One";
		}
		.right{
			float: right;
		}
		.left{
			float: left;
		}
		.f2{
			font-family: "Poppins";
			font-weight: 800;
		}
		.f3{
			font-family: "Inter";
			font-size: 20px;
			font-weight: 400;
			line-height: 24.2px;
		}
		.bold{
			font-weight: bold;
		}
		.algin-right{
			text-align: right;
		}
		.navbar-brand{
			top: 5px;
			margin: 0px 118px;
			font-weight: 600;
		}
		.bg1{
			height: 470px;
			background-image: linear-gradient(#31245C, #674CC2);
			padding: 25px 70px 30px 70px;
		}
		.bg2{
			height: 313px;
			padding: 50px 80px 50px 80px;
		}
		.bg3{
			height: 240px;
			padding: 50px 50px 50px 50px;
			margin: 50px 15px 50px 15px;
		}
		.color1{
			background-image: linear-gradient(#31245C, #31245C);
		}
		.model1{
			margin-top: -45px;
   			margin-left: -100px;
		}
		.mx1{
			margin	: 40px 80px 0px 80px;
		}
		.mx2{
			margin	: 80px 150px 0px 150px;
		}
		.p1{
			height: 500px;
			width: 100%;
			background-image: linear-gradient(#31245C);
			padding: 65px 190px 30px 185px;
			margin: 10% 10% 10% 10%; 
		}
		.btn-succes{
            border-radius: 30px;
            padding: 27px 45px;
            line-height: 0.2;
            background-color: rgba(35, 221, 31, 1);
        }
        .btn-outline-light{
            border-radius: 30px;
            padding: 27px 45px;
            line-height: 0.2;
        }
    </style>
@endpush

@section('content')

		<nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top">
			<a class="navbar-brand" href="/">
				<img height="22" src="{{ asset('img/logo_horizontal_new.png') }}">
			</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
			  <span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarText">
			  <ul class="navbar-nav navbar-brand ml-auto">
				<li class="nav-item active">
					<a class="topbar_menu f2" href="#beranda">Beranda</a>
				</li>
				<li class="nav-item mx-4">
					<a class="topbar_menu f2" href="#feature">Fitur</a>
				</li>
				<li class="nav-item">
					<a class="topbar_menu f2" href="#">Percing</a>
				</li>
				<li class="nav-item mx-5">
					<button type="button" class="btn btn-seccondary f2">LOGIN</button>
				</li>
				<li class="nav-item">
					<button type="button" class="btn btn-success f2">SIGN UP</button>
				</li>
			  </ul>
			</div>
		  </nav>
		{{-- CONTENT --}}
		<div class="bg1">
			<div class="row mx1">
		<div class="col-md-8">	
		<h1 class="f1 text-light" style="font-size: 45px;">
			Kemudahan Kasir <br>Kinerja Usaha Meningkat
			</h1>
			<p class="text-light f2" style="padding-right: 80px;font-size: 13px;">Satu-satunya partner POS yang membantu Anda untuk bisa <br>berjualan online secara mandiri. Gunakan aplikasi kasir Cash n Entry, dan terima pesanan offline dan online sekaligus, saling terintegrasi.</p>
			<div class="row" style="margin	: 60px 0px 0px 0px;">
                <div class="col-md-5 f2">
                    <a href="" class="btn btn-succes text-light">Coba Sekarang</a>
                </div>
                <div class="col-md-7 f2">
                    <a href="" class="btn btn-outline-light">Konsultasi Dulu</a>
                </div>
            </div>
		</div>
		<div class="col-md-4">
		<img class="model1" height="450" src="{{ asset('img/model1.png') }}">
		</div> 
		</div>
		</div>

		<div class="row bg2">
			<div class="col-md-6">
				<p class="f3 bold">Tampil Profesional, Jadi UMKM yang Berdaya Saing</p>
				<p class="f3">Premium tanpa biaya tambahan adalah impian kami agar setiap UMKM Indonesia dapat menikmati segala kemudahan dari teknologi terkini untuk menjadikan bisnis semakin kompetitif dengan biaya yang terjangkau dan minim investasi berbiaya tinggi.</p>
			</div>
			<div class="col-md-6">
				<img height="230" class="right" src="{{ asset('img/model2.png') }}">
			</div>
		</div>
		<div class="row bg2 color1">
			<div class="col-md-6">
				<img height="230" class="left" src="{{ asset('img/model3.png') }}">
			</div>
			<div class="col-md-6">
				<p class="f3 algin-right text-light bold">Online Order untuk Usaha Makanan dan Minuman</p>
				<p class="f3 algin-right text-light">Hargai waktu pelanggan Anda, hindari antrean tanpa perlu ke restoran dengan fitur Online Take Away dan Online Delivery. Berikan keistimewaan kepada pelanggan dengan kemudahan Online Reservation, atau kenyamanan memesan di tempat dengan Online Dine-In, langsung dari gadget mereka.</p>
			</div>
		</div>
		<div class="row bg2">
			<div class="col-md-6">
				<p class="f3 bold">Reservasi Online untuk Usaha Jasa</p>
				<p class="f3">Penjadwalan yang tepat serta respon reservasi online yang tanggap adalah kunci awal untuk penjualan yang optimal bagi usaha jasa. Bookingan online kini terhubung langsung dengan penjadwalan yang telah Anda susun. Gunakan Zenwel Biz, software penjualan yang dikhususkan untuk usaha jasa seperti spa, massage, salon kecantikan, gym, yoga, barbershop dan sejenisnya.</p>
			</div>
			<div class="col-md-6">
				<img height="230" class="right" src="{{ asset('img/model4.png') }}">
			</div>
		</div>
		<div class="row bg2 color1">
			<div class="col-md-6">
				<img height="230" class="left" src="{{ asset('img/model5.png') }}">
			</div>
			<div class="col-md-6">
				<p class="f3 algin-right text-light bold">Toko Online untuk Ritel dan Sejenisnya</p>
				<p class="f3 algin-right text-light">Miliki website atau aplikasi toko online whitelabel yang memudahkan Anda menjangkau pelanggan di mana pun, dipadukan dengan integrasi kemudahan pembayaran dan pengiriman pesanan ke alamat masing-masing.</p>
			</div>
		</div>
		<div class="row bg2">
			<div class="col-md-6">
				<p class="f3 bold">Perluas Jangkauan Pasar dan Tingkatkan Penjualan Anda</p>
				<p class="f3">Kami ingin bisnis Anda semakin berkembang. Dengan mengembangkan penjualan secara online, Anda dapat menjangkau lebih banyak calon pelanggan baru, menghasilkan lebih banyak penjualan baru.</p>
			</div>
			<div class="col-md-6">
				<img height="230" class="right" src="{{ asset('img/model6.png') }}">
			</div>
		</div>
		<div class="row bg2 color1">
			<div class="col-md-6">
				<img height="230" class="left" src="{{ asset('img/model7.png') }}">
			</div>
			<div class="col-md-6">
				<p class="f3 algin-right text-light bold">Upgrade ke Mobile App Whitelabel</p>
				<p class="f3 algin-right text-light">Semakin premium, semakin berkelas. Kapanpun Anda butuhkan, kami dapat membantu Anda untuk mewujudkan impian Anda untuk memiliki aplikasi mobile untuk brand bisnis Anda sendiri.</p>
			</div>
		</div>

		<div class="row mx2">
			<div class="col-md-4">
				<div class="bg3 color1"></div>
			</div>
			<div class="col-md-4">
				<div class="bg3 color1"></div>
			</div>
			<div class="col-md-4">
				<div class="bg3 color1"></div>
			</div>
		</div>

@endsection