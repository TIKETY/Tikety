@extends('layout.app')

@section('content')
    <!-- Main sign-up section starts -->
    <section id="ourfaq" class="whitebox position-relative padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3 col-md-8 offset-md-2 col-sm-10 offset-sm-1 whitebox">
                    <div class="widget logincontainer shadow-lg">
                        <h3 class="darkcolor bottom35 text-center text-md-left">Create Your account </h3>
                        <form class="getin_form border-form" id="register" method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="row">
                                <div class="col-md-12 col-sm-12">
                                    <div class="form-group bottom35">
                                        <label for="registerName" class="d-none"></label>
                                        <input id="name" placeholder="Name:" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

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
                                        <input id="phone_number" placeholder="Phone Number:" type="text" class="form-control @error('phone_number') is-invalid @enderror" name="phone_number" value="{{ old('phone_number') }}" required autocomplete="phone_number">

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
                                        <input id="password" placeholder="Password:" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

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
                                        <input id="password-confirm" placeholder="Confirm Password:" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <button type="submit" class="button btn-primary w-100">Register</button>
                                    <p class="top20 log-meta"> Already have an account? &nbsp;<a href="{{ route('login') }}" class="defaultcolor">Sign In</a> </p>
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
