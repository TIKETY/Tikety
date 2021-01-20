@extends('layout.app')

@section('content')

    <!--Error 500 SECTION-->
    <section id="error" class="padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <div class="error wow bounceIn" data-wow-delay="300ms">
                        <h1>500</h1>
                        <h2>500</h2>
                    </div>
                    <p class="heading_space">{{ __('We are sorry, the page you want is not here.') }}</p>
                    <a href="{{ route('home', app()->getLocale()) }}" class="button btn-primary wow fadeIn mb-3 mb-sm-0" data-wow-delay="400ms">back to home</a>
                </div>
            </div>
        </div>
    </section>
    <!--Error 500 section end-->

@endsection
