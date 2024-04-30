<!doctype html>
<html class="no-js" lang="en">
    <head> 
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>@yield('title') | Cash N Entry</title>
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
		<link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
        @stack('css')
    </head>
	<style>
		.topbar_menu{
			margin: 0px 20px;
			font-size: 18px;
			font-weight: 600;
			color: #31245C;
			font-family: 'Poppins', sans-serif;
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

    .bg-banner{
			height: 450px;
			background: linear-gradient(135deg, rgba(49, 36, 92, 1), rgba(103, 76, 194, 1));
			margin-bottom: 50px;
    }
	</style>

    <body class="home-gradient-bg">
		@include('components.front_nav')

        @yield('content')
		  
		<script src="{{ asset('all.js') }}"></script>
    </body>
</html>

