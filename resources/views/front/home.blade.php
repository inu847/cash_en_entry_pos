@extends('layouts.front')

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
			font-size: 45px;
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
		.f4{
			font-family: "Inter";
			font-size: 30px;
			font-weight: 400;
			line-height: 24.2px;
			text-align: center;
			color: white;
		}
		.f5{
			font-family: "Inter";
			font-size: 13px;
			font-weight: 400;
			text-align: center;
			color: white;
		}
		.f6{
			font-family: "Inter";
			font-size: 35px;
			font-weight: 400;
		}
		.f7{
			padding-top: 50px;
			font-family: "Inter";
			font-size: 20px;
			font-weight: 400;
			line-height: 24px;
		}
		.f8{
			padding-top: 10px;
			font-family: "Inter";
			font-size: 26px;
			font-weight: 400;
			line-height: 24px;
		}
		.f9{
			margin-bottom:20px;
			padding-top: 20px;
			font-family: "Inter";
			font-size: 15px;
			font-weight: 400;
			line-height: 24px;
			font-style: italic;
		}
		.f10{
			margin-bottom:20px;
			padding-top: 50px;
			font-family: "Inter";
			font-size: 15px;
			font-weight: 400;
			line-height: 24px;
		}
		.f11{
			margin-bottom:40px;
			font-family: "Inter";
			font-size: 40px;
			font-weight: 800;
			line-height: 24px;
			color: rgba(49,36,92,1) ;
			text-align: center;
		}
		.f12{
			margin-bottom:20px;
			font-family: "Inter";
			font-size: 60px;
			font-weight: 800;
			line-height: 24px;
			text-align: center;
		}
		.f13{
			margin:13px 0 0px 0;
			padding:0px 70px 0px 0;
			font-family: "Inter";
			font-size: 15px;
			font-weight: 600;
			line-height: 18px;
			color: white;
		}
		.f14{
			margin:0px 0 0px 0;
			font-family: "Inter";
			font-size: 25px;
			font-weight: 800;
			line-height: 24px;
			color: white;
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
		.bg-footer{
			height: 510px;
			background-image: linear-gradient(#31245C, #31245C);
			padding: 100px 7% 30px 7%;
			margin: 50px 0px 0px 0px;
		}
		.bg1{
			height: 470px;
			background-image: linear-gradient(#31245C, #674CC2);
			padding: 25px 70px 30px 70px;
		}
		.bg2{
			height: 313px;
			padding: 50px 10% 50px 10%;
		}
		.bg3{
			border-radius: 25px;
			height: 260px;
			padding: 90px 10px 50px 10px;
			margin: 50px 25px 55px 25px;
		}
		.bg4{
			height: 650px;
			padding: 90px 10% 0px 10%;
			text-align: center;
			color: white;
		}
		.bg5{
			height: 880px;
			padding: 90px 10% 0px 10%;
			margin: -170px 10% 200px 10%;
			border-radius: 25px;
			text-align: center;
			box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
		}
		.color1{
			background-image: linear-gradient(#31245C, #31245C);
		}
		.color2{
			background-image: linear-gradient(#FFFFFF, #FFFFFF);
		}
		.model1{
			margin-top: -45px;
   			margin-left: -100px;
		}
		.mx1{
			margin	: 40px 80px 0px 80px;
		}
		.mx2{
			margin	: 80px 100px 0px 100px;
		}
		.mx3{
			margin	: 0px 100px 0px 100px;
		}
		.mx4{
			margin	: 0px 110px 0px 110px;
		}
		.mx5{
			margin-left: auto;
			margin-right: auto;
		}
		.w1{
			margin: -175px 40px 25px 40px;
			padding	: 30px 30px 30px 30px;
			background-color: #fff;
			border-radius: 50%;
			box-shadow: 0 4px 8px 0 rgba(114,61,218,1), 0 6px 20px 0 rgba(114,61,218,1);
		}
		.w2{
			margin: -175px 55px 30px 55px;
			padding	: 30px 30px 30px 30px;
			background-color: #31245C;
			border-radius: 50%;
			border: 10px solid #723DDA;
		}
		.p1{
			height: 500px;
			width: 100%;
			background-image: linear-gradient(#31245C);
			padding: 65px 190px 30px 185px;
			margin: 10% 10% 10% 10%; 
		}
		.btn-succes{
			font-size: 15px;
            border-radius: 30px;
            padding: 27px 45px;
            line-height: 0.2;
            background-color: rgba(35, 221, 31, 1);
        }
		.btn-purple{
            border-radius: 10px;
			margin: 10px;
            padding: 23px 55px 23px;
            line-height: 0.1;
            background-image: linear-gradient(#31245C, #31245C);
        }
        .btn-outline-light{
			font-size: 15px;
            border-radius: 30px;
            padding: 27px 45px;
            line-height: 0.2;
        }

		.list-basic{
			padding-top:20px;
		}

		.list-basic p{
			font-size:20px;
			margin:20px -60px 0px -20px !important;
			text-align:start;
			z-index:1000;
			color:black;
		}

		.check-icon{
			z-index:200;
			width:30px;
			margin-left:-10px;
			padding-right:10px;
		}
		/* accordion */
		.accordion {
			background-image: linear-gradient(#31245C, #31245C);
			color: white;
			cursor: pointer;
			padding: 15px;
			margin: 60px 0 0px 0;
			width: 100%;
			border: none;
			border-radius: 10px;
			text-align: left;
			outline: none;
			font-size: 20px;
			font-family: "Inter";
			transition: 0.4s;
		}

		button.active, .accordion:hover {
			background-color: #ccc;
		}

		button.accordion:after {
			content: '\002B';
			color: #777;
			font-weight: bold;
			float: right;
			margin-left: 5px;
		}
		
		button.active:after{
			content: "\2212";
		}

		.panel {
			margin: -20px 8px 0px 8px;
			padding: 0px 18px;
			background-image: linear-gradient(#4B2E83, #4B2E83);
			max-height: 0;
			overflow: hidden;
			transition: max-height 0.2s ease-out;
			border-radius: 10px;
			color: white;
		}

    </style>
@endpush

@section('content')
		<div class="bg1">
			<div class="row mx1">
		<div class="col-md-8">	
		<h1 class="f1 text-light">
			Kemudahan Kasir <br>Kinerja Usaha Meningkat
			</h1>
			<p class="text-light f2" style="padding-right: 80px;font-size: 13px;">Satu-satunya partner POS yang membantu Anda untuk bisa <br>berjualan online secara mandiri. Gunakan aplikasi kasir Cash n Entry, <br>dan terima pesanan offline dan online sekaligus, saling terintegrasi.</p>
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
				<div class="bg3 color1">
					<div class="w1">
					<img width="110" src="{{ asset('img/cube 1.png') }}">
					</div>
					<p class="f4 bold">QR Code scan</p>
					<p class="f5">konsumen cukup memindai barcode tanpa menginstall apliasi apapun</p>
				</div>
				<div class="bg3 color1">
					<div class="w1">
					<img width="110" src="{{ asset('img/mobile-payment 1.png') }}">
					</div>
					<p class="f4 bold">Online Payment</p>
					<p class="f5">konsumen dapat membayar melalui aplikasi website ini tanpa perlu datang ke kasir</p>
				</div>
				<div class="bg3 color1">
					<div class="w1">
					<img width="110" src="{{ asset('img/artist 1.png') }}">
					</div>
					<p class="f4 bold">Design Custom</p>
					<p class="f5">Restoran dapat mengatur dan memasukkan pembaruan menu secara mandiri.</p>
				</div>
				</div>
			<div class="col-md-4">
				<div class="bg3 color1">
					<div class="w1">
					<img width="110" src="{{ asset('img/food-menu 1.png') }}">
					</div>
					<p class="f4 bold">Menu</p>
					<p class="f5">Konsumen dapat melihat dan memesan Menu melalui apliasi website ini</p>
				</div>
				<div class="bg3 color1">
					<div class="w1">
					<img width="110" src="{{ asset('img/real-time-strategy 1.png') }}">
					</div>
					<p class="f4 bold">Point of Sales</p>
					<p class="f5">cash n entry menyediakan fitur yang terintegrasi dengan menu digital yang dapat mencatat penjualan secara real time</p>
				</div>
			</div>
			<div class="col-md-4">
				<div class="bg3 color1">
					<div class="w1">
					<img width="110" src="{{ asset('img/delivery-box 1.png') }}">
					</div>
					<p class="f4 bold">Tracking</p>
					<p class="f5">Konsumen dapat memonitor proses makanan hanya dari meja</p>
				</div>
				<div class="bg3 color1">
					<div class="w1">
					<img width="110" src="{{ asset('img/in-stock 1.png') }}">
					</div>
					<p class="f4 bold">Stock Opname</p>
					<p class="f5">cash n entry menyediakan fitur stok gudang yang terintegrasi dengan pesanan secara real-time</p>
				</div>
			</div>
		</div>
		<div class="container">
			<img width="1100" src="{{ asset('img/pembayaran.png') }}">	
		</div>
		<div class="bg4 color1"> 
			<p class="f6 bold">Super Hemat dengan Cash n Entry</p>
			<p class="f7">Mulai dari 2000an per hari. Solusi Aplikasi Kasir Olsera diakui paling komplit secara fitur, sekaligus paling ekonomis dari sisi harga. Dipersembahkan oleh anak-anak bangsa, untuk UMKM Indonesia yang mengidamkan solusi kelas tertinggi dengan harga paling ramah.</p>
		</div>
		<div class="row mx3" id="software">
			<div class="col-md-6">
				<div class="bg5 color2">
					<div class="w2">
					<img width="110" src="{{ asset('img/cne silver 1.png') }}">
					</div>
					<p class="f6 bold">Basic</p>
					<p class="f8">Rp. 100.000 / bulan</p>
					<a href="" class="btn btn-purple text-light f7 bold">Coba Gratis 14 Hari</a>
					<p class="f9">Untuk usaha rintisan dengan fitur standar <br>dan akses 3 perangkat.</p>
					<div class="list-basic">
						<p><img class="check-icon" src="{{ asset('img/check-icon.png')}}" alt="check-icon">POS di Android & Windows</p>
						<p><img class="check-icon" src="{{ asset('img/check-icon.png')}}" alt="check-icon">App Backoffice</p>
						<p><img class="check-icon" src="{{ asset('img/check-icon.png')}}" alt="check-icon">Fitur Online Delivery</p>
						<p><img class="check-icon" src="{{ asset('img/check-icon.png')}}" alt="check-icon">Fitur Menengaah</p>
						<p><img class="check-icon" src="{{ asset('img/check-icon.png')}}" alt="check-icon">Laporan Profesional</p>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="bg5 color2">
				<div class="w2">
					<img width="110" src="{{ asset('img/cne gold 1.png') }}">
					</div>
					<p class="f6 bold">Premium</p>
					<p class="f8">Rp. 150.000 / bulan</p>
					<a href="" class="btn btn-purple text-light f7 bold">Coba Gratis 14 Hari</a>
					<p class="f9">Untuk usaha berkembang dengan fitur <br>lengkap, tanpa batasan akses perangkat</p>
					<div class="list-basic">
						<p><img class="check-icon" src="{{ asset('img/check-icon.png')}}" alt="check-icon">POS di Android & Windows</p>
						<p><img class="check-icon" src="{{ asset('img/check-icon.png')}}" alt="check-icon">App Backoffice</p>
						<p><img class="check-icon" src="{{ asset('img/check-icon.png')}}" alt="check-icon">Fitur Online Delivery & Take Away</p>
						<p><img class="check-icon" src="{{ asset('img/check-icon.png')}}" alt="check-icon">Fitur Online Dine In & Reservation</p>
						<p><img class="check-icon" src="{{ asset('img/check-icon.png')}}" alt="check-icon">Fitur Lengkap</p>
						<p><img class="check-icon" src="{{ asset('img/check-icon.png')}}" alt="check-icon">Laporan Profesional</p>
						<p><img class="check-icon" src="{{ asset('img/check-icon.png')}}" alt="check-icon">Website Bisnis</p>
					</div>
				</div>
			</div>
		</div> 
		<div class="mx4">
			<p class="f11">Frequently Asked Question </p>
			<p class="f12">FAQ</p>
		<button class="accordion bold">Mengapa susah untuk login?</button>
		<div class="panel">
			<p class="f10">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
		</div>
		<button class="accordion bold">Why should we ... ?</button>
		<div class="panel">
			<p class="f10">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
		</div>
		<button class="accordion bold">Lorem ipsum dolor sit amet</button>
		<div class="panel">
			<p class="f10">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
		</div>
		<button class="accordion bold">Lorem ipsum dolor sit amet</button>
		<div class="panel">
			<p class="f10">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
		</div>
		</div>
		<div class="bg-footer row">
			<div class="row">
			<div class="col-md-5">
			<img width="240" src="{{ asset('img/Group 3.png') }}">
			<p class="f13 mt-5">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore dan dolore magna aliqua.</p>
			</div>
			<div class="col-md-3">
				<p class="f14">Navigation</p>
				<p class="f13">Home</p>
				<p class="f13">About Us</p>
				<p class="f13">Service</p>
				<p class="f13">Features</p>
			</div>
			<div class="col-md-4">
				<p class="f14">Information</p>
				<p class="f13">+ 123-456-789-10</p>
				<p class="f13">cashnentry@gmail.com</p>
				<p class="f13">JL.Panglima No.26, Talun, Blitar.</p>
			</div>
			</div>
			<p class="f13 mx5">Copyright ©️2020 All right reserved l Block is made with by  <span class="text-purple">CashNEntry</span></p>
		</div>


		<!-- js -->
		<script>
		var acc = document.getElementsByClassName("accordion");
		var i;

		for (i = 0; i < acc.length; i++) {
		acc[i].addEventListener("click", function() {
			this.classList.toggle("active");
			var panel = this.nextElementSibling;
			if (panel.style.maxHeight) {
			panel.style.maxHeight = null;
			} else {
			panel.style.maxHeight = panel.scrollHeight + "px";
			} 
		});
		}
		</script>
@endsection