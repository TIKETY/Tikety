@extends('layout.app')

@section('content')

<section id="aboutus" class="padding_top padding_bottom">
    <div class="container align-items-center">
        @if (session('message_role'))
                    <div class="alert alert-success" role="alert">
                    {{ session('message_role') }}
                    </div>
        @endif
        <h1 class="darkcolor font-normal m-auto">{{ __('One more thing...') }}</h1>
        <div class="row align-items-center">
            <div class="col-lg-4  col-md-6 padding_top_half text-center text-md-left">
                <h2 class="darkcolor font-normal bottom30">{{ __('Here for tickets?') }}</h2>
                <p class="bottom35">{{ __('Enjoy the services offered by different Companies within this ticketing platform') }}</p>
                <form action="{{ route('makerole', ['role'=>'customer', 'language'=>app()->getLocale()]) }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-primary">{{ __('Use Tikety') }}</button>
                </form>
            </div>
            <div class="col-lg-4  col-md-6 padding_top_half text-center text-md-left">
                <h2 class="darkcolor font-normal bottom30">{{ __('Are you a Manager?') }}</h2>
                <p class="bottom35">{{ __('Become the Manager of your assets easier by being able to control your asset with ease on your fingertips') }}</p>
                <a class="button" href="{{ route('price', ['language'=>app()->getLocale()]) }}">Choose plan</a>
            </div>
            <div class="col-lg-4  col-md-6 padding_top_half text-center text-md-left">
                <h2 class="darkcolor font-normal bottom30">{{ __('Do You Own a Fleet?') }}</h2>
                <p class="bottom35">{{ __('Manage, Supervise and do Much more than a manager to your assets from anywhere, with the role of a Master') }}</p>
                <a class="button" href="{{ route('price', ['language'=>app()->getLocale()]) }}">Choose plan</a>
            </div>
        </div>
    </div>
</section>
<!-- About us ends -->

@endsection
