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

@endsection
