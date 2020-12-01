@extends('layout.app')

@section('content')
<!-- reset password -->
    <section id="sign-in" class="whitebox position-relative padding">
        <div class="container">
            <div class="row">

                <div class="col-lg-6 offset-lg-3 col-md-8 offset-md-2 col-sm-10 offset-sm-1 whitebox">
                    <div class="widget logincontainer shadow text-center text-md-left">
                        <h3 class="darkcolor bottom35">Verification Code</h3>
                        @if (session('number_message'))
                        <div class="alert alert-success" role="alert">
                            {{ session('number_message') }}
                        </div>
                        @endif
                        <form class="getin_form border-form" id="ResetPassword" method="POST" action="{{ route('verification_code_post') }}">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-md-12 col-sm-12">
                                    <div class="form-group bottom35">
                                        <label for="loginverification_code" class="mb-3 pl-0">Please enter the Verification Code which was sent to {{ auth()->user()->phone_number }}</label>
                                        <input id="verification_code" type="verification_code" class="form-control @error('verification_code') is-invalid @enderror" name="verification_code" required autocomplete="verification_code" autofocus>

                                @error('verification_code')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                    </div>
                                </div>
                                <div class="col-sm-12 forget-buttons">
                                    <button type="submit" class="button btn-primary mr-4">Verify</button>
                                    <a href="{{ route('verification_resend' }}" class="mr-4">Resend</a>
                                </div>
                            </div>
                            <input type="hidden" name="phone_number" value="{{ auth()->user()->phone_number }}">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- sign-in ends -->
@endsection
