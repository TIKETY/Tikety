@extends('layout.app')

@section('header_script')
<x-analytics></x-analytics>
@endsection

@section('content')

    <!-- Services us -->
    <section id="our-services" class="padding whitebox">
        <div class="container">
            <div class="col-md-12 text-center heading_space wow fadeIn" data-wow-delay="300ms">
                <div class="dropdown nav-item row align-items-center justify-content-center mb-3">
                    <div class="dropdown-menu live-search-list" aria-labelledby="dropdownMenuButton" id="results">
                        <li>
                            <a class="dropdown-item" href=""></a>
                        </li>
                    </div>
                </div>
                @if (session('message_bus'))
                    <div class="alert alert-success" role="alert">
                    {{ session('message_bus') }}
                    </div>
                @endif
                @if (session('fleet_message'))
                    <div class="alert alert-success" role="alert">
                    {{ session('fleet_message') }}
                    </div>
                @endif
                @if (session('create_message'))
                    <div class="alert alert-success mt-3" role="alert">
                    {{ session('create_message') }}
                    </div>
                @endif
                <h2 class="heading bottom30 darkcolor font-light2"><span class="font-weight-light">{{ __('Buses') }}</span> {{ __('Details') }}
                </h2>
                @can('create_bus', Role::class)
                <div class="col-md-8 offset-md-2">
                    <p class="mb-n3"><a class="btn btn-primary" href="{{ route('CreateBus', app()->getLocale()) }}">{{ __('Add A Bus') }}</a></p>
                </div>
                @endcan
            </div>
            <div id="services-measonry" class="cbp">
                @foreach ($buses as $bus)
                <div class="cbp-item digital brand design shadow">
                    <div class="services-main">
                        <div class="image bottom10">
                            <div class="image"><img alt="SEO" @if (is_null($bus->image_url))
                                src="{{ asset('image/tikety_bus_image.png') }}"
                                @else
                                src="{{ ('https://tikety.fra1.digitaloceanspaces.com/'.$bus->image_url) }}"
                            @endif ></div>
                            <div class="overlay">
                                <a href="{{ route('ShowBus',['language' => app()->getLocale(), 'bus' => $bus->id]) }}" class="overlay_center border_radius"><i class="fa fa-eye"></i></a>
                            </div>
                        </div>
                        <div class="services-content brand text-center text-md-left">
                            <h3 class="bottom10 darkcolor"><a href="{{ route('ShowBus', ['language'=>app()->getLocale(), 'bus'=>$bus->id]) }}">{{ $bus->name }}</a></h3>
                            <div class="row flex">
                                <p class="bottom15 ml-3 mr-3">{{ $bus->from }} {{ __('to') }} {{ $bus->to }}   </p>
                                @if ($bus->SeatState())
                                    <p class="mr-3" style="color: red;">{{ __('Full') }}</p>
                                @else
                                    <p class="mr-1" style="color: green;">{{ __('Seats Present') }}</p>
                                @endif
                            </div>
                            @auth
                            @can('isowner', $bus)
                            <a href="{{ route('UpdateBus', ['language' => app()->getLocale(), 'bus' => $bus->id]) }}" class="button-readmore">{{ __('Edit Bus') }}</a>
                            @can('create_fleet', Role::class)
                            @if (!$bus->checkfleet())
                            <form action="{{ route('AddBusFleet', ['language' => app()->getLocale(), 'bus' => $bus]) }}" method="POST">
                                @csrf
                            <button type="submit" class="mt-3  btn btn-primary">{{ __('Add to Fleet') }}</button>
                            </form>
                            @endif
                            @endcan
                            @endcan
                            @endauth
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="row align-items-center justify-content-center mt-3">
                {{ $buses->links('pagination.pagination') }}
            </div>
        </div>
    </section>
    <!-- Services us ends -->
    @section('script')
    <script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/algoliasearch@4.5.1/dist/algoliasearch-lite.umd.js" integrity="sha256-EXPXz4W6pQgfYY3yTpnDa3OH8/EPn16ciVsPQ/ypsjk=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue-instantsearch@3.4.2/dist/vue-instantsearch.js" integrity="sha256-n2IafdANKRLjFjtPQVSQZ6QlxBrYqPDZfi3IkZjDT84=" crossorigin="anonymous"></script>
    <script>
    new Vue({
        data: function() {
        return {
        searchClient: algoliasearch(
        '{{ config('scout.algolia.id') }}',
        '{{ Algolia\ScoutExtended\Facades\Algolia::searchKey(App\Models\Bus::class) }}',
            ),
            };

        },
            el: '#app',
        });
    </script>

    @endsection
@endsection
