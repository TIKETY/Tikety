@extends('layout.app')

@section('header_script')
<x-analytics></x-analytics>
@endsection

@section('content')

    <!--Error soon SECTION-->
    <section id="error" class="padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <div class="error wow bounceIn" data-wow-delay="300ms">
                        <h1>{{ __('Coming') }}</h1>
                        <h2>{{ __('Soon') }}</h2>
                    </div>
                    <p class="heading_space">{{ __('Thanks for your Interest, the Mobile Application for this web app will be availlable soon, please feel free to stay connected so as to inform you as soon as the Application becomes availlable! Thank You!') }}</p>
                    <a href="{{ route('home', app()->getLocale()) }}" class="button btn-primary wow fadeIn mb-3 mb-sm-0" data-wow-delay="400ms">back to home</a>
                </div>
            </div>
        </div>
    </section>
    <!--Error soon section end-->

@endsection
