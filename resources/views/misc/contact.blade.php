@extends('layout.standard_app')

@section('header_script')
    <x-recaptcha>
        contact
    </x-recaptcha>
@endsection

@section('content')

    <!-- Contact US -->
    <section id="stayconnect1" class="whitebox position-relative padding noshadow">
        <div class="container whitebox shadow-lg">
            <div class="widget py-5 ">
                <div class="row">
                    <div class="col-md-12 text-center wow fadeIn mt-n3" data-wow-delay="300ms">
                        <h2 class="heading bottom30 darkcolor font-light2 pt-1"><span class="font-normal">{{ __('Contact Us') }}</span>
                        </h2>
                        <div class="col-md-8 offset-md-2 bottom35">
                            <p>{{ __('Please, leave us a message') }}</p>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 order-sm-2">
                        <div class="contact-meta px-2 text-center text-md-left">
                            <div class="heading-title">
                                <h2 class="darkcolor font-normal mb-4"><span class="d-none d-md-inline-block">{{ __('Our Offices In Tanzania') }}</span></h2>
                            </div>
                            <p class="bottom10">{{ __('Address:') }} 10290, Majengo, MOSHI</p>
                            <p class="bottom10">+2550759777031</p>
                            <p class="bottom10"><a href="mailto:support@tikety.co.tz">support@tikety.co.tz</a></p>
                            <p class="bottom10">{{ __('Mon-Fri') }}: 9am-5pm</p>
                            <ul class="social-icons mt-4 mb-4 mb-sm-0 wow fadeInUp" data-wow-delay="300ms">
                                <li><a href="https://www.facebook.com/tiketyllc"><i class="fab fa-facebook-f"></i> </a> </li>
                                <li><a href="https://twitter.com/Tikety_LLC"><i class="fab fa-twitter"></i> </a> </li>
                                <li><a href="https://www.linkedin.com/company/tikety/"><i class="fab fa-linkedin-in"></i> </a> </li>
                                <li><a href="https://www.instagram.com/tikety_llc/"><i class="fab fa-instagram"></i> </a> </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <div class="heading-title  wow fadeInUp" data-wow-delay="300ms">

                            <form id="contact" class="getin_form wow fadeInUp" data-wow-delay="400ms" method="POST" action="{{ route('ContactForm', app()->getLocale()) }}">
                                <div class="row px-2">
                                    <div class="col-md-12 col-sm-12" id="result1"></div>
                                    <div class="col-md-12 col-sm-12">
                                        <div class="form-group">
                                            <label for="name1" class="d-none"></label>
                                            <input class="form-control" id="name1" type="text" placeholder="{{ __('Name:') }}" required  name="userName">
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-sm-12">
                                        <div class="form-group">
                                            <label for="email1" class="d-none"></label>
                                            <input class="form-control" type="email" id="email1" placeholder="{{ __('Email:') }}" name="email">
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-sm-12">
                                        <div class="form-group">
                                            <label for="message1" class="d-none"></label>
                                            <textarea class="form-control" id="message1" placeholder="{{ __('Message:') }}" required  name="message"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-sm-12">
                                        <button data-callback="onSubmit" data-sitekey="{{ config('services.recaptcha.key') }}" type="submit" id="submit_btn1" class="g-recaptcha button gradient-btn w-100">Send</button>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-3">
                    <div class="widget text-center top60 w-100">
                        <div class="contact-box">
                            <span class="icon-contact defaultcolor"><i class="fas fa-mobile-alt"></i></span>
                            <p class="bottom0"><a href="tel:+255654660654">+255654660654</a></p>
                            <p class="d-block"><a href="tel:+255759777031">+255759777031</a></p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3">
                    <div class="widget text-center top60 w-100">
                        <div class="contact-box">
                            <span class="icon-contact defaultcolor"><i class="fas fa-map-marker-alt"></i></span>
                            <p class="bottom0">10290 Moshi, Tanzania </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3">
                    <div class="widget text-center top60 w-100">
                        <div class="contact-box">
                            <span class="icon-contact defaultcolor"><i class="far fa-envelope"></i></span>
                            <p class="bottom0"><a href="mailto:kea@tikety.co.tz">kea@tikety.co.tz</a></p>
                            <p class="d-block"><a href="mailto:yusuph@tikety.co.tz">yusuph@tikety.co.tz</a></p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3">
                    <div class="widget text-center top60 w-100">
                        <div class="contact-box">
                            <span class="icon-contact defaultcolor"><i class="far fa-clock"></i></span>
                            <p class="bottom15">UTC−05:00 <span class="d-block">UTC+01:00</span></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Contact US ends -->
@endsection
