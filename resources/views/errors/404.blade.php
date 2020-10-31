@extends('layout.app')

@section('content')

    <!--Error 404 SECTION-->
    <section id="error" class="padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <div class="error wow bounceIn" data-wow-delay="300ms">
                        <h1>404</h1>
                        <h2>404</h2>
                    </div>
                    <p class="heading_space">We are sorry, the page you want is not here.</p>
                    <a href="{{ route('home') }}" class="button btn-primary wow fadeIn mb-3 mb-sm-0" data-wow-delay="400ms">back to home</a>
                </div>
            </div>
        </div>
    </section>
    <!--Error 404 section end-->

@endsection
