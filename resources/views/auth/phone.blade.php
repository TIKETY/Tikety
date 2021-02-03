@extends('layout.app')

@section('header_script')
<x-analytics></x-analytics>
@endsection

@section('content')
<section id="sign-in" class="whitebox position-relative padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3 col-md-8 offset-md-2 col-sm-10 offset-sm-1 whitebox">
                <div class="widget logincontainer shadow-lg">
                    <h3 class="darkcolor bottom30 text-center text-lg-left">{{ __('Resend Verification Link') }}</h3>
                    <div class="card-body">
                        @if (session('message'))
                            <div class="alert alert-success" role="alert">
                                {{ __('A fresh verification link has been sent to your phone number.') }}
                            </div>
                        @endif

                        {{ __('Before proceeding, please check your sms for a verification link.') }}
                        {{ __('If you did not receive the sms') }},
                        <form class="d-inline" method="POST" action="{{ route('resend', ['language'=>app()->getLocale(), 'phone'=>$phone]) }}">
                            @csrf
                            <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('Please Resend Link') }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
