@extends('layout.standard_app')

@section('header_script')
<x-recaptcha>
    soon
</x-recaptcha>
<x-analytics></x-analytics>
@endsection

@section('content')

<!--Error 404 SECTION-->
<section id="error" class="padding">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center wow fadeIn" data-wow-delay="300ms">
                <h2 class="heading heading_space darkcolor font-light2"><span class="font-weight-normal">{{ __('Under Construction') }}
                </h2>
            </div>
            <div class="col-lg-6 col-md-12 col-sm-12 mt-lg-0 mt-4 text-center whitebox">
                <h3 class="defaultcolor">{{ __('Our Mobile Apps Are Almost Done') }}</h3>
                <h5 class="font-light py-4">{{ __('TIME LEFT UNTIL LAUNCHING') }}</h5>
                <div class=" wow bounceIn" data-wow-delay="300ms">
                    <ul class="count_down animated-gradient alt-font">
                        <li>
                            <p id="days" class="days">00</p>
                            <p class="days_ref">{{ __('Days') }}</p>
                        </li>
                        <li>
                            <p id="hours" class="hours">00</p>
                            <p class="hours_ref">{{ __('Hours') }}</p>
                        </li>
                        <li>
                            <p id="minutes" class="minutes">00</p>
                            <p class="minutes_ref">{{ __('Minutes') }}
                        <li>
                            <p id="seconds" class="seconds">00</p>
                            <p class="seconds_ref">{{ __('Seconds') }}</p>
                        </li>
                    </ul>
                </div>
                <h4 class="font-light py-5 mt-3 line-height-17">{{ __('We are preparing something amazing and exciting for you. Special surprise for our subscribers only.') }}</h4>
                <div class="count-down-form">
                    <form id="soon" class="form-group" method="POST" action="{{ route('soon_create', ['language'=>app()->getLocale()]) }}">
                        @csrf
                        <label for="newsletter-email" class="d-none"></label>
                        <div class="email-placeholder">
                            <input type="hidden" name="title" value="app">
                            <input type="email" placeholder="{{ __('Be the first to be Notified') }}" class="form-control form-placeholder" name="email" required id="newsletter-email">
                            <input type="submit" data-callback="onSubmit" data-sitekey="{{ config('services.recaptcha.key') }}" class="g-recaptcha button gradient-btn" value="{{ __('Subscribe') }}">
                        </div>
                    </form>
                </div>
                <div class="icon mt-4">
                    <ul class="social-icons black">
                        <li><a class="facebook" href="https://www.facebook.com/tiketyllc" title="Facebook"><i class="fab fa-facebook-f"></i></a></li>
                        <li><a class="twitter" href="https://twitter.com/Tikety_LLC" title="Twitter"><i class="fab fa-twitter"></i></a></li>
                        <li><a class="insta" href="https://www.instagram.com/tikety_llc/" title="Instagram"><i class="fab fa-instagram"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-6">
                <div class=" image coming-soon-image h-100">
                    <img src="{{ asset('image/tikety_mockup.jpg')}}" alt="" class="w-100 h-100">
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    var kea = <?php echo json_encode($date); ?>;
    // Set the date we're counting down to
    var countDownDate = new Date(kea).getTime();

    // Update the count down every 1 second
    var x = setInterval(function() {

      // Get today's date and time
    var now = new Date().getTime();

      // Find the distance between now and the count down date
    var distance = countDownDate - now;

      // Time calculations for days, hours, minutes and seconds
      var days = Math.floor(distance / (1000 * 60 * 60 * 24));
      var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
      var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
      var seconds = Math.floor((distance % (1000 * 60)) / 1000);

      // Display the result in the element with id="demo"
    document.getElementById("days").innerHTML = days
    document.getElementById("hours").innerHTML = hours
    document.getElementById("minutes").innerHTML = minutes
    document.getElementById("seconds").innerHTML = seconds

      // If the count down is finished, write some text
    if (distance < 0) {
        clearInterval(x);
        document.getElementById("demo").innerHTML = "EXPIRED";
    }
    }, 1000);
    </script>

@endsection
