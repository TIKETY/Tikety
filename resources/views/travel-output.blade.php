@extends('layout.app')

@section('content')

<!-- Services us -->
<section id="our-services" class="padding whitebox">
    <div class="container">
        <div class="col-md-12 text-center heading_space wow fadeIn" data-wow-delay="300ms">
            @if (session('message_bus'))
                <div class="alert alert-success" role="alert">
                {{ session('message_bus') }}
                </div>
            @endif
            @if (session('create_message'))
                <div class="alert alert-success mt-3" role="alert">
                {{ session('create_message') }}
                </div>
            @endif
            <h2 class="heading bottom30 darkcolor font-light2"><span class="font-weight-light">My Buses</span> Details
            </h2>
            {{-- @can('create_bus', Role::class) --}}
            <div class="col-md-8 offset-md-2">
                <p class="mb-n3"><a class="btn btn-primary" href="{{ route('CreateBus') }}">Add A Bus</a></p>
            </div>
            {{-- @endcan --}}
        </div>


        <div id="services-measonry" class="cbp">
            @foreach ($buses as $bus)
            <div class="cbp-item digital brand design shadow">
                <div class="services-main">
                    <div class="image bottom10">
                        <div class="image"><img alt="SEO" src="https://i.pravatar.cc/300?u={{ $bus->id }}"></div>
                        <div class="overlay">
                            <a href="{{ route('ShowBus', $bus->id) }}" class="overlay_center border_radius"><i class="fa fa-eye"></i></a>
                        </div>
                    </div>
                    <div class="services-content brand text-center text-md-left">
                        <h3 class="bottom10 darkcolor"><a href="{{ route('ShowBus', $bus->id) }}">{{ $bus->name }}</a></h3>
                        <p class="bottom15">{{ $bus->route }}
                        </p>
                        @auth
                        @if (auth()->user()->id==$bus->user_id)
                        <a href="{{ route('UpdateBus', $bus->id) }}" class="button-readmore">Edit Bus</a>
                        <form action="{{ route('AddBusFleet', $bus) }}" method="POST">
                            @csrf
                        <button type="submit" class="mt-3  btn btn-primary">Add to Fleet</button>
                        </form>
                        @endif
                        @endauth
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
<!-- Services us ends -->


@endsection
