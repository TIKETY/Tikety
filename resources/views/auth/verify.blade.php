@extends('layout.app')

@section('content')
<section id="sign-in" class="whitebox position-relative padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3 col-md-8 offset-md-2 col-sm-10 offset-sm-1 whitebox">
                <div class="widget logincontainer shadow-lg">
                    <h3 class="darkcolor bottom30 text-center text-lg-left">Sign In </h3>
                    <form class="getin_form border-form" id="login" method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="row">
                            @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif

                    {{ __('Before proceeding, please check your email for a verification link.') }}
                    {{ __('If you did not receive the email') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('click here to request another') }}</button>.
                    </form>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
