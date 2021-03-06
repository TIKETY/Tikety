@extends('layout.standard_app')

@section('content')


<section id="shop" class="padding">
    <div class="container">
        <div class="row">
            <div class="col-md-12 cart_table wow fadeInUp" data-wow-delay="300ms">
                <livewire:invoice-item :bus="$bus">
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
