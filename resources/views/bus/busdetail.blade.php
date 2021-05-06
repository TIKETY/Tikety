@extends('layout.standard_app')

@section('header_script')
<x-analytics></x-analytics>
<x-recaptcha>
    review
</x-recaptcha>
@endsection

@section('content')

<!-- Services us -->
<section id="our-services" class="padding whitebox">
    <div class="container">
        <div class="row whitebox top15">
            <div class="col-lg-4 col-md-5">
                <div class="image widget bottom20 shadow"><img alt="SEO" @if (is_null($bus->image_url))
                    src="{{ asset('image/tikety_bus_image.png') }}"
                    @else
                    src="{{ ('https://tikety.fra1.digitaloceanspaces.com/'.$bus->image_url) }}"
                @endif ></div>
                <div class="widget shadow heading_space text-center text-md-left">
                    <h4 class="text-capitalize darkcolor bottom35">{{ __('Need Help?') }}</h4>
                    <div class="contact-table colorone d-table bottom15">
                        <div class="d-table-cell cells">
                            <span class="icon-cell"><i class="fas fa-star-alt"></i></span>
                        </div>
                        <div class="d-table-cell cells">
                            <ul class="comment mb-2">
                                <li><a href="javascript:void(0)" class="text-warning-hvr">
                                    <i @if (($bus->bus_avg_rating() > 0) && ($bus->bus_avg_rating() < 1))
                                        class="fa fa-star-half-alt"
                                    @endif @if ($bus->bus_avg_rating() >= 1)
                                    class="fa fa-star"
                                @endif></i>
                                    <i @if (($bus->bus_avg_rating() > 1) && ($bus->bus_avg_rating() < 2))
                                        class="fa fa-star-half-alt"
                                    @endif @if ($bus->bus_avg_rating() >= 2)
                                    class="fa fa-star"
                                @endif></i>
                                    <i @if (($bus->bus_avg_rating() > 2) && ($bus->bus_avg_rating() < 3))
                                        class="fa fa-star-half-alt"
                                    @endif @if ($bus->bus_avg_rating() >= 3)
                                        class="fa fa-star"
                                    @endif></i>
                                    <i @if (($bus->bus_avg_rating() > 3) && ($bus->bus_avg_rating() < 4))
                                        class="fa fa-star-half-alt"
                                    @endif @if ($bus->bus_avg_rating() >= 4)
                                        class="fa fa-star"
                                    @endif></i>
                                    <i @if (($bus->bus_avg_rating() > 4) && ($bus->bus_avg_rating() < 5))
                                        class="fa fa-star-half-alt"
                                    @endif @if ($bus->bus_avg_rating() >= 5)
                                        class="fa fa-star"
                                    @endif></i>
                                    {{-- <i class="fa fa-star-half-alt"></i> --}}
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="contact-table colorone d-table bottom15">
                        <div class="d-table-cell cells">
                            <span class="icon-cell"><i class="fas fa-mobile-alt"></i></span>
                        </div>
                        <div class="d-table-cell cells">
                            <p class="bottom0">{{ $bus->phonenumber }}</p>
                        </div>
                    </div>
                    <div class="contact-table colorone d-table bottom15 text-left">
                        <div class="d-table-cell cells">
                            <span class="icon-cell"><i class="fas fa-map-marker-alt"></i></span>
                        </div>
                        <div class="d-table-cell cells">
                            <p class="bottom0">{{ $bus->address }}
                            </p>
                        </div>
                    </div>
                    <div class="contact-table colorone d-table text-left">
                        <div class="d-table-cell cells">
                            <span class="icon-cell"><i class="far fa-clock"></i></span>
                        </div>
                        <div class="d-table-cell cells">
                            <p class="bottom0">{{ $bus->workinghours }}
                            </p>
                        </div>
                    </div>
                    @auth
                    @if (session('message_contact'))
                        <div class="alert alert-success mt-3" role="alert">
                        {{ session('message_contact') }}
                        </div>
                    @endif
                    @if (auth()->user()->id!=$bus->user_id)
                    <form class="getin_form wow fadeInUp" data-wow-delay="400ms" method="POST" action="{{ route('ContactBus', ['bus'=>$bus->id, 'language'=>app()->getLocale()]) }}">
                        @csrf
                        <div class="row">
                        <div class="col-md-12 col-sm-12 mt-4">
                            <div class="form-group">
                                <input class="form-control" type="text" placeholder="{{ __('First Name:') }}" required id="name" name="name">
                                <label for="first_name1" class="d-none"></label>
                            </div>
                        </div>
                        <div class="col-md-12 col-sm-12">
                            <div class="form-group">
                                <input class="form-control" type="email" placeholder="{{ __('Email:') }}" required id="email1" name="email">
                                <label for="email1" class="d-none"></label>
                            </div>
                        </div>
                        <div class="col-md-12 col-sm-12">
                            <div class="form-group">
                                <textarea class="form-control" name="body"  placeholder="{{ __('Request a FreeConsultation') }}" required id="body"></textarea>
                                <label for="FreeConsultation1" class="d-none"></label>
                            </div>
                        </div>
                        <div class="col-md-12 col-sm-12 mb-4">
                            <button type="submit" class="button btn-primary w-100" id="submit_btn1">{{ __('Free Consultation') }}</button>
                        </div>
                        </div>
                        </form>
                    @else
                    @can('isowner', $bus)
                    <h4 class="text-capitalize darkcolor bottom10 mt-2">{{ __('Revoke Seat') }}</h4>
                    @if (session('revoke_message'))
                            <div class="alert alert-success mt-3" role="alert">
                            {{ session('revoke_message') }}
                            </div>
                    @endif
                        <form action="{{ route('revokeSeat', ['language'=>app()->getLocale(), 'bus'=>$bus]) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="form-group mr-1">
                                    <input class="form-control ml-3" style="width: 200px;" type="text" placeholder="{{ __('Seat No:') }}" required id="seat" name="seat">
                                    <label for="first_name1" class="d-none"></label>
                                </div>
                                <button class="btn btn-primary mb-4" type="submit">{{ __('Revoke') }}</button>
                            </div>
                        </form>
                    <h4 class="text-capitalize darkcolor bottom35">{{ __('Notifications') }}</h4>
                    <div class="contact-table colorone d-table bottom15">
                        @foreach ($notifications as $notification)
                        <div class="alert alert-info mt-3" role="alert">
                            <a href="{{ $notification->markAsRead() }}">{{ __('Seat(s)') }} {{ $notification->data['seats'] }} {{ __('was taken by') }} {{ $notification->data['user'] }}</a>
                            @if ($bus->busstate())
                                <p>{{ __('The bus is full') }}</p>
                            @endif
                        </div>
                        @endforeach
                        @empty($notifications)
                            <p>{{ __('You have no new notifications') }}</p>
                        @endempty
                    </div>
                    @endcan
                    @endif
                    @endauth
                </div>
            </div>
            <div class="col-lg-8 col-md-7">
                <div class="widget shadow heading_space text-center text-md-left">
                    @if (session('reset_message'))
                            <div class="alert alert-info mt-3" role="alert">
                            {{ session('reset_message') }}
                            </div>
                    @endif
                    <h3 class="darkcolor font-normal bottom30">{{ $bus->name }} {{ $bus->platenumber }}</h3>
                    <p class="bottom30">{{ $bus->from }} {{ __('to') }} {{ $bus->to }}</p>
                    <p class="bottom30">{{ $bus->date->diffForHumans() }} {{ __('departure time on') }} {{ $bus->time }}</p>

                    @auth
                    @can('create_bus', Role::class)
                    @if (auth()->user()->id == $bus->user_id)
                    @can('isowner', $bus)
                    <div class="row">
                        <a href="{{ route('UpdateBus', ['language'=>app()->getLocale(), 'bus'=>$bus]) }}" class="btn btn-primary mr-3">{{ __('Edit Bus') }}</a>
                        <button class="btn btn-danger mr-3" data-toggle="modal" data-target="#delete">{{ __('Remove Bus') }}</button>
                        <button class="btn btn-primary mr-3" data-toggle="modal" data-target="#reset">{{ __('Reset Bus') }}</button>
                    </div>
                    @endcan

                    @endif
                    @endcan
                    @endauth
                </div>
                <div class="col-md-12 wow fadeInUp" data-wow-delay="300ms">
                    <div class="tab-to-accordion heading_space">
                        <ul class="tabset-list">
                            @can('isowner', $bus)
                            <li class="active"><a href="#tab2">{{ __('Users Reservations') }}</a></li>
                            @endcan
                            <li class="active"><a href="#tab3">{{ __('Review') }}</a>
                            </li>
                        </ul>
                        <div class="tab-container">
                            @can('isowner', $bus)
                            <div id="tab2">
                                <table class="table table-striped">
                                    <tbody>
                                        <tr>
                                            <th>{{ __('Name') }}</th>
                                            <th>{{ __('Phone Number') }}</th>
                                            <th>{{ __('Seats Taken') }}</th>
                                        </tr>
                                    @foreach ($users as $user)
                                    <tr>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ substr($user->phone_number, 0, -3) . "***" }}</td>
                                        <td>{{ $user->users_seat_bus($bus->id)->pluck('seat') }}</td>
                                    </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            @endcan
                            <div id="tab3">
                                @foreach ($reviews as $review)
                                <div class="bottom30">
                                    <div class="profile">
                                        <div><img @if (is_null($review->user_image))
                                            src="{{ asset('image/tikety_user.png') }}"
                                        @else
                                            src="{{ ('https://tikety.fra1.digitaloceanspaces.com/'.$review->user_image) }}"
                                        @endif class="rounded-circle mr-3" width="50px" height="50px" alt="instructure"></div>
                                        <div class="profile_text">
                                            <h5><strong style="color: #006dbf">{{ $review->user_name }}</strong></h5>
                                            <ul class="comment mb-2">
                                                <li><a href="javascript:void(0)" class="text-warning-hvr">
                                                    <i @if ($review->rating >= 1)
                                                        class="fa fa-star"
                                                    @endif></i>
                                                    <i @if ($review->rating >= 2)
                                                        class="fa fa-star"
                                                    @endif></i>
                                                    <i @if ($review->rating >= 3)
                                                        class="fa fa-star"
                                                    @endif></i>
                                                    <i @if ($review->rating >= 4)
                                                        class="fa fa-star"
                                                    @endif></i>
                                                    <i @if ($review->rating >= 5)
                                                        class="fa fa-star"
                                                    @endif></i>
                                                    {{-- <i class="fa fa-star-half-alt"></i> --}}
                                                    </a>
                                                </li>
                                            </ul>
                                            <h6><strong style="color: #000c16">{{ $review->title }}</strong></h6>
                                            <p>{{ $review->body }}</p>
                                            @can('isowner', $bus)
                                            <form action="{{ route('approve_review',['language'=>app()->getLocale(), 'bus'=>$bus, 'review_user_id'=>$review->user_id]) }}" method="POST">
                                            @csrf
                                            <button class="button btn-primary" type="submit">
                                            @if (!$review->approved)
                                                {{ __('Approve') }}
                                            @else
                                                {{ __('Disapprove') }}
                                            @endif
                                            </button>
                                            </form>
                                            @endcan
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                                <div class="row align-items-center justify-content-center mt-3">
                                    {{ $reviews->links('pagination.pagination') }}
                                </div>
                                @cannot('isowner', $bus)
                                <div class="add-review">
                                    <h3 class="heading darkcolor font-light2 bottom25">{{ __('Add Your Review') }}</h3>
                                    <h5 class="pb-1">{{ __('Your Rating : ') }}<span id="ratingText" class="text-warning">{{ __('Please Select') }}</span></h5>
                                    <ul class="comment bottom15 top10">
                                        <li><a href="javascript:void(0)" id="rattingIcon">
                                            <i id="rate" onclick="take(1)" class="far fa-star"></i>
                                            <i id="rate" onclick="take(2)" class="far fa-star"></i>
                                            <i id="rate" onclick="take(3)" class="far fa-star"></i>
                                            <i id="rate" onclick="take(4)" class="far fa-star"></i>
                                            <i id="rate" onclick="take(5)" class="far fa-star"></i>
                                        </a>
                                        </li>
                                    </ul>
                                    @error('rating')
                                    <p style="color: red;">{{ $message }}</p>
                                    @enderror
                                    <form class="findus" id="review" action="{{ route('review', ['language'=>app()->getLocale(), 'bus'=>$bus]) }}" method="POST">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div id="result1"></div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 col-sm-6">
                                                <div class="form-group">
                                                    <label for="name" class="d-none"></label>
                                                    <input type="text" class="form-control" placeholder="{{ __('Title') }}" name="title" id="title" required>
                                                    @error('title')
                                                    <p style="color: red;">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>
                                            <input type="hidden" id="phone_number" name="phone_number" value="{{ auth()->user()->phone_number }}">
                                            <div class="col-md-12 col-sm-12 mb-4">
                                                <label for="message" class="d-none"></label>
                                                <textarea placeholder="{{ __('Comment') }}" name="body" id="body"></textarea>
                                                @error('body')
                                                <p style="color: red;">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <input type="hidden" id="rate_star" name="rating">
                                        </div>
                                        <button data-callback="onSubmit" data-sitekey="{{ config('services.recaptcha.key') }}" class="g-recaptcha ml-3 mb-3 button gradient-btn" id="btn_submit">{{ __('Add Review') }}</button>
                                    </form>
                                </div>
                                @endcannot
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div id="accordion">
                            <div class="card shadow">
                                <div class="card-header">
                                    <a class="card-link darkcolor" data-toggle="collapse" href="#collapseOne">{{ __('Legend') }}</a>
                                </div>
                                <div id="collapseOne" class="collapse show align-items-center" data-parent="#accordion">
                                    <div class="ml-4 align-items-center">
                                        <div class="row align-items-center">
                                        <img src="{{ asset('image/empty_seat.png') }}" width="70px" height="70px" alt="" class="mr-4">
                                        <p>{{ __('Empyt Seat') }}</p>
                                        </div>
                                    </div>
                                    <div class="ml-4">
                                        <div class="row align-items-center">
                                        <img src="{{ asset('image/reserved_seat.png') }}" width="70px" height="70px" alt="" class="mr-4">
                                        <p>{{ __('Reserved Seat') }}</p>
                                        </div>
                                    </div>
                                    <div class="ml-4">
                                        <div class="row align-items-center">
                                        <img src="{{ asset('image/selected_seat.png') }}" width="70px" height="70px" alt="" class="mr-4 mb-4">
                                        <p>{{ __('Selected Seat') }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card shadow">
                                <div class="card-header">
                                    <a class="collapsed card-link darkcolor" data-toggle="collapse" href="#collapseTwo">{{ __('Contents') }}</a>
                                </div>
                                <div id="collapseTwo" class="collapse" data-parent="#accordion">
                                    <div class="card-body">
                                        <p>{{ $bus->body }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="card shadow">
                                <div class="card-header">
                                    <a class="collapsed card-link darkcolor" data-toggle="collapse" href="#collapseThree">{{ __('Time of Depature') }}</a>
                                </div>
                                <div id="collapseThree" class="collapse" data-parent="#accordion">
                                    <div class="card-body">
                                        <p>{{ $bus->time }} {{ __('on') }} {{ $bus->date->diffForHumans() }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 shadow mt-5 mt-md-0">
                        @if (session('seat_message'))
                        <div class="alert alert-success mt-3" role="alert">
                        {{ session('seat_message') }}
                        </div>
                        @endif
                        @auth
                            @csrf
                            @for ($i = 0; $i < $bus->rows; $i++)
                            <div style="width: 400px;" class="row ml-1">
                                @if ($i<4)
                                <div class="seat-container">
                                    <img @if (!in_array((($i%4)*4)+1, $seats))
                                    src="{{ asset('image/reserved_seat.png') }}"
                                    @else
                                    onclick="change({{(($i%4)*4)+1}});"
                                    src="{{ asset('image/empty_seat.png') }}"
                                    @endif  id="{{ (($i%4)*4)+1 }}"  class="seat"  width="70px" height="70px" alt="">
                                    <div class="seat-id">{{ (($i%4)*4)+1 }}</div>
                                </div>
                                <div class="seat-container">
                                    <img @if (!in_array((($i%4)*4)+2, $seats))
                                    src="{{ asset('image/reserved_seat.png') }}"
                                    @else
                                    onclick="change({{(($i%4)*4)+2}});"
                                    src="{{ asset('image/empty_seat.png') }}"
                                    @endif  id="{{ (($i%4)*4)+2 }}"  class="seat"  width="70px" height="70px" alt="">
                                    <div class="seat-id">{{ (($i%4)*4)+2 }}</div>
                                </div>
                                @if (($i+1) == $bus->rows)
                                <div class="seat-container">
                                    <img @if (!in_array((($i%4)*4)+3, $seats))
                                    src="{{ asset('image/reserved_seat.png') }}"
                                    @else
                                    onclick="change({{(($i%4)*4)+3}});"
                                    src="{{ asset('image/empty_seat.png') }}"
                                    @endif  id="{{ (($i%4)*4)+3 }}"  class="seat"  width="70px" height="70px" alt="">
                                    <div class="seat-id">{{ (($i%4)*4)+3 }}</div>
                                </div>
                                <div class="seat-container">
                                    <img @if (!in_array((($i%4)*4)+4, $seats))
                                    src="{{ asset('image/reserved_seat.png') }}"
                                    @else
                                    onclick="change({{(($i%4)*4)+4}});"
                                    src="{{ asset('image/empty_seat.png') }}"
                                    @endif  id="{{ (($i%4)*4)+4 }}"  class="seat"  width="70px" height="70px" alt="">
                                    <div class="seat-id">{{ (($i%4)*4)+4 }}</div>
                                </div>
                                <div class="seat-container">
                                    <img @if (!in_array((($i%4)*4)+5, $seats))
                                    src="{{ asset('image/reserved_seat.png') }}"
                                    @else
                                    onclick="change({{(($i%4)*4)+5}});"
                                    src="{{ asset('image/empty_seat.png') }}"
                                    @endif  id="{{ (($i%4)*4)+5 }}"  class="seat"  width="70px" height="70px" alt="">
                                    <div class="seat-id">{{ (($i%4)*4)+5 }}</div>
                                </div>
                                @else
                                <div style="width: 70px;"></div>
                                <div class="seat-container">
                                    <img @if (!in_array((($i%4)*4)+3, $seats))
                                    src="{{ asset('image/reserved_seat.png') }}"
                                    @else
                                    onclick="change({{(($i%4)*4)+3}});"
                                    src="{{ asset('image/empty_seat.png') }}"
                                    @endif  id="{{ (($i%4)*4)+3 }}"  class="seat"  width="70px" height="70px" alt="">
                                    <div class="seat-id">{{ (($i%4)*4)+3 }}</div>
                                </div>
                                <div class="seat-container">
                                    <img @if (!in_array((($i%4)*4)+4, $seats))
                                    src="{{ asset('image/reserved_seat.png') }}"
                                    @else
                                    onclick="change({{(($i%4)*4)+4}});"
                                    src="{{ asset('image/empty_seat.png') }}"
                                    @endif  id="{{ (($i%4)*4)+4 }}"  class="seat"  width="70px" height="70px" alt="">
                                    <div class="seat-id">{{ (($i%4)*4)+4 }}</div>
                                </div>
                                @endif

                                @else
                                    @if ($i>=4 && $i<8)
                                    <div class="seat-container">
                                        <img @if (!in_array((($i%4)*4)+17, $seats))
                                        src="{{ asset('image/reserved_seat.png') }}"
                                        @else
                                        onclick="change({{(($i%4)*4)+17}});"
                                        src="{{ asset('image/empty_seat.png') }}"
                                        @endif  id="{{ (($i%4)*4)+17 }}"  class="seat"  width="70px" height="70px" alt="">
                                        <div class="seat-id">{{ (($i%4)*4)+17 }}</div>
                                    </div>
                                    <div class="seat-container">
                                        <img @if (!in_array((($i%4)*4)+18, $seats))
                                        src="{{ asset('image/reserved_seat.png') }}"
                                        @else
                                        onclick="change({{(($i%4)*4)+18}});"
                                        src="{{ asset('image/empty_seat.png') }}"
                                        @endif  id="{{ (($i%4)*4)+18 }}"  class="seat"  width="70px" height="70px" alt="">
                                        <div class="seat-id">{{ (($i%4)*4)+18 }}</div>
                                    </div>
                                    @if (($i+1) == $bus->rows)
                                    <div class="seat-container">
                                        <img @if (!in_array((($i%4)*4)+19, $seats))
                                        src="{{ asset('image/reserved_seat.png') }}"
                                        @else
                                        onclick="change({{(($i%4)*4)+19}});"
                                        src="{{ asset('image/empty_seat.png') }}"
                                        @endif  id="{{ (($i%4)*4)+19 }}"  class="seat"  width="70px" height="70px" alt="">
                                        <div class="seat-id">{{ (($i%4)*4)+19 }}</div>
                                    </div>
                                    <div class="seat-container">
                                        <img @if (!in_array((($i%4)*4)+20, $seats))
                                        src="{{ asset('image/reserved_seat.png') }}"
                                        @else
                                        onclick="change({{(($i%4)*4)+20}});"
                                        src="{{ asset('image/empty_seat.png') }}"
                                        @endif  id="{{ (($i%4)*4)+20 }}"  class="seat"  width="70px" height="70px" alt="">
                                        <div class="seat-id">{{ (($i%4)*4)+20 }}</div>
                                    </div>
                                    <div class="seat-container">
                                        <img @if (!in_array((($i%4)*4)+21, $seats))
                                        src="{{ asset('image/reserved_seat.png') }}"
                                        @else
                                        onclick="change({{(($i%4)*4)+21}});"
                                        src="{{ asset('image/empty_seat.png') }}"
                                        @endif  id="{{ (($i%4)*4)+21 }}"  class="seat"  width="70px" height="70px" alt="">
                                        <div class="seat-id">{{ (($i%4)*4)+21 }}</div>
                                    </div>
                                    @else
                                    <div style="width: 70px;"></div>
                                    <div class="seat-container">
                                        <img @if (!in_array((($i%4)*4)+19, $seats))
                                        src="{{ asset('image/reserved_seat.png') }}"
                                        @else
                                        onclick="change({{(($i%4)*4)+19}});"
                                        src="{{ asset('image/empty_seat.png') }}"
                                        @endif  id="{{ (($i%4)*4)+19 }}"  class="seat"  width="70px" height="70px" alt="">
                                        <div class="seat-id">{{ (($i%4)*4)+19 }}</div>
                                    </div>
                                    <div class="seat-container">
                                        <img @if (!in_array((($i%4)*4)+20, $seats))
                                        src="{{ asset('image/reserved_seat.png') }}"
                                        @else
                                        onclick="change({{(($i%4)*4)+20}});"
                                        src="{{ asset('image/empty_seat.png') }}"
                                        @endif  id="{{ (($i%4)*4)+20 }}"  class="seat"  width="70px" height="70px" alt="">
                                        <div class="seat-id">{{ (($i%4)*4)+20 }}</div>
                                    </div>
                                    @endif
                                    @else
                                        @if ($i>=8 && $i<12)
                                        <div class="seat-container">
                                            <img @if (!in_array((($i%4)*4)+33, $seats))
                                            src="{{ asset('image/reserved_seat.png') }}"
                                            @else
                                            onclick="change({{(($i%4)*4)+33}});"
                                            src="{{ asset('image/empty_seat.png') }}"
                                            @endif  id="{{ (($i%4)*4)+33 }}"  class="seat"  width="70px" height="70px" alt="">
                                            <div class="seat-id">{{ (($i%4)*4)+33 }}</div>
                                        </div>
                                        <div class="seat-container">
                                            <img @if (!in_array((($i%4)*4)+34, $seats))
                                            src="{{ asset('image/reserved_seat.png') }}"
                                            @else
                                            onclick="change({{(($i%4)*4)+34}});"
                                            src="{{ asset('image/empty_seat.png') }}"
                                            @endif  id="{{ (($i%4)*4)+34 }}"  class="seat"  width="70px" height="70px" alt="">
                                            <div class="seat-id">{{ (($i%4)*4)+34 }}</div>
                                        </div>
                                        @if (($i+1) == $bus->rows)
                                        <div class="seat-container">
                                            <img @if (!in_array((($i%4)*4)+35, $seats))
                                            src="{{ asset('image/reserved_seat.png') }}"
                                            @else
                                            onclick="change({{(($i%4)*4)+35}});"
                                            src="{{ asset('image/empty_seat.png') }}"
                                            @endif  id="{{ (($i%4)*4)+35 }}"  class="seat"  width="70px" height="70px" alt="">
                                            <div class="seat-id">{{ (($i%4)*4)+35 }}</div>
                                        </div>
                                        <div class="seat-container">
                                            <img @if (!in_array((($i%4)*4)+36, $seats))
                                            src="{{ asset('image/reserved_seat.png') }}"
                                            @else
                                            onclick="change({{(($i%4)*4)+36}});"
                                            src="{{ asset('image/empty_seat.png') }}"
                                            @endif  id="{{ (($i%4)*4)+36 }}"  class="seat"  width="70px" height="70px" alt="">
                                            <div class="seat-id">{{ (($i%4)*4)+36 }}</div>
                                        </div>
                                        <div class="seat-container">
                                            <img @if (!in_array((($i%4)*4)+37, $seats))
                                            src="{{ asset('image/reserved_seat.png') }}"
                                            @else
                                            onclick="change({{(($i%4)*4)+37}});"
                                            src="{{ asset('image/empty_seat.png') }}"
                                            @endif  id="{{ (($i%4)*4)+37 }}"  class="seat"  width="70px" height="70px" alt="">
                                            <div class="seat-id">{{ (($i%4)*4)+37 }}</div>
                                        </div>
                                        @else
                                        <div style="width: 70px;"></div>
                                        <div class="seat-container">
                                            <img @if (!in_array((($i%4)*4)+35, $seats))
                                            src="{{ asset('image/reserved_seat.png') }}"
                                            @else
                                            onclick="change({{(($i%4)*4)+35}});"
                                            src="{{ asset('image/empty_seat.png') }}"
                                            @endif  id="{{ (($i%4)*4)+35 }}"  class="seat"  width="70px" height="70px" alt="">
                                            <div class="seat-id">{{ (($i%4)*4)+35 }}</div>
                                        </div>
                                        <div class="seat-container">
                                            <img @if (!in_array((($i%4)*4)+36, $seats))
                                            src="{{ asset('image/reserved_seat.png') }}"
                                            @else
                                            onclick="change({{(($i%4)*4)+36}});"
                                            src="{{ asset('image/empty_seat.png') }}"
                                            @endif  id="{{ (($i%4)*4)+36 }}"  class="seat"  width="70px" height="70px" alt="">
                                            <div class="seat-id">{{ (($i%4)*4)+36 }}</div>
                                        </div>
                                        @endif
                                        @else
                                            @if ($i>=12 && $i<16)
                                            <div class="seat-container">
                                                <img @if (!in_array((($i%4)*4)+49, $seats))
                                                src="{{ asset('image/reserved_seat.png') }}"
                                                @else
                                                onclick="change({{(($i%4)*4)+49}});"
                                                src="{{ asset('image/empty_seat.png') }}"
                                                @endif  id="{{ (($i%4)*4)+49 }}"  class="seat"  width="70px" height="70px" alt="">
                                                <div class="seat-id">{{ (($i%4)*4)+49 }}</div>
                                            </div>
                                            <div class="seat-container">
                                                <img @if (!in_array((($i%4)*4)+50, $seats))
                                                src="{{ asset('image/reserved_seat.png') }}"
                                                @else
                                                onclick="change({{(($i%4)*4)+50}});"
                                                src="{{ asset('image/empty_seat.png') }}"
                                                @endif  id="{{ (($i%4)*4)+50 }}"  class="seat"  width="70px" height="70px" alt="">
                                                <div class="seat-id">{{ (($i%4)*4)+50 }}</div>
                                            </div>
                                            @if (($i+1) == $bus->rows)
                                            <div class="seat-container">
                                                <img @if (!in_array((($i%4)*4)+51, $seats))
                                                src="{{ asset('image/reserved_seat.png') }}"
                                                @else
                                                onclick="change({{(($i%4)*4)+51}});"
                                                src="{{ asset('image/empty_seat.png') }}"
                                                @endif  id="{{ (($i%4)*4)+51 }}"  class="seat"  width="70px" height="70px" alt="">
                                                <div class="seat-id">{{ (($i%4)*4)+51 }}</div>
                                            </div>
                                            <div class="seat-container">
                                                <img @if (!in_array((($i%4)*4)+52, $seats))
                                                src="{{ asset('image/reserved_seat.png') }}"
                                                @else
                                                onclick="change({{(($i%4)*4)+52}});"
                                                src="{{ asset('image/empty_seat.png') }}"
                                                @endif  id="{{ (($i%4)*4)+52 }}"  class="seat"  width="70px" height="70px" alt="">
                                                <div class="seat-id">{{ (($i%4)*4)+52 }}</div>
                                            </div>
                                            <div class="seat-container">
                                                <img @if (!in_array((($i%4)*4)+53, $seats))
                                                src="{{ asset('image/reserved_seat.png') }}"
                                                @else
                                                onclick="change({{(($i%4)*4)+53}});"
                                                src="{{ asset('image/empty_seat.png') }}"
                                                @endif  id="{{ (($i%4)*4)+53 }}"  class="seat"  width="70px" height="70px" alt="">
                                                <div class="seat-id">{{ (($i%4)*4)+53 }}</div>
                                            </div>
                                            @else
                                            <div style="width: 70px;"></div>
                                            <div class="seat-container">
                                                <img @if (!in_array((($i%4)*4)+51, $seats))
                                                src="{{ asset('image/reserved_seat.png') }}"
                                                @else
                                                onclick="change({{(($i%4)*4)+51}});"
                                                src="{{ asset('image/empty_seat.png') }}"
                                                @endif  id="{{ (($i%4)*4)+51 }}"  class="seat"  width="70px" height="70px" alt="">
                                                <div class="seat-id">{{ (($i%4)*4)+51 }}</div>
                                            </div>
                                            <div class="seat-container">
                                                <img @if (!in_array((($i%4)*4)+52, $seats))
                                                src="{{ asset('image/reserved_seat.png') }}"
                                                @else
                                                onclick="change({{(($i%4)*4)+52}});"
                                                src="{{ asset('image/empty_seat.png') }}"
                                                @endif  id="{{ (($i%4)*4)+52 }}"  class="seat"  width="70px" height="70px" alt="">
                                                <div class="seat-id">{{ (($i%4)*4)+52 }}</div>
                                            </div>
                                            @endif
                                            @else
                                            <div class="seat-container">
                                                <img @if (!in_array((($i%4)*4)+62, $seats))
                                                src="{{ asset('image/reserved_seat.png') }}"
                                                @else
                                                onclick="change({{(($i%4)*4)+62}});"
                                                src="{{ asset('image/empty_seat.png') }}"
                                                @endif  id="{{ (($i%4)*4)+62 }}"  class="seat"  width="70px" height="70px" alt="">
                                                <div class="seat-id">{{ (($i%4)*4)+62 }}</div>
                                            </div>
                                            <div class="seat-container">
                                                <img @if (!in_array((($i%4)*4)+63, $seats))
                                                src="{{ asset('image/reserved_seat.png') }}"
                                                @else
                                                onclick="change({{(($i%4)*4)+63}});"
                                                src="{{ asset('image/empty_seat.png') }}"
                                                @endif  id="{{ (($i%4)*4)+63 }}"  class="seat"  width="70px" height="70px" alt="">
                                                <div class="seat-id">{{ (($i%4)*4)+63 }}</div>
                                            </div>
                                            @if (($i+1) == $bus->rows)
                                            <div class="seat-container">
                                                <img @if (!in_array((($i%4)*4)+64, $seats))
                                                src="{{ asset('image/reserved_seat.png') }}"
                                                @else
                                                onclick="change({{(($i%4)*4)+64}});"
                                                src="{{ asset('image/empty_seat.png') }}"
                                                @endif  id="{{ (($i%4)*4)+64 }}"  class="seat"  width="70px" height="70px" alt="">
                                                <div class="seat-id">{{ (($i%4)*4)+64 }}</div>
                                            </div>
                                            <div class="seat-container">
                                                <img @if (!in_array((($i%4)*4)+65, $seats))
                                                src="{{ asset('image/reserved_seat.png') }}"
                                                @else
                                                onclick="change({{(($i%4)*4)+65}});"
                                                src="{{ asset('image/empty_seat.png') }}"
                                                @endif  id="{{ (($i%4)*4)+65 }}"  class="seat"  width="70px" height="70px" alt="">
                                                <div class="seat-id">{{ (($i%4)*4)+65 }}</div>
                                            </div>
                                            <div class="seat-container">
                                                <img @if (!in_array((($i%4)*4)+66, $seats))
                                                src="{{ asset('image/reserved_seat.png') }}"
                                                @else
                                                onclick="change({{(($i%4)*4)+66}});"
                                                src="{{ asset('image/empty_seat.png') }}"
                                                @endif  id="{{ (($i%4)*4)+66 }}"  class="seat"  width="70px" height="70px" alt="">
                                                <div class="seat-id">{{ (($i%4)*4)+66 }}</div>
                                            </div>
                                            @else
                                            <div style="width: 70px;"></div>
                                            <div class="seat-container">
                                                <img @if (!in_array((($i%4)*4)+64, $seats))
                                                src="{{ asset('image/reserved_seat.png') }}"
                                                @else
                                                onclick="change({{(($i%4)*4)+64}});"
                                                src="{{ asset('image/empty_seat.png') }}"
                                                @endif  id="{{ (($i%4)*4)+64 }}"  class="seat"  width="70px" height="70px" alt="">
                                                <div class="seat-id">{{ (($i%4)*4)+64 }}</div>
                                            </div>
                                            <div class="seat-container">
                                                <img @if (!in_array((($i%4)*4)+65, $seats))
                                                src="{{ asset('image/reserved_seat.png') }}"
                                                @else
                                                onclick="change({{(($i%4)*4)+65}});"
                                                src="{{ asset('image/empty_seat.png') }}"
                                                @endif  id="{{ (($i%4)*4)+65 }}"  class="seat"  width="70px" height="70px" alt="">
                                                <div class="seat-id">{{ (($i%4)*4)+65 }}</div>
                                            </div>
                                            @endif
                                            @endif
                                        @endif
                                    @endif
                                @endif
                            </div>
                            @endfor

                        @can('isowner', $bus)
                        <form action="{{ route('takeseat', ['language'=>app()->getLocale(), 'bus'=>$bus]) }}" method="post">
                            @csrf
                            <div class="col-md-12 col-sm-12">
                                <input type="hidden" id="seats_id" name="seats_id">
                                <button type="submit" class="btn rounded-lg w-100 mb-4 mt-4 btn-primary">{{ __('Take Seat') }}</button>
                            </div>
                        </form>
                        @else
                        <form action="{{ route('payseat', ['language'=>app()->getLocale(), 'bus'=>$bus]) }}" method="post">
                            @csrf
                            <div class="col-md-12 col-sm-12">
                                <input type="hidden" id="seats_id" name="seats_id">
                                <button type="submit" onclick="segment()" class="btn rounded-lg w-100 mb-4 mt-4 btn-primary">{{ __('Pay For Seat') }}</button>
                            </div>
                        </form>
                        @endcan
                        @endauth
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{ __('Remove Bus') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                {{ __('Are you Sure you want to delete this bus?') }}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('Cancel') }}</button>
                <form action="{{ route('removebus', ['language'=>app()->getLocale(), 'bus'=>$bus]) }}" method="POST">
                    @csrf
                    @method('delete')
            <button type="submit" class="btn btn-danger">{{ __('Remove Bus') }}</button>
                </form>
            </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="reset" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{ __('Reset Bus') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                {{ __('Are you Sure you want to reset this bus?') }}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('Cancel') }}</button>
                <form action="{{ route('resetbus', ['language'=>app()->getLocale(), 'bus'=>$bus]) }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-danger" >{{ __('Reset Bus') }}</button>
                </form>
            </div>
            </div>
        </div>
    </div>
</section>

<script>
var seats = new Array;
var rate_array = new Array;

function remove(array, id){
    const index = array.indexOf(id);
    if (index > -1) { array.splice(index, 1) }
}

function change(id) {
    var img1 = "{{ asset('image/empty_seat.png') }}",
        img2 = "{{ asset('image/selected_seat.png') }}",
        img3 = "{{ asset('image/reserved_seat.png') }}";
    var imgElement = document.getElementById(id);


    if(imgElement.src === img1){
    imgElement.src = img2;
    document.getElementById("seats_id").innerHTML = seats.push(id);
    } else{
        imgElement.src = img1;
        remove(seats, id);
    }
    document.getElementById("seats_id").value = seats;
}

function take(rate){
    rate_array.push(rate);
    document.getElementById("rate_star").value = rate_array[rate_array.length-1];
}

</script>

<style>
    .seat-container{
        position: relative;
        text-align: center;
        color: black;
    }

    .seat-id{
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
    }
</style>
<!-- Services us ends -->

@endsection
