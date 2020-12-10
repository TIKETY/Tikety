<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Tikety</title>
    <link href="{{ asset('image/icon.ico')}}" rel="icon">
    <link rel="stylesheet" href="{{ asset('css_style/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css_style/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css_style/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css_style/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css_style/jquery.fancybox.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css_style/tooltipster.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css_style/cubeportfolio.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css_style/revolution/navigation.css') }}">
    <link rel="stylesheet" href="{{ asset('css_style/revolution/settings.css') }}">
    <link rel="stylesheet" href="{{ asset('css_style/style.css') }}">
    @yield('header_script')

        <x-recaptcha>
            stayconnected
        </x-recaptcha>
</head>

<body>
    @include('sweetalert::alert')
    <!--PreLoader-->
    <div class="loader">
        <div class="loader-inner">
            <div class="cssload-loader"></div>
        </div>
    </div>
    <!--PreLoader Ends-->
    <!-- header -->
    <header class="site-header">
        <nav class="navbar navbar-expand-lg padding-nav">
            <div class="container">
                <a class="navbar-brand" href="{{ route('welcome', app()->getLocale()) }}">
                    <img src="{{ asset('image/logo.png')}}" alt="logo">
                </a>
                <div class="collapse navbar-collapse">
                    <ul class="navbar-nav ml-auto mr-auto align-items-center">
                        <li class="nav-item dropdown static">
                            <a class="nav-link" href="{{ route('welcome', app()->getLocale()) }}"> {{ __('Home') }} </a>
                        </li>
                        {{-- <li class="nav-item">
                            <a class="nav-link" href="{{ route('faq') }}">{{ __('FAQ') }}</a>
                        </li> --}}
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('about', app()->getLocale()) }}">{{ __('About') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('contact', app()->getLocale()) }}">{{ __('Contact') }}</a>
                        </li>
                        @auth
                        <li class="nav-item">
                            <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="btn nav-link text-black-50">{{ __('Logout') }}</button>
                            </form>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('profile', auth()->user()) }}"><img @if (is_null(auth()->user()->image_url))
                                src="{{ asset('image/tikety_user.png') }}"
                            @else
                                src="{{ asset('storage/'.auth()->user()->image_url) }}"
                            @endif  class="rounded-circle" width="50px" height="50px" alt=""></a>
                        </li>
                        @endauth
                        @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login', app()->getLocale()) }}">{{ __('Login') }}</i> </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register', app()->getLocale()) }}">{{ __('Signup') }}</i> </a>
                        </li>
                        @endguest
                    </ul>
                </div>
                <ul class="social-icons social-icons-simple d-lg-inline-block d-none animated fadeInUp" data-wow-delay="300ms">
                    <li><a href="https://www.facebook.com/tiketyllc"><i class="fab fa-facebook-f"></i> </a> </li>
                    <li><a href="https://twitter.com/Tikety_LLC"><i class="fab fa-twitter"></i> </a> </li>
                    <li><a href="https://www.linkedin.com/company/tikety/"><i class="fab fa-linkedin-in"></i> </a> </li>
                </ul>

            </div>
            <!--side menu open button-->
            <a href="javascript:void(0)" class="d-inline-block sidemenu_btn" id="sidemenu_toggle">
                <span class="gradient-bg"></span> <span class="gradient-bg"></span> <span class="gradient-bg"></span>
            </a>
        </nav>
        <!-- side menu -->
        <div class="side-menu opacity-0 gradient-bg">
            <div class="overlay"></div>
            <div class="inner-wrapper">
                <span class="btn-close" id="btn_sideNavClose"><i></i><i></i></span>
                <nav class="side-nav w-100">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('welcome', app()->getLocale()) }}">{{ __('Home') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('faq', app()->getLocale()) }}">{{ __('FAQ') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('about', app()->getLocale()) }}">{{ __('About') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('contact', app()->getLocale()) }}">{{ __('Contact') }}</a>
                        </li>
                    </ul>
                </nav>
                <div class="side-footer w-100">
                    <ul class="social-icons-simple white top40">
                        <li><a href="https://www.facebook.com/tiketyllc"><i class="fab fa-facebook-f"></i> </a> </li>
                        <li><a href="https://twitter.com/Tikety_LLC"><i class="fab fa-twitter"></i> </a> </li>
                        <li><a href="https://www.instagram.com/tikety_llc/"><i class="fab fa-instagram"></i> </a> </li>
                    </ul>
                    <p class="whitecolor">&copy; <span id="year"></span>{{ __('Tikety. Made With Love by Tikety Team') }}</p>
                </div>
            </div>
        </div>
        <div id="close_side_menu" class="tooltip"></div>
        <!-- End side menu -->
    </header>
    <!-- header -->
    @yield('content')
    @include('sweetalert::alert')
    <!-- Contact US -->
    <section id="stayconnect" class="whitebox position-relative">
        <div class="container">
            <div class="contactus-wrapp shadow-lg">
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <div class="heading-title wow fadeInUp text-center text-md-left" data-wow-delay="300ms">
                            <h3 class="darkcolor bottom20">{{ __('Stay Connected') }}</h3>
                        </div>
                    </div>
                    @if (session('message_connected'))
                    <div class="alert alert-success ml-3" role="alert">
                       {{ session('message_connected') }}
                      </div>
                    @endif
                    <div class="col-md-12 col-sm-12">
                        <form id="stayconnected" class="getin_form wow fadeInUp" data-wow-delay="400ms" method="POST" action="{{ route('connected', app()->getLocale()) }}">
                            @csrf
                            <div class="row">
                                <div class="col-md-12 col-sm-12" id="result"></div>
                                <div class="col-md-9 col-sm-9">
                                    <div class="form-group">
                                        <label for="userName" class="d-none"></label>
                                        <input class="form-control" type="text" placeholder="{{ __('First Name:') }}" required id="name" name="name">
                                        @error('name')
                                        <p class="danger" style="color: red;">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    This site is protected by reCAPTCHA and the Google.
                                    <a style="color: #006dbf;" href="https://policies.google.com/privacy">Privacy Policy</a> and
                                    <a style="color: #006dbf;" href="https://policies.google.com/terms">Terms of Service</a> apply.
                                </div>
                                <div class="col-md-3 col-sm-3">
                                    <div class="form-group">
                                        <label for="email" class="d-none"></label>
                                        <input class="form-control" type="email" placeholder="{{ __('Email:') }}" required id="email" name="email">
                                        @error('email')
                                            <p class="danger" style="color: red;">{{ $message }}</p>
                                        @enderror
                                    </div>

                                </div>
                                <div class="col-md-3 col-sm-6 mt-3">
                                    <button type="submit" data-callback="onSubmit" data-sitekey="{{ config('services.recaptcha.key') }}" class="button btn-primary w-100" id="submit_btn">{{ __('Subscribe') }}</button>
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
                        <a href="index.html" class="footer_logo bottom25"><img src="{{ asset('image/logo-transparent.png')}}" alt="Tikety"></a>
                        <p class="whitecolor bottom25">Keep away from people who try to belittle your ambitions Small people always do that but the really great Friendly.</p>
                        <div class="d-table w-100 address-item whitecolor bottom25">
                            <span class="d-table-cell align-middle"><i class="fas fa-mobile-alt"></i></span>
                            <p class="d-table-cell align-middle bottom0">
                                +01 - 123 - 4567 <a class="d-block" href="mailto:web@support.com">web@support.com</a>
                            </p>
                        </div>
                        <ul class="social-icons white wow fadeInUp" data-wow-delay="300ms">
                            <li><a href="https://www.facebook.com/tiketyllc"><i class="fab fa-facebook-f"></i> </a> </li>
                            <li><a href="https://twitter.com/Tikety_LLC"><i class="fab fa-twitter"></i> </a> </li>
                            <li><a href="https://www.linkedin.com/company/tikety/"><i class="fab fa-linkedin-in"></i> </a> </li>
                            <li><a href="https://www.instagram.com/tikety_llc/"><i class="fab fa-instagram"></i> </a> </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="footer_panel padding_bottom_half bottom20">
                        <h3 class="whitecolor bottom25">{{ __('Our Services') }}</h3>
                        <ul class="links">
                            <li><a href="{{ route('welcome', app()->getLocale()) }}">{{ __('Home') }}</a></li>
                            <li><a href="{{ route('about', app()->getLocale()) }}">{{ __('About Us') }}</a></li>
                            <li><a href="{{ route('contact', app()->getLocale()) }}">{{ __('Contact Us') }}</a></li>
                            <li><a href="">{{ __('Privacy Policy') }}</a></li>
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
                    <div class="footer_panel padding_bottom_half bottom20">
                        <h3 class="whitecolor bottom25">{{ __('Business hours') }}</h3>
                        <p class="whitecolor bottom25">{{ __('Our support available to help you 24 hours a day, seven days week') }}</p>
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
                    <p class="m-0 py-3 text-white">{{ __('Copyright') }} © <span id="year1"></span> <a href="javascript:void(0)" class="hover-default">Tikety</a>. {{ __('All Rights Reserved.') }}</p>
                </div>
            </div>
        </div>
    </div>
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="{{ asset('javascript/jquery-3.4.1.min.js')}}"></script>
    <!--Bootstrap Core-->
    <script src="{{ asset('javascript/propper.min.js')}}"></script>
    <script src="{{ asset('javascript/bootstrap.min.js')}}"></script>
    <!--to view items on reach-->
    <script src="{{ asset('javascript/jquery.appear.js')}}"></script>
    <!--Owl Slider-->
    <script src="{{ asset('javascript/owl.carousel.min.js')}}"></script>
    <!--number counters-->
    <script src="{{ asset('javascript/jquery-countTo.js')}}"></script>
    <!--Parallax Background-->
    <script src="{{ asset('javascript/parallaxie.js')}}"></script>
    <!--Cubefolio Gallery-->
    <script src="{{ asset('javascript/jquery.cubeportfolio.min.js')}}"></script>
    <!--Fancybox js-->
    <script src="{{ asset('javascript/jquery.fancybox.min.js')}}"></script>
    <!--tooltip js-->
    <script src="{{ asset('javascript/tooltipster.min.js')}}"></script>
    <!--wow js-->
    <script src="{{ asset('javascript/wow.js')}}"></script>
    <!--Revolution SLider-->
    <script src="{{ asset('javascript/revolution/jquery.themepunch.tools.min.js')}}"></script>
    <script src="{{ asset('javascript/revolution/jquery.themepunch.revolution.min.js')}}"></script>
    <!-- SLIDER REVOLUTION 5.0 EXTENSIONS -->
    <script src="{{ asset('javascript/revolution/extensions/revolution.extension.actions.min.js')}}"></script>
    <script src="{{ asset('javascript/revolution/extensions/revolution.extension.carousel.min.js')}}"></script>
    <script src="{{ asset('javascript/revolution/extensions/revolution.extension.kenburn.min.js')}}"></script>
    <script src="{{ asset('javascript/revolution/extensions/revolution.extension.layeranimation.min.js')}}"></script>
    <script src="{{ asset('javascript/revolution/extensions/revolution.extension.migration.min.js')}}"></script>
    <script src="{{ asset('javascript/revolution/extensions/revolution.extension.navigation.min.js')}}"></script>
    <script src="{{ asset('javascript/revolution/extensions/revolution.extension.parallax.min.js')}}"></script>
    <script src="{{ asset('javascript/revolution/extensions/revolution.extension.slideanims.min.js')}}"></script>
    <script src="{{ asset('javascript/revolution/extensions/revolution.extension.video.min.js')}}"></script>
    <!--custom functions and script-->
    <script src="{{ asset('javascript/functions.js')}}"></script>
    @yield('script')
</body>

</html>
