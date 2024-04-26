<!doctype html>
<html class="no-js" lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>{{ __('Sign Up | Cash N Entry')}}</title>
        <meta name="description" content="">
        <meta name="keywords" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <link rel="icon" href="{{ asset('favicon.png') }}"/>

        <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:300,400,600,700,800" rel="stylesheet">
        
        <link rel="stylesheet" href="{{ asset('plugins/bootstrap/dist/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
        <link rel="stylesheet" href="{{ asset('plugins/ionicons/dist/css/ionicons.min.css') }}">
        <link rel="stylesheet" href="{{ asset('plugins/icon-kit/dist/css/iconkit.min.css') }}">
        <link rel="stylesheet" href="{{ asset('plugins/perfect-scrollbar/css/perfect-scrollbar.css') }}">
        <link rel="stylesheet" href="{{ asset('dist/css/theme.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
        <link rel="stylesheet" href="{{ asset('dist/css/theme-image.css') }}">
        <script src="{{ asset('src/js/vendor/modernizr-2.8.3.min.js') }}"></script>
        <link href="https://fonts.googleapis.com/css2?family=Russo+One&display=swap" rel="stylesheet">
    </head>
    <style>
        .lavalite-bg{
            background-image: url("{{ asset('img/auth.png') }}");
        }
        .auth-wrapper .lavalite-bg .lavalite-overlay{
            background: none;
        }
        .card-layative{
            padding: 30px;
            background-color: rgba(255, 255, 255, 0.25);
            margin: 150px 100px;
            border-radius: 5px;
        }
        .title1{
            color: #fff;
            font-size: 40px;
            font-weight: 400;
            /* FONT Russo One */
            font-family: 'Russo One', sans-serif;
            line-height: 1.2;
        }
        .title2{
            color: #723DDA;
            font-size: 40px;
            font-weight: 400;
            font-family: 'Russo One', sans-serif;
            line-height: 1.2;
        }
        .title3{
            color: #fff;
            font-size: 14px;
            font-weight: 400;
            font-family: 'Russo One', sans-serif;
        }
        .fav-layative{
            background-color: rgba(255, 255, 255, 0.25);
            border-radius: 5px;
            padding: 10px;
            width: 40px;
        }
    </style>
    <body>
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

        <div class="auth-wrapper">
            <div class="container-fluid">
                <div class="row flex-row bg-white">
                    <div class="col-xl-6 col-lg-6 col-md-6 my-auto p-0">
                        <div class="authentication-form mx-auto">
                            <div class="logo-centered">
                                <a href=""><img width="150" src="{{ asset('img/logo.png') }}" alt=""></a>
                            </div>
                            <p>{{ __('Join us today! It takes only few steps')}}</p>
                            <form action="{{url('register')}}" method="post">
                                @csrf
                                <div class="form-group">
                                    <input type="name" class="form-control" placeholder="Name" name="name" value="{{ old('name') }}" required>
                                    <i class="ik ik-user"></i>
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control" placeholder="Email" name="email" value="{{ old('email') }}" required>
                                    <i class="fa fa-envelope"></i>
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" placeholder="Password" name="password" required>
                                    <i class="ik ik-lock"></i>
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" placeholder="Confirm Password" name="password_confirmation" required>
                                    <i class="ik ik-eye-off"></i>
                                </div>
                                <div class="row">
                                    <div class="col-12 text-left">
                                        <label class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="item_checkbox" name="item_checkbox" value="option1">
                                            <span class="custom-control-label">&nbsp;{{ __('I Accept')}} <a href="#">{{ __('Terms and Conditions')}}</a></span>
                                        </label>
                                    </div>
                                </div>
                                <div class="sign-btn text-center">
                                    <button class="btn btn-theme">{{ __('Create Account')}}</button>
                                </div>
                            </form>
                            <div class="register">
                                <p>{{ __('Already have an account?')}} <a href="{{url('login')}}">{{ __('Sign In')}}</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6 p-0 d-md-block d-lg-block d-sm-none d-none lavalite-bg">
                        <div class="card-layative">
                            <div class="mb-3">
                                <img src="{{ asset('img/favicon.png') }}" alt="" width="25" class="fav-layative">
                            </div>

                            <div class="title1">
                                Atur Keuangan <br>
                                Usaha dengan <br>
                            </div>
                            <div class="title2 mb-3">
                                Satu Sentuhan
                            </div>
                            <div class="title3 mb-3">
                                Bersama kita kuat, majukan UMKM untuk <br> ekonomi yang lebih baik.
                            </div>
                        </div>
                        {{-- <div class="">
                            <div class="lavalite-overlay">
                            </div>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
        
        <script src="{{ asset('src/js/vendor/jquery-3.3.1.min.js') }}"></script>
        <script src="{{ asset('plugins/popper.js/dist/umd/popper.min.js') }}"></script>
        <script src="{{ asset('plugins/bootstrap/dist/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('plugins/perfect-scrollbar/dist/perfect-scrollbar.min.js') }}"></script>
        <script src="{{ asset('plugins/screenfull/dist/screenfull.js') }}"></script>
    </body>
</html>
