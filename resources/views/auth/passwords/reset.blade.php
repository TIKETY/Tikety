@extends('layout.standard_app')

@section('header_script')
    <x-recaptcha>
        reset
    </x-recaptcha>
@endsection

@section('content')
    <!-- Main sign-up section starts -->
    <section id="ourfaq" class="whitebox position-relative padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3 col-md-8 offset-md-2 col-sm-10 offset-sm-1 whitebox">
                    <div class="widget logincontainer shadow-lg">
                        <h3 class="darkcolor bottom35 text-center text-md-left">{{ __('Change your Password') }}</h3>
                        @error('message')
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <form class="getin_form border-form" id="reset" method="POST" action="{{ route('resetPassword', ['language'=>app()->getLocale()]) }}">
                            @csrf
                            @method('PUT')
                            <div class="row">
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
                                    <button type="submit" data-callback="onSubmit" data-sitekey="{{ config('services.recaptcha.key') }}" class="g-recaptcha button btn-primary w-100">Reset Password</button>
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
