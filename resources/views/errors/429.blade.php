@extends('layout.app')

@section('content')

    <!--Error 403 SECTION-->
    <section id="error" class="padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <div class="error wow bounceIn" data-wow-delay="300ms">
                        <h1>429</h1>
                        <h2>429</h2>
                    </div>
                    <p class="heading_space">We are sorry, You have reached your limit for this feature</p>
                    <a href="{{ route('home') }}" class="button btn-primary wow fadeIn mb-3 mb-sm-0" data-wow-delay="400ms">back to home</a>
                </div>
            </div>
        </div>
    </section>
    <!--Error 403 section end-->

@endsection
