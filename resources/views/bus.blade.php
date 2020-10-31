@extends('layout.app')

@section('content')

    <!-- Services us -->
    <section id="our-services" class="padding whitebox">
        <div class="container">
            <div class="col-md-12 text-center heading_space wow fadeIn" data-wow-delay="300ms">
                <h2 class="heading bottom30 darkcolor font-light2"><span class="font-weight-light">My Buses</span> Details
                </h2>
                <div class="col-md-8 offset-md-2">
                    <p class="mb-n3"><a href="{{ route('CreateBus') }}">Add A Bus</a></p>
                </div>
            </div>

            <div id="services-measonry" class="cbp">
                @forelse ($buses as $bus)
                <div class="cbp-item digital brand design shadow">
                    <div class="services-main">
                        <div class="image bottom10">
                            <div class="image"><img alt="SEO" src="https://i.pravatar.cc/300?u={{ $bus->user->id }}"></div>
                            <div class="overlay">
                                <a href="{{ route('ShowBus', $bus->id) }}" class="overlay_center border_radius"><i class="fa fa-eye"></i></a>
                            </div>
                        </div>
                        <div class="services-content brand text-center text-md-left">
                            <h3 class="bottom10 darkcolor"><a href="{{ route('ShowBus', $bus->id) }}">{{ $bus->name }}</a></h3>
                            <p class="bottom15">{{ $bus->route }}
                            </p>
                            @if ($bus->user_id == auth()->user()->id)
                            <a href="{{ route('UpdateBus', $bus->id) }}" class="button-readmore">Edit Bus</a>
                            @endif
                        </div>
                    </div>
                </div>
                @empty
                    <div class="shadow card">
                        <p>Sory, you havent registed any bus yet</p>
                        <a href="{{ route('CreateBus') }}">Add A Bus</a>
                    </div>
                @endforelse
            </div>
        </div>
    </section>
    <!-- Services us ends -->

@endsection
