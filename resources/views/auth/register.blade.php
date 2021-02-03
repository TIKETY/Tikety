@extends('layout.standard_app')

@section('header_script')
    <x-recaptcha>
        register
    </x-recaptcha>
    <x-analytics></x-analytics>
@endsection

@section('content')
    <!-- Main sign-up section starts -->
    <section id="ourfaq" class="whitebox position-relative padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3 col-md-8 offset-md-2 col-sm-10 offset-sm-1 whitebox">
                    <div class="widget logincontainer shadow-lg">
                        <h3 class="darkcolor bottom35 text-center text-md-left">{{ __('Create Your account') }}</h3>
                        <form class="getin_form border-form" id="register" method="POST" action="{{ route('register', ['language'=>app()->getLocale()]) }}">
                            @csrf
                            <div class="row">
                                <div class="col-md-12 col-sm-12">
                                    <div class="form-group bottom35">
                                        <label for="registerName" class="d-none"></label>
                                        <input id="name" placeholder="{{ __('Name:') }}" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-12">
                                    <div class="form-group bottom35">
                                        <label for="registerphone_number" class="d-none"></label>
                                        <input id="phone_number" placeholder="{{ __('Phone Number:') }}" type="text" value="+255" class="form-control @error('phone_number') is-invalid @enderror" name="phone_number" value="{{ old('phone_number') }}" required autocomplete="phone_number">

                                        @error('phone_number')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-12">
                                    <div class="form-group bottom35">
                                        <label for="registerPass" class="d-none"></label>
                                        <input id="password" placeholder="{{ __('Password:') }}" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-12">
                                    <div class="form-group bottom35">
                                        <label for="registerPassConfirm" class="d-none"></label>
                                        <input id="password-confirm" placeholder="{{ __('Confirm Password:') }}" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <button data-callback="onSubmit" data-sitekey="{{ config('services.recaptcha.key') }}" type="submit" class="g-recaptcha button gradient-btn">{{ __('Register') }}</button>
                                    <p class="top20 log-meta"> {{ __('Already have an account?') }} &nbsp;<a href="{{ route('login', ['language'=>app()->getLocale()]) }}" class="defaultcolor">{{ __('Sign In') }}</a> </p>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Main sign-up section ends -->
@endsection
