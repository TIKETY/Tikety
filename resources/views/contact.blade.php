@extends('layout.app')

@section('content')

    <!-- Contact US -->
    <section id="stayconnect1" class="whitebox position-relative padding noshadow">
        <div class="container whitebox shadow-lg">
            <div class="widget py-5 ">
                <div class="row">
                    <div class="col-md-12 text-center wow fadeIn mt-n3" data-wow-delay="300ms">
                        <h2 class="heading bottom30 darkcolor font-light2 pt-1"><span class="font-normal">Contact Us</span>
                        </h2>
                        <div class="col-md-8 offset-md-2 bottom35">
                            <p>Please, leave us a message</p>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 order-sm-2">
                        <div class="contact-meta px-2 text-center text-md-left">
                            <div class="heading-title">
                                <h2 class="darkcolor font-normal mb-4"><span class="d-none d-md-inline-block">Our</span> Offices <span class="d-none d-md-inline-block">In Tanzania</span></h2>
                            </div>
                            <p class="bottom10">Address: 10290, Majengo, MOSHI</p>
                            <p class="bottom10">+255 654 660 654</p>
                            <p class="bottom10"><a href="mailto:polpo@traxagency.co.au">tikety@tikety.net</a></p>
                            <p class="bottom10">Mon-Fri: 9am-5pm</p>
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
                            <form id="formId" class="getin_form wow fadeInUp" data-wow-delay="400ms" method="POST" action="{{ route('ContactForm') }}">
                                @csrf
                                <div class="row px-2">
                                    <div class="col-md-12 col-sm-12" id="result1"></div>
                                    <div class="col-md-12 col-sm-12">
                                        <div class="form-group">
                                            <label for="name1" class="d-none"></label>
                                            <input class="form-control" id="name" type="text" placeholder="Name:" required name="name">
                                            @error('name')
                                            <p class="danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-sm-12">
                                        <div class="form-group">
                                            <label for="email1" class="d-none"></label>
                                            <input class="form-control" type="email" id="email" placeholder="Email:" name="email">
                                            @error('email')
                                            <p class="danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-sm-12">
                                        <div class="form-group">
                                            <label for="message1" class="d-none"></label>
                                            <textarea class="form-control" id="body" placeholder="Message:" required name="body"></textarea>
                                            @error('body')
                                            <p class="danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-sm-12">
                                        <button type="submit" id="submit_btn1" class="button btn-primary w-100">Submit</button>
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
                            <p class="d-block"><a href="tel:+255654660654">+255654660654</a></p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3">
                    <div class="widget text-center top60 w-100">
                        <div class="contact-box">
                            <span class="icon-contact defaultcolor"><i class="fas fa-map-marker-alt"></i></span>
                            <p class="bottom0">10290 Moshi, Tanzania </p>
                            <p class="d-block">123 Street New Yolo , Austria </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3">
                    <div class="widget text-center top60 w-100">
                        <div class="contact-box">
                            <span class="icon-contact defaultcolor"><i class="far fa-envelope"></i></span>
                            <p class="bottom0"><a href="mailto:kearajab@tikety.net">kearajab@tikety.net</a></p>
                            <p class="d-block"><a href="mailto:ykapilimka@tikety.net">ykapilimka@tikety.net</a></p>
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
