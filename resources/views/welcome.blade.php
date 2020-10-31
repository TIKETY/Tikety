<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Tikety</title>
    <link href="{{ asset('image/icon.ico')}}" rel="icon">
    <link rel="stylesheet" href="{{ asset('style/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('style/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('style/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('style/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('style/jquery.fancybox.min.css') }}">
    <link rel="stylesheet" href="{{ asset('style/tooltipster.min.css') }}">
    <link rel="stylesheet" href="{{ asset('style/cubeportfolio.min.css') }}">
    <link rel="stylesheet" href="{{ asset('style/revolution/navigation.css') }}">
    <link rel="stylesheet" href="{{ asset('style/revolution/settings.css') }}">
    <link rel="stylesheet" href="{{ asset('style/style.css') }}">
</head>

<body>
    <!--PreLoader-->
    <div class="loader">
        <div class="loader-inner">
            <div class="cssload-loader"></div>
        </div>
    </div>
    <!--PreLoader Ends-->
    <header class="site-header" id="header">
        <nav class="navbar navbar-expand-lg transparent-bg static-nav">
            <div class="container">
                <a class="navbar-brand" href="{{ route('welcome') }}">
                    <img src="{{ asset('image/logo.png') }}" alt="logo" class="logo-default">
                    <img src="{{ asset('image/logo.png') }}" alt="logo" class="logo-scrolled">
                </a>
                <div class="collapse navbar-collapse">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item dropdown static">
                            <a class="nav-link text-black-50 active" href="{{ route('welcome') }}" aria-haspopup="true" aria-expanded="false"> Home </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-black-50" href="{{ route('about') }}">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-black-50" href="{{ route('contact') }}">Contact</a>
                        </li>

                        @auth
                        <li class="nav-item">
                            <a class="nav-link text-black-50" href="{{ route('bus', auth()->user()) }}">My Buses</a>
                        </li>
                        <li class="nav-item">
                            <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="btn nav-link text-black-50">Logout</button>
                            </form>
                        </li>
                        @endauth

                        @guest
                        <li class="nav-item">
                            <a class="nav-link text-black-50" href="{{ route('login') }}">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-black-50" href="{{ route('register') }}">Sign Up</a>
                        </li>
                        @endguest
                    </ul>
                </div>
            </div>
            <!--side menu open button-->
        </nav>
        <!-- side menu -->
        <div class="side-menu opacity-0 gradient-bg">
            <div class="overlay"></div>
            <div class="inner-wrapper">
                <span class="btn-close btn-close-no-padding" id="btn_sideNavClose"><i></i><i></i></span>
                <nav class="side-nav w-100">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('welcome') }}">
                                Home
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('faq') }}">FAQ</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('about') }}">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('contact') }}">Contact</a>
                        </li>
                        @auth
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('bus', auth()->user()) }}">My Buses</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('logout') }}">Logout</a>
                        </li>
                        @endauth
                        @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">Sign Up</a>
                        </li>
                        @endguest
                    </ul>
                </nav>
                <div class="side-footer w-100">
                    <ul class="social-icons-simple white top40">
                        <li><a href="https://www.facebook.com/tiketyllc"><i class="fab fa-facebook-f"></i> </a> </li>
                        <li><a href="https://twitter.com/Tikety_LLC"><i class="fab fa-twitter"></i> </a> </li>
                        <li><a href="https://www.instagram.com/tikety_llc/"><i class="fab fa-instagram"></i> </a> </li>
                    </ul>
                    <p class="whitecolor">&copy; <span id="year"></span> Tikety. Made With Love by Tikety Team</p>
                </div>
            </div>
        </div>
        <div id="close_side_menu" class="tooltip"></div>
        <!-- End side menu -->
    </header>
    <!-- header -->

    <!--Main Slider-->
    <!--slider-->
    <section id="home" class="p-0 dark-slider single-slide">
        <h2 class="d-none">hidden</h2>
        <div id="rev_single_wrapper" class="rev_slider_wrapper fullwidthbanner-container" data-alias="trax_slider_01">
            <!-- START REVOLUTION SLIDER 5.4.8.1 fullscreen mode -->
            <div id="rev_single" class="rev_slider fullwidthbanner" data-version="5.4.8.1">
                <ul>
                    <!-- slide -->
                    <li data-index="rs-layers" data-transition="fade" data-slotamount="default" data-hideafterloop="0" data-hideslideonmobile="off" data-easein="default" data-easeout="default" data-masterspeed="500" data-rotate="0" data-saveperformance="off" data-title="Slide"
                        data-param1="" data-param2="" data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9="" data-param10="" data-description="">
                        <!-- main image -->
                        <img src="{{ asset('image/bg-flat-header.jpg')}}" data-bgcolor="#e0e0e0" alt="" data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" data-bgparallax="4" class="rev-slidebg" data-no-retina>
                        <!-- layers -->
                        <div class="overlay overlay-dark opacity-1"></div>
                        <div class="tp-caption tp-resizeme" data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']" data-y="['middle','middle','middle','middle']" data-voffset="['-70','-70','-70','-70']" data-whitespace="nowrap" data-responsive_offset="on"
                            data-width="['none','none','none','none']" data-type="text" data-textalign="['center','center','center','center']" data-transform_idle="o:1;" data-transform_in="y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;s:2000;e:Power4.easeInOut;"
                            data-transform_out="s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;" data-start="1000" data-splitin="none" data-splitout="none">
                            <h2>Easing your Ticketing Experience</h2>
                        </div>
                        <div class="tp-caption tp-resizeme" data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']" data-y="['middle','middle','middle','middle']" data-voffset="['12','12','12','12']" data-whitespace="nowrap" data-responsive_offset="on"
                            data-width="['none','none','none','none']" data-type="text" data-textalign="['center','center','center','center']" data-fontsize="['24','24','20','20']" data-transform_idle="o:1;" data-transform_in="z:0;rX:0deg;rY:0;rZ:0;sX:2;sY:2;skX:0;skY:0;opacity:0;s:1000;e:Power2.easeOut;"
                            data-transform_out="s:1000;e:Power3.easeInOut;s:1000;e:Power3.easeInOut;" data-mask_in="x:0px;y:0px;s:inherit;e:inherit;" data-start="1500" data-splitin="none" data-splitout="none">
                            <p>A Journey of thousand steps, begins with the first, and we aim to simplify it even better</p>
                        </div>
                        <div class="tp-caption tp-resizeme" data-x="['center','center','center','center']" data-hoffset="['20','20','20','20']" data-y="['middle','middle','middle','middle']" data-voffset="['90','90','90','90']" data-whitespace="nowrap" data-transform_idle="o:1;"
                            data-transform_in="y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;s:1500;e:Power4.easeInOut;" data-transform_out="s:900;e:Power2.easeInOut;s:900;e:Power2.easeInOut;" data-start="1600" data-splitin="none" data-splitout="none"
                            data-responsive_offset="on">
                            <a class="transition-3 button btn-primary button-padding pagescroll font-13" href="#our-feature">Learn More</a>
                        </div>
                    </li>
                </ul>
            </div>
            <!-- END REVOLUTION SLIDER -->
        </div>
        <!--    &lt;!&ndash;scroll down&ndash;&gt;-->
        <!--    <a href="#our-feature" class="scroll-down pagescroll hover-default">Scroll Down <i class="fas fa-long-arrow-alt-down"></i></a>-->
    </section>
    <!--slider end-->
    <!--Some Feature -->
    <section id="our-feature" class="single-feature padding">
        <div class="container">
            <div class="row d-flex align-items-center">
                <div class="col-lg-6 col-md-7 col-sm-7 text-sm-left text-center wow fadeInLeft" data-wow-delay="300ms">
                    <div class="heading-title mb-4">
                        <h2 class="darkcolor font-normal bottom30">Tickets on your Fingertips</h2>
                    </div>
                    <p class="bottom35">Different Services utilizing the ticketing systems are now able to utilize this platform to reach their customers from their phone with convenient ease. These services can be accessed from the customer's mobile phone app which can
                        be found on the app stores for both platforms</p>
                    <div class="mb-4">
                        <a href=""><img src="{{ asset('image/istore_link.jpg')}}" widht="124px" height="43px" class="rounded-lg mr-2" alt=""></a>
                        <a href=""><img src="{{ asset('image/gstore_link.jpg')}}" width="140px" height="43px" class="rounded-lg" alt=""></a>

                    </div>
                </div>
                <div class="col-lg-5 offset-lg-1 col-md-5 col-sm-5 wow fadeInRight" data-wow-delay="300ms">
                    <div class="image"><img alt="SEO" width="610" height="428" src="{{ asset('image/tikety_mockup.jpg')}}"></div>
                </div>
            </div>
        </div>
    </section>
    <!--Some Feature ends-->
    <!-- WOrk Process-->
    <section id="our-process" class="padding bgdark">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 text-center">
                    <div class="heading-title whitecolor wow fadeInUp" data-wow-delay="300ms">
                        <h2 class="font-normal">Simple process of Ticketing </h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <ul class="process-wrapp">
                    <li class="whitecolor wow fadeIn" data-wow-delay="300ms">
                        <span class="pro-step bottom20">01</span>
                        <p class="fontbold bottom25">Information</p>
                        <p class="mt-n2 mt-sm-0">The App will require relevant information to find you the corelated service</p>
                    </li>
                    <li class="whitecolor wow fadeIn" data-wow-delay="400ms">
                        <span class="pro-step bottom20">02</span>
                        <p class="fontbold bottom25">Selection</p>
                        <p class="mt-n2 mt-sm-0">Then, you will have to select the available options from different service providers</p>
                    </li>
                    <li class="whitecolor wow fadeIn" data-wow-delay="500ms">
                        <span class="pro-step bottom20">03</span>
                        <p class="fontbold bottom25">Choose</p>
                        <p class="mt-n2 mt-sm-0">Choose the service you would like to reserve from that service Provider</p>
                    </li>
                    <li class="whitecolor wow fadeIn" data-wow-delay="600ms">
                        <span class="pro-step bottom20">04</span>
                        <p class="fontbold bottom25">Payment</p>
                        <p class="mt-n2 mt-sm-0">Via the application you will be able to pay using the mobile money options</p>
                    </li>
                    <li class="whitecolor wow fadeIn" data-wow-delay="700ms">
                        <span class="pro-step bottom20">05</span>
                        <p class="fontbold bottom25">Tikety</p>
                        <p class="mt-n2 mt-sm-0">Finaly the application will generate a valid token (Tikety) to verify when needed by the Service Provider</p>
                    </li>
                </ul>
            </div>
        </div>
    </section>
    <!--WOrk Process ends-->
    <!-- Mobile Apps -->
    <section id="our-apps" class="padding">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-7 col-sm-12">
                    <div class="heading-title bottom30 wow fadeInUp" data-wow-delay="300ms" style="visibility: visible; animation-delay: 300ms; animation-name: fadeInUp;">
                        <h2 class="darkcolor font-normal text-center text-md-left">Tikety Design</h2>
                    </div>
                </div>

            </div>
            <div class="row d-flex align-items-center" id="app-feature">
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="text-center text-md-right">
                        <div class="feature-item mt-3 wow fadeInLeft" data-wow-delay="300ms" style="visibility: visible; animation-delay: 300ms; animation-name: fadeInLeft;">
                            <div class="icon"><i class="fas fa-cog"></i></div>
                            <div class="text">
                                <h3 class="bottom15">
                                    <span class="d-inline-block">Settings</span>
                                </h3>
                                <p>The app gives the user the flexibility of choosing different settings to fit in with own preference</p>
                            </div>
                        </div>
                        <div class="feature-item mt-5 wow fadeInLeft" data-wow-delay="350ms" style="visibility: visible; animation-delay: 350ms; animation-name: fadeInLeft;">
                            <div class="icon"><i class="fas fa-edit"></i></div>
                            <div class="text">
                                <h3 class="bottom15">
                                    <span class="d-inline-block">Customization</span>
                                </h3>
                                <p>The user can create own preferences based on different services wishing to use with convenient ease, and simplification</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 text-center">
                    <div class="app-image top30">
                        <div class="app-slider-lock-btn"></div>
                        <div class="app-slider-lock">
                            <img src="{{ asset('image/tikety_init.PNG')}}" alt="">
                        </div>
                        <div id="app-slider" class="owl-carousel owl-theme owl-loaded owl-drag">
                            <div class="owl-stage-outer">
                                <div class="owl-stage" style="transform: translate3d(-470px, 0px, 0px); transition: all 0s ease 0s; width: 1645px;">
                                    <div class="owl-item cloned" style="width: 235px;">
                                        <div class="item">
                                            <img src="{{ asset('image/tikety_app.PNG')}}" alt="">
                                        </div>
                                    </div>
                                    <div class="owl-item active" style="width: 235px;">
                                        <div class="item">
                                            <img src="{{ asset('image/tikety_bus.PNG')}}" alt="">
                                        </div>
                                    </div>
                                    <div class="owl-item" style="width: 235px;">
                                        <div class="item">
                                            <img src="{{ asset('image/tikety_seats.PNG')}}" alt="">
                                        </div>
                                    </div>
                                    <div class="owl-item" style="width: 235px;">
                                        <div class="item">
                                            <img src="{{ asset('image/tikety_payment.PNG')}}" alt="">
                                        </div>
                                    </div>
                                    <div class="owl-item cloned" style="width: 235px;">
                                        <div class="item">
                                            <img src="{{ asset('image/tikety_confirm.PNG')}}" alt="">
                                        </div>
                                    </div>
                                    <div class="owl-item cloned" style="width: 235px;">
                                        <div class="item">
                                            <img src="{{ asset('image/tikety_final.PNG')}}" alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="owl-nav disabled"><button type="button" role="presentation" class="owl-prev"><span aria-label="Previous">‹</span></button><button type="button" role="presentation" class="owl-next"><span aria-label="Next">›</span></button></div>
                            <div class="owl-dots disabled"></div>
                        </div>
                        <img src="{{ asset('image/iphone.png')}}" alt="image">
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="text-center text-md-left">
                        <div class="feature-item mt-3 wow fadeInRight" data-wow-delay="300ms" style="visibility: visible; animation-delay: 300ms; animation-name: fadeInRight;">
                            <div class="icon"><i class="fas fa-code"></i></div>
                            <div class="text">
                                <h3 class="bottom15">
                                    <span class="d-inline-block">Security</span>
                                </h3>
                                <p>Privacy of your data is our priority and the process is completely secured</p>
                            </div>
                        </div>
                        <div class="feature-item mt-5 wow fadeInRight" data-wow-delay="350ms" style="visibility: visible; animation-delay: 350ms; animation-name: fadeInRight;">
                            <div class="icon"><i class="far fa-folder-open"></i></div>
                            <div class="text">
                                <h3 class="bottom15">
                                    <span class="d-inline-block">Simplify</span>
                                </h3>
                                <p>This app simplify the process of opting services which require reservation of space at particular time with ease and convenience</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Mobile Apps ends-->
    <!-- Contact US -->
    <section id="stayconnect" class="whitebox position-relative">
        <div class="container">
            <div class="contactus-wrapp bglight rounded-lg shadow-lg">
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <div class="heading-title wow fadeInUp text-center text-md-left" data-wow-delay="300ms">
                            <h3 class="darkcolor bottom20">Stay Connected</h3>
                        </div>
                    </div>
                    <div class="col-md-12 col-sm-12">
                        <form class="getin_form wow fadeInUp" data-wow-delay="400ms" onsubmit="return false;">
                            <div class="row">
                                <div class="col-md-12 col-sm-12" id="result"></div>
                                <div class="col-md-3 col-sm-6">
                                    <div class="form-group">
                                        <label for="userName" class="d-none"></label>
                                        <input class="form-control" type="text" placeholder="First Name:" required id="userName" name="userName">
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-6">
                                    <div class="form-group">
                                        <label for="companyName" class="d-none"></label>
                                        <input class="form-control" type="tel" placeholder="Company Name" id="companyName" name="companyName">
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-6">
                                    <div class="form-group">
                                        <label for="email" class="d-none"></label>
                                        <input class="form-control" type="email" placeholder="Email:" required id="email" name="email">
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-6">
                                    <button type="submit" class="button btn-primary w-100" id="submit_btn">subscribe</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Contact US ends -->
    <!--Site Footer Here-->
    <footer id="site-footer" class=" bgdark padding_top">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="footer_panel padding_bottom_half bottom20">
                        <a href="index.html" class="footer_logo bottom25"><img src="{{ asset('image/logo-transparent.png')}}" alt="MegaOne"></a>
                        <p class="whitecolor bottom25">Keep away from people who try to belittle your ambitions Small people always do that but the really great Friendly.</p>
                        <div class="d-table w-100 address-item whitecolor bottom25">
                            <span class="d-table-cell align-middle"><i class="fas fa-mobile-alt"></i></span>
                            <p class="d-table-cell align-middle bottom0">
                                +255 654 660 654 <a class="d-block" href="mailto:web@support.com">web@support.com</a>
                            </p>
                        </div>
                        <ul class="social-icons white wow fadeInUp" data-wow-delay="300ms">
                            <li><a href="https://www.facebook.com/tiketyllc" class="facebook"><i class="fab fa-facebook-f"></i> </a> </li>
                            <li><a href="https://twitter.com/Tikety_LLC" class="twitter"><i class="fab fa-twitter"></i> </a> </li>
                            <li><a href="https://www.linkedin.com/company/tikety/" class="linkedin"><i class="fab fa-linkedin-in"></i> </a> </li>
                            <li><a href="https://www.instagram.com/tikety_llc/" class="insta"><i class="fab fa-instagram"></i> </a> </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="footer_panel padding_bottom_half bottom20">
                        <h3 class="whitecolor bottom25">Latest News</h3>
                        <ul class="latest_news whitecolor">
                            <li> <a href="#.">Aenean tristique justo et... </a> <span class="date defaultcolor">15 March 2019</span> </li>
                            <li> <a href="#.">Phasellus dapibus dictum augue... </a> <span class="date defaultcolor">15 March 2019</span> </li>
                            <li> <a href="#.">Mauris blandit vitae. Praesent non... </a> <span class="date defaultcolor">15 March 2019</span> </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="footer_panel padding_bottom_half bottom20 pl-0 pl-lg-5">
                        <h3 class="whitecolor bottom25">Our Services</h3>
                        <ul class="links">
                            <li><a href="{{ route('welcome') }}">Home</a></li>
                            <li><a href="{{ route('about') }}">About Us</a></li>
                            <li><a href="">Latest News</a></li>
                            <li><a href="">Business Planning</a></li>
                            <li><a href="{{ route('contact') }}">Contact Us</a></li>
                            <li><a href="{{ route('faq') }}">Faq's</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="footer_panel padding_bottom_half bottom20">
                        <h3 class="whitecolor bottom25">Business hours</h3>
                        <p class="whitecolor bottom25">Our support available to help you 24 hours a day, seven days week</p>
                        <ul class="hours_links whitecolor">
                            <li><span>Monday-Saturday:</span> <span>8.00-18.00</span></li>
                            <li><span>Friday:</span> <span>09:00-21:00</span></li>
                            <li><span>Sunday:</span> <span>09:00-20:00</span></li>
                            <li><span>Calendar Events:</span> <span>24-Hour Shift</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!--Footer ends-->
        <!--copyright-->
        <div class="copyright bgdark">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-center wow fadeIn animated" data-wow-delay="300ms">
                        <p class="m-0 py-3 text-white">Copyright © <span id="year1"></span> <a href="javascript:void(0)" class="hover-default">Tikety</a>. All Rights Reserved.</p>
                    </div>
                </div>
            </div>
        </div>
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="{{ asset('script/jquery-3.4.1.min.js')}}"></script>
    <!--Bootstrap Core-->
    <script src="{{ asset('script/propper.min.js')}}"></script>
    <script src="{{ asset('script/bootstrap.min.js')}}"></script>
    <!--to view items on reach-->
    <script src="{{ asset('script/jquery.appear.js')}}"></script>
    <!--Owl Slider-->
    <script src="{{ asset('script/owl.carousel.min.js')}}"></script>
    <!--number counters-->
    <script src="{{ asset('script/jquery-countTo.js')}}"></script>
    <!--Parallax Background-->
    <script src="{{ asset('script/parallaxie.js')}}"></script>
    <!--Cubefolio Gallery-->
    <script src="{{ asset('script/jquery.cubeportfolio.min.js')}}"></script>
    <!--Fancybox js-->
    <script src="{{ asset('script/jquery.fancybox.min.js')}}"></script>
    <!--tooltip js-->
    <script src="{{ asset('script/tooltipster.min.js')}}"></script>
    <!--wow js-->
    <script src="{{ asset('script/wow.js')}}"></script>
    <!--Revolution SLider-->
    <script src="{{ asset('script/revolution/jquery.themepunch.tools.min.js')}}"></script>
    <script src="{{ asset('script/revolution/jquery.themepunch.revolution.min.js')}}"></script>
    <!-- SLIDER REVOLUTION 5.0 EXTENSIONS -->
    <script src="{{ asset('script/revolution/extensions/revolution.extension.actions.min.js')}}"></script>
    <script src="{{ asset('script/revolution/extensions/revolution.extension.carousel.min.js')}}"></script>
    <script src="{{ asset('script/revolution/extensions/revolution.extension.kenburn.min.js')}}"></script>
    <script src="{{ asset('script/revolution/extensions/revolution.extension.layeranimation.min.js')}}"></script>
    <script src="{{ asset('script/revolution/extensions/revolution.extension.migration.min.js')}}"></script>
    <script src="{{ asset('script/revolution/extensions/revolution.extension.navigation.min.js')}}"></script>
    <script src="{{ asset('script/revolution/extensions/revolution.extension.parallax.min.js')}}"></script>
    <script src="{{ asset('script/revolution/extensions/revolution.extension.slideanims.min.js')}}"></script>
    <script src="{{ asset('script/revolution/extensions/revolution.extension.video.min.js')}}"></script>
    <!--custom functions and script-->
    <script src="{{ asset('script/functions.js')}}"></script>
</body>

</html>
