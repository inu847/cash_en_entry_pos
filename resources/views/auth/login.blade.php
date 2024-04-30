@extends('layouts.auth')

@section('title')
    Login
@endsection

@section('content')
<form method="POST" action="{{ route('login') }}">
    @csrf
        <div class="form-group">
            <input id="email" type="email" placeholder="Email" class="form-control @error('email') is-invalid @enderror" name="email" value="admin@test.com" required autocomplete="email" autofocus>
            <i class="ik ik-user"></i>
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group">
            <input id="password" type="password" placeholder="Password" class="form-control @error('password') is-invalid @enderror" name="password"  value="1234" required>
            <i class="ik ik-lock"></i>
            @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        </div>
        <div class="row">
            <div class="col text-left">
                <label class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="item_checkbox" name="item_checkbox" value="option1">
                    <span class="custom-control-label">&nbsp;Remember Me</span>
                </label>
            </div>
            <div class="col text-right">
                <a class="btn text-danger" href="{{url('password/forget')}}">
                    {{ __('Forgot Password?') }}
                </a>
            </div>
        </div>
        <div class="sign-btn text-center">
            <button class="btn btn-custom">Sign In</button>
        </div>
        <div class="register">
            <p>{{ __('No account?')}} <a href="{{url('register')}}">{{ __('Sign Up')}}</a></p>
        </div>
        
    </form>
@endsection