@extends('layout.app')

@section('content')

<section id="aboutus" class="padding_top padding_bottom">
    <div class="container aboutus">
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-6 padding_bottom_half">
                <div class="image"><img alt="SEO" src="{{ asset('image/bg-404-header.jpg') }}"></div>
            </div>
            <div class="col-lg-5 offset-lg-1 col-md-6 padding_bottom_half text-center text-md-left">
                <h2 class="darkcolor font-normal bottom30">Lets take your <span class="defaultcolor">Business</span> to Next Level</h2>
                <p class="bottom35">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc mauris arcu, lobortis id interdum vitae, interdum eget elit. Curabitur quis urna nulla. Suspendisse potenti. Duis suscipit ultrices maximus. </p>
                <a href="#our-team" class="button btnsecondary gradient-btn pagescroll">Learn More</a>
            </div>
        </div>
        <div class="row  align-items-center">
            <div class="col-lg-5  col-md-6 padding_top_half text-center text-md-left">
                <h2 class="darkcolor font-normal bottom30">The Best Skillset Available in <span class="defaultcolor">Our Market</span> </h2>
                <p class="bottom35">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc mauris arcu, lobortis id interdum vitae, interdum eget elit. Curabitur quis urna nulla. Suspendisse potenti. Duis suscipit ultrices maximus. </p>
            </div>
            <div class="col-lg-6 offset-lg-1 col-md-6 padding_top_half">
                <div class="progress-bars">
                    <div class="progress">
                        <p>Adobe Photoshop</p>
                        <div class="progress-bar gradient-bg" data-value="94">
                            <span class="gradient-bg whitecolor">94%</span>
                        </div>
                    </div>
                    <div class="progress">
                        <p>HTML / WordPress</p>
                        <div class="progress-bar gradient-bg" data-value="92">
                            <span class="gradient-bg whitecolor">92%</span>
                        </div>
                    </div>
                    <div class="progress">
                        <p>Development</p>
                        <div class="progress-bar gradient-bg" data-value="86">
                            <span class="gradient-bg whitecolor">86%</span>
                        </div>
                    </div>
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
                                <img src="{{ asset('storage/'.$founder->image_url) }}" alt="">
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
