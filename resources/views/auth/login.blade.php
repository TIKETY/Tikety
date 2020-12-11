@extends('layout.standard_app')

@section('content')
   <!-- sign-in -->
   <section id="sign-in" class="whitebox position-relative padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3 col-md-8 offset-md-2 col-sm-10 offset-sm-1 whitebox">
                <div class="widget logincontainer shadow-lg">
                    <h3 class="darkcolor bottom30 text-center text-lg-left">{{ __('Login') }}</h3>
                    <form class="getin_form border-form" id="login" method="POST" action="{{ route('login', app()->getLocale()) }}">
                        @csrf
                        <div class="row">
                            <div class="col-md-12 col-sm-12">
                                <div class="form-group bottom35">
                                    <label for="loginEmail" class="d-none"></label>
                                    <input id="phone_number" type="text" placeholder="{{ __('Phone Number:') }}" class="form-control @error('phone_number') is-invalid @enderror" name="phone_number" required  autofocus>

                                    @error('phone_number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-12">
                                <div class="form-group bottom35">
                                    <label for="loginPass" class="d-none"></label>
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="{{ __('Password:') }}" required autocomplete="current-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-12">
                                <div class="form-group bottom30 ml-1">
                                    <div class="form-check text-left">
                                        <input class="form-check-input" checked type="checkbox" value="" id="rememberMe" {{ old('remember') ? 'checked' : '' }}>
                                        <label class="form-check-label" for="rememberMe">
                                        {{ __('Keep Me Signed In') }}
                                    </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <button type="submit" class="button gradient-btn">{{ __('Login') }}</button>
                                <a href="{{ route('loginfacebook', app()->getLocale()) }}" class="button gradient-btn">{{ __('Login with Facebook') }}</a>
                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('forgot', ['language'=>app()->getLocale()]) }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                                <p class="top30 mb-0"> {{ __('Don\'t have an account?') }} &nbsp;<a href="{{ route('register', app()->getLocale()) }}" class="defaultcolor">{{ __('Sign Up Now') }}</a> </p>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- sign-in ends -->

@endsection
