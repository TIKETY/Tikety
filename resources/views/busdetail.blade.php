@extends('layout.app')

@section('content')

<!-- Services us -->
<section id="our-services" class="padding whitebox">
    <div class="container">
        <div class="row whitebox top15">
            <div class="col-lg-4 col-md-5">
                <div class="image widget bottom20 shadow"><img alt="SEO" src="https://i.pravatar.cc/300?u={{ $bus->user->id }}"></div>
                <div class="widget shadow heading_space text-center text-md-left">
                    <h4 class="text-capitalize darkcolor bottom20">Need Help?</h4>
                    <div class="contact-table colorone d-table bottom15">
                        <div class="d-table-cell cells">
                            <span class="icon-cell"><i class="fas fa-mobile-alt"></i></span>
                        </div>
                        <div class="d-table-cell cells">
                            <p class="bottom0">+92-0900-10072 <span class="d-block">+92-0900-10072</span></p>
                        </div>
                    </div>
                    <div class="contact-table colorone d-table bottom15 text-left">
                        <div class="d-table-cell cells">
                            <span class="icon-cell"><i class="fas fa-map-marker-alt"></i></span>
                        </div>
                        <div class="d-table-cell cells">
                            <p class="bottom0">130 Queens St.Tottenham Road,
                                <span class="d-block">Tokio Japan</span>
                            </p>
                        </div>
                    </div>
                    <div class="contact-table colorone d-table text-left">
                        <div class="d-table-cell cells">
                            <span class="icon-cell"><i class="far fa-clock"></i></span>
                        </div>
                        <div class="d-table-cell cells">
                            <p class="bottom0">Mon to Sat - 9:00am to 6:00pm
                                <span class="d-block">Sunday: Closed</span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 col-md-7">
                <div class="widget shadow heading_space text-center text-md-left">
                    <h3 class="darkcolor font-normal bottom30">{{ $bus->name }}</h3>
                    <p class="bottom30">{{ $bus->route }}</p>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div id="accordion">
                            <div class="card shadow">
                                <div class="card-header">
                                    <a class="card-link darkcolor" data-toggle="collapse" href="#collapseOne">Our Mission</a>
                                </div>
                                <div id="collapseOne" class="collapse show" data-parent="#accordion">
                                    <div class="card-body">
                                        <p>{{ $bus->body }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="card shadow">
                                <div class="card-header">
                                    <a class="collapsed card-link darkcolor" data-toggle="collapse" href="#collapseTwo">Our Goals</a>
                                </div>
                                <div id="collapseTwo" class="collapse" data-parent="#accordion">
                                    <div class="card-body">
                                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</p>
                                    </div>
                                </div>
                            </div>
                            <div class="card shadow">
                                <div class="card-header">
                                    <a class="collapsed card-link darkcolor" data-toggle="collapse" href="#collapseThree">Inspections & Occupancy </a>
                                </div>
                                <div id="collapseThree" class="collapse" data-parent="#accordion">
                                    <div class="card-body">
                                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</p>
                                    </div>
                                </div>
                            </div>
                            <div class="card shadow">
                                <div class="card-header">
                                    <a class="collapsed card-link darkcolor" data-toggle="collapse" href="#collapseFour">Top Achievements </a>
                                </div>
                                <div id="collapseFour" class="collapse" data-parent="#accordion">
                                    <div class="card-body">
                                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 shadow mt-5 mt-md-0">
                        @auth
                            @if (auth()->user()->id == $bus->user_id)
                            @for ($i = 0; $i < $bus->rows; $i++)
                            <div style="width: 400px;" class="row">
                                <a href=""><img src="{{ asset('image/selected_seat.png') }}" width="80px" height="80px" alt=""></a>
                                <a href=""><img src="{{ asset('image/selected_seat.png') }}" width="80px" height="80px" alt=""></a>
                                <div style="width: 50px;"></div>
                                <a href=""><img src="{{ asset('image/selected_seat.png') }}" width="80px" height="80px" alt=""></a>
                                <a href=""><img src="{{ asset('image/selected_seat.png') }}" width="80px" height="80px" alt=""></a>
                            </div>
                            @endfor
                            @endif
                        @endauth
                            @auth
                                @if (auth()->user()->id!=$bus->user_id)
                                <form class="getin_form wow fadeInUp" data-wow-delay="400ms" method="POST" action="{{ route('ContactBus', $bus->id) }}">
                                    @csrf
                                    <div class="row">
                                    <div class="col-md-12 col-sm-12 mt-4">
                                        <div class="form-group">
                                            <input class="form-control" type="text" placeholder="First Name:" required id="name" name="name">
                                            <label for="first_name1" class="d-none"></label>
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-sm-12">
                                        <div class="form-group">
                                            <input class="form-control" type="email" placeholder="Email:" required id="email1" name="email">
                                            <label for="email1" class="d-none"></label>
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-sm-12">
                                        <div class="form-group">
                                            <textarea class="form-control" name="body"  placeholder="Request a FreeConsultation" required id="body"></textarea>
                                            <label for="FreeConsultation1" class="d-none"></label>
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-sm-12 mb-4">
                                        <button type="submit" class="button btn-primary w-100" id="submit_btn1">Free Consultation</button>
                                    </div>
                                    </div>
                                    </form>
                                @endif
                            @endauth

                            @guest
                            @if (session('message'))
                            <div class="alert alert-success" role="alert">
                                {{ session('message') }}
                              </div>
                            @endif
                            <form class="getin_form wow fadeInUp" data-wow-delay="400ms" method="POST" action="{{ route('ContactBus', $bus->id) }}">
                                @csrf
                                <div class="row">
                                <div class="col-md-12 col-sm-12 mt-4">
                                    <div class="form-group">
                                        <input class="form-control" type="text" placeholder="First Name:" required id="name" name="name">
                                        <label for="first_name1" class="d-none"></label>
                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <input class="form-control" type="email" placeholder="Email:" required id="email1" name="email">
                                        <label for="email1" class="d-none"></label>
                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <textarea class="form-control" name="body"  placeholder="Request a FreeConsultation" required id="body"></textarea>
                                        <label for="FreeConsultation1" class="d-none"></label>
                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-12 mb-4">
                                    <button type="submit" class="button btn-primary w-100" id="submit_btn1">Free Consultation</button>
                                </div>
                                </div>
                                </form>
                            @endguest

                            </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Services us ends -->


@endsection
