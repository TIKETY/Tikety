@extends('layout.app')

@section('content')


<section id="shop" class="padding">
    <div class="container">
        <div class="row">
            <div class="col-md-12 cart_table wow fadeInUp" data-wow-delay="300ms">
                <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th class="darkcolor">{{ __('Seat No:')}}</th>
                        <th class="darkcolor ">{{ __('Amount:') }}</th>
                        <th class="darkcolor">{{ __('Quantity') }}</th>
                        <th class="darkcolor">{{ __('Total') }}</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($seats as $seat)
                    <tr>
                        <td>
                        <div class="d-table">
                            <div class="d-block d-lg-table-cell">
                                <h4 class="darkcolor product-name"><a href="shop-detail.html">{{ $seat }}</a></h4>
                                <p>{{ $bus->name }}</p>
                            </div>
                        </div>
                        </td>
                        <td>
                        <h4 class="default-color text-center">{{ $bus->amount }}</h4>
                    </td>
                    <td class="text-center">
                        <div class="quote text-center">
                            <label for="quantity1" class="d-none"></label>
                            <input type="text" placeholder="1" class="quote" disabled id="quantity1">
                        </div>
                        </td>
                        <td>
                        <h4 class="darkcolor text-center">TZS {{ $bus->amount }}</h4>
                        </td>
                        <td class="text-center"><a class="btn-close" href="#."><i class="fas fa-times"></i></a></td>
                    </tr>
                    @endforeach
                    <tr>
                        <td>
                        <div class="d-table">
                            <div class="d-block d-lg-table-cell">
                                <h4 class="darkcolor product-name"><a href="shop-detail.html">{{ __('Total') }}</a></h4>
                            </div>
                        </div>
                        </td>
                        <td>
                        <h4 class="default-color text-center"></h4>
                    </td>
                    <td class="text-center">
                        <div class="quote text-center">
                            <label for="quantity1" class="d-none"></label>
                            <input type="text" placeholder="{{ count($seats) }}" class="quote" disabled id="quantity1">
                        </div>
                        </td>
                        <td>
                        <h4 class="darkcolor text-center">TZS {{ count($seats)*$bus->amount }}</h4>
                        </td>
                        <td class="text-center">
                        </td>
                    </tr>
                </tbody>
                </table>
            </div>
            <div class="apply_coupon">
                <div class="row">
                <div class="col-md-6 col-sm-12 coupon"></div>
                <div class="col-md-6 col-sm-12 coupon d-sm-flex d-block justify-content-between align-self-center">
                    <a href="#." class="button btn-primary mb-sm-0 bottom15">update</a>
                    <a href="#." class="button btn-dark margin10">checkout</a>
                </div>
                </div>
            </div>
        </div>
        </div>
        <div class="row">
    </div>
</section>

@endsection
