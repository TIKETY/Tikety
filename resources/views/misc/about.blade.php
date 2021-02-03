@extends('layout.app')

@section('header_script')
<x-analytics></x-analytics>
@endsection

@section('content')

<section id="aboutus" class="padding_top padding_bottom">
    <div class="container aboutus">
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-6 padding_bottom_half">
                <div class="image"><img alt="SEO" src="{{ ('https://tikety.fra1.digitaloceanspaces.com/logo_dp.png') }}"></div>
            </div>
            <div class="col-lg-5 offset-lg-1 col-md-6 padding_bottom_half text-center text-md-left">
                <h2 class="darkcolor font-normal bottom30">About <span class="defaultcolor">Tikety</span></h2>
                <p class="bottom35">Tikety is an all-in-one payment platform for all users.
                We empower millions of customers all around Tanzania to make payments,
                to send and deliver parcel with speed and convenience,
                to book different tickets and more all in one single platform,
                with our smart payment Technology and inspiring content. Founded in 2020 headquartered at Moshi Tanzania.
                Tikety is 100% Founders owned.</p>
            </div>
        </div>
        <div class="row  align-items-center">
            <div class="col-lg-5  col-md-6 padding_top_half text-center text-md-left">
                <h2 class="darkcolor font-normal bottom30">Founders Story</h2>
                <p class="bottom35">About one year ago Yusuph Kapilimka was returning from holiday back to the academy,
                    on booking his ticket he experienced a big disappointment where a bus dispatched one hour ahead,
                    Fear was higher than the one set by authority, He decided to do some broader researches about that problem.
                </p>
            </div>
            <div class="col-lg-6 offset-lg-1 col-md-6 padding_top_half">
                <div class="progress-bars">
                <h2 class="darkcolor font-normal bottom30">Yusuph and First Potential Customer</h2>
                <p class="bottom35">One day on his research he met one sister who was on the Bus Rapid Transit (BRT) morocco terminal
                    Dar es salaam then he asked her sorry what is wrong with you then she replayed
                    “watchmen rejected me to change bus because I have no paper ticket which I lost during exiting from another bus and I have no another fee”
                    then he interviewed her, she was happy that she left her number so as to be the very first person to get first version of a product when it will be ready.
                </p>
                </div>
            </div>
        </div>
        <div class="row  align-items-center">
            <div class="col-lg-5  col-md-6 padding_top_half text-center text-md-left">
                <h2 class="darkcolor font-normal bottom30">Yusuph and Kea</h2>
                <p class="bottom35">They met first when they were joining the army, they did train together,
                    Taking Bachelor of Military Science (BMS). On third year after coming back from short holiday
                    Yusuph introduced a simple research he did during holiday because Kea was also interesting much
                    on Technology, then they decided to team up and create a company which will address and solve all
                    these problems. This is where Tikety was born.
                </p>
            </div>
            <div class="col-lg-6 offset-lg-1 col-md-6 padding_top_half">
                <div class="progress-bars">
                <h2 class="darkcolor font-normal bottom30">Tikety</h2>
                <p class="bottom35">Tikety is designed as alternative to all these problems. It gives customer a flexible
                    option to high-end tools and resources to access technology that empowers them and help them to grow.
                </p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- About us ends -->
<!-- Our Team-->
<section id="our-team" class=" teams-border py-4">
    <div class="container whitebox">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="heading-title wow fadeInUp" data-wow-delay="300ms">
                    <span class="defaultcolor text-center text-md-left">This is the beginning of all this...</span>
                    <h2 class="darkcolor font-normal bottom30 text-center text-md-left">Meet The Cofounders</h2>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
                <p class="heading_space mt-n3 mt-sm-0 text-center text-md-left">These are the cofounders of Tikety, who started this company</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div id="ourteam-slider" class="owl-carousel">
                    @foreach ($founders as $founder)
                    <div class="item px-2">
                        <div class="team-box">
                            <div class="image">
                                <img src="{{ ($founder->image_url) }}" alt="">
                            </div>
                            <div class="team-content">
                                <h4 class="darkcolor">{{ $founder->name }}</h4>
                                <p>{{ $founder->position }}</p>
                                <ul class="social-icons-simple">
                                    <li><a class="facebook" target="_blank" href="{{ $founder->facebook }}"><i class="fab fa-facebook-f"></i> </a> </li>
                                    <li><a class="twitter" target="_blank" href="{{ $founder->twitter }}"><i class="fab fa-twitter"></i> </a> </li>
                                    <li><a class="insta" target="_blank" href="{{ $founder->instagram }}"><i class="fab fa-instagram"></i> </a> </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Our Team ends-->

@endsection
