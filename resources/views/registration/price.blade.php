@extends('layout.app')

@section('content')
<section id="pricing-page" class="padding">
    <div class="container">
        @if (session('message_role'))
                    <div class="alert alert-success" role="alert">
                    {{ session('message_role') }}
                    </div>
        @endif
        <div class="row">
            <div class="col-md-12 text-center wow fadeIn" data-wow-delay="300ms">
                <h2 class="heading darkcolor font-light2"><span class="font-weight-light">Best</span> Pricing
                    <span class="divider-center"></span>
                </h2>
            </div>
            <div class="col-12 text-center">
                <div class="price-toggle-wrapper heading_space top30">
                    <span class="Pricing-toggle-button month active" onclick="myFunction()">{{ __('Monthly') }}</span>
                </div>
            </div>
        </div>
        <div class="owl-carousel owl-theme" id="price-slider">
            <div class="item">
                <div class="col-md-12">
                    <div class="pricing-item wow fadeInUp animated" data-wow-delay="300ms">
                        <h3 class="font-light darkcolor">{{ __('Standard') }}</h3>
                        <p class="bottom30">{{ __('Here for Tickets?') }}</p>
                        <div class="pricing-price darkcolor"><span class="pricing-currency">{{ __($customer->price) }}</span> /<span class="pricing-duration">{{ __('month') }}</span></div>
                        <ul class="pricing-list">
                            <li @if ($customer->ability1 === NULL) class="price-not" @endif>{{ __($master->ability1) }}</li>
                            <li @if ($customer->ability2 === NULL) class="price-not" @endif>{{ __($master->ability2) }}</li>
                            <li @if ($customer->ability3 === NULL) class="price-not" @endif>{{ __($master->ability3) }}</li>
                            <li @if ($customer->ability4 === NULL) class="price-not" @endif>{{ __($master->ability4) }}</li>
                            <li @if ($customer->ability5 === NULL) class="price-not" @endif>{{ __($master->ability5) }}</li>
                            <li @if ($customer->ability6 === NULL) class="price-not" @endif>{{ __($master->ability6) }}</li>
                            <li @if ($customer->ability7 === NULL) class="price-not" @endif>{{ __($master->ability7) }}</li>
                        </ul>
                        <form action="{{ route('makerole', ['role'=>'customer', 'language'=>app()->getLocale()]) }}" method="POST">
                            @csrf
                            <button type="submit" class="button">{{ __('Use Tikety') }}</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="col-md-12">
                    <div class="pricing-item sale wow fadeInUp animated top5" data-wow-delay="380ms" data-sale="25">
                        <h3 class="font-light darkcolor">{{ __('Manager') }}</h3>
                        <p class="bottom30">{{ __('The Manager Role') }}</p>
                        <div class="pricing-price darkcolor"><span class="pricing-currency">{{ __($manager->price) }}</span> /<span class="pricing-duration">{{ __('month') }}</span></div>
                        <ul class="pricing-list">
                            <li @if ($manager->ability1 === NULL) class="price-not" @endif>{{ __($master->ability1) }}</li>
                            <li @if ($manager->ability2 === NULL) class="price-not" @endif>{{ __($master->ability2) }}</li>
                            <li @if ($manager->ability3 === NULL) class="price-not" @endif>{{ __($master->ability3) }}</li>
                            <li @if ($manager->ability4 === NULL) class="price-not" @endif>{{ __($master->ability4) }}</li>
                            <li @if ($manager->ability5 === NULL) class="price-not" @endif>{{ __($master->ability5) }}</li>
                            <li @if ($manager->ability6 === NULL) class="price-not" @endif>{{ __($master->ability6) }}</li>
                            <li @if ($manager->ability7 === NULL) class="price-not" @endif>{{ __($master->ability7) }}</li>
                        </ul>
                        <form action="{{ route('makerole', ['role'=>'manager', 'language'=>app()->getLocale()]) }}" method="POST">
                            @csrf
                            <button type="submit" class="button">{{ __('Become Manager') }}</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="col-md-12">
                    <div class="pricing-item wow fadeInUp animated sale top5" data-wow-delay="460ms" data-sale="20">
                        <h3 class="font-light darkcolor">{{ __('Master') }}</h3>
                        <p class="bottom30">{{ __('The Master Role') }}</p>
                        <div class="pricing-price darkcolor"><span class="pricing-currency">{{ __($master->price) }}</span> /<span class="pricing-duration">{{ __('month') }}</span></div>
                        <ul class="pricing-list">
                            <li @if ($master->ability1 === NULL) class="price-not" @endif>{{ __($master->ability1) }}</li>
                            <li @if ($master->ability2 === NULL) class="price-not" @endif>{{ __($master->ability2) }}</li>
                            <li @if ($master->ability3 === NULL) class="price-not" @endif>{{ __($master->ability3) }}</li>
                            <li @if ($master->ability4 === NULL) class="price-not" @endif>{{ __($master->ability4) }}</li>
                            <li @if ($master->ability5 === NULL) class="price-not" @endif>{{ __($master->ability5) }}</li>
                            <li @if ($master->ability6 === NULL) class="price-not" @endif>{{ __($master->ability6) }}</li>
                            <li @if ($master->ability7 === NULL) class="price-not" @endif>{{ __($master->ability7) }}</li>
                        </ul>
                        <form action="{{ route('makerole', ['role'=>'master', 'language'=>app()->getLocale()]) }}" method="POST">
                            @csrf
                                <button type="submit" class="button">{{ __('Become Master') }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--Pricing ends-->
@endsection
