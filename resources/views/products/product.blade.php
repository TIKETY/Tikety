@extends('layout.app')

@section('content')

    <!-- Services us -->
    <section id="our-services" class="padding whitebox">
        <div class="container">
            <div class="col-md-12 text-center heading_space wow fadeIn" data-wow-delay="300ms">
                <div class="dropdown nav-item">
                    <input
                        class="dropdown-toggle form-control live-search-box"
                        id="searchbar"
                        data-toggle="dropdown"
                        aria-haspopup="true"
                        aria-expanded="false"
                        placeholder="Product Name"
                        style="width: 250px;">
                    <div class="dropdown-menu live-search-list" aria-labelledby="dropdownMenuButton" id="results">
                        <li>
                            <a class="dropdown-item" href="">
                                    </a>
                        </li>
                    </div>
                </div>
                @if (session('message_product'))
                    <div class="alert alert-success" role="alert">
                    {{ session('message_product') }}
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
                <h2 class="heading bottom30 darkcolor font-light2"><span class="font-weight-light">Products</span> Details
                </h2>
                   {{-- @can('create_product', Role::class) --}}
                <div class="col-md-8 offset-md-2">
                    <p class="mb-n3"><a class="btn btn-primary" href="{{ route('CreateProduct') }}">Add A Product</a></p>
                </div>
                {{-- @endcan --}}
            </div>
            <div id="services-measonry" class="cbp">
                @foreach ($products as $product)
                <div class="cbp-item digital brand design shadow">
                    <div class="services-main">
                        <div class="image bottom10">
                            <div class="image"><img alt="SEO" @if (is_null($product->image_url))
                                src="{{ asset('image/tikety_product_image.png') }}"
                                @else
                                src="{{ asset('storage/'.$product->image_url) }}"
                            @endif ></div>
                            <div class="overlay">
                                <a href="{{ route('ShowProduct', $product->id) }}" class="overlay_center border_radius"><i class="fa fa-eye"></i></a>
                            </div>
                        </div>
                        <div class="services-content brand text-center text-md-left">
                            <h3 class="bottom10 darkcolor"><a href="{{ route('ShowProduct', $product->id) }}">{{ $product->name }}</a></h3>
                            <p class="bottom15">{{ $product->route }}
                            </p>
                            @auth
                            @can('isowner', $product)
                            <a href="{{ route('UpdateProduct', $product->id) }}" class="button-readmore">Edit Product</a>
                            @endcan
                            @endauth
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- Services us ends -->
    @section('script')
    <script src="https://cdn.jsdelivr.net/npm/meilisearch@latest/dist/bundles/meilisearch.umd.js"></script>
    <script>
    const client = new MeiliSearch({
    host: 'http://127.0.0.1:7700',
    });

    const index = client.getIndex('products')

    const input = document.querySelector('#searchbar')

    input.addEventListener('keyup', event=>{
         index.search(event.target.value)
        .then(response => {
            let nodes = response.hits.map(product=>{
                let div= document.createElement('div');
                div.innerHTML = '<li class=\"mb-1\"><a href=\"showproduct/'+product.id+'\"><img class="mr-2" width=\"50px\" height=\"50px\" src=\"http://127.0.0.1/Tikety/public/storage/'+ product.image_url +'\">'+product.name+'</a></li>';
                return div;
            });

            let results = document.querySelector('#results');
            results.innerHTML = '';
            results.append(...nodes);
        });
    })
    </script>
    @endsection
@endsection
