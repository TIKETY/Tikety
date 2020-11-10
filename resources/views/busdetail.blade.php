@extends('layout.app')

@section('content')

<!-- Services us -->
<section id="our-services" class="padding whitebox">
    <div class="container">
        <div class="row whitebox top15">
            <div class="col-lg-4 col-md-5">
                <div class="image widget bottom20 shadow"><img alt="SEO" src="https://i.pravatar.cc/300?u={{ $bus->id }}"></div>
                <div class="widget shadow heading_space text-center text-md-left">
                    <h4 class="text-capitalize darkcolor bottom35">Need Help?</h4>
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
                    <p class="bottom30">{{ $bus->from }} to {{ $bus->to }}</p>
                    <p class="bottom30">{{ $bus->date->diffForHumans() }} departure time on {{ $bus->time }}</p>

                    @auth
                    {{-- @can('edit_bus', Role::class) --}}
                    @if (auth()->user()->id == $bus->user_id)
                    <div class="row">
                        <a href="{{ route('UpdateBus', $bus) }}" class="btn btn-primary mr-3">Edit Bus</a>
                        <form action="{{ route('removebus', $bus) }}" method="POST">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-primary" >Remove Bus</button>
                        </form>
                    </div>
                    @endif
                    {{-- @endcan --}}
                    @endauth
                </div>
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div id="accordion">
                            <div class="card shadow">
                                <div class="card-header">
                                    <a class="card-link darkcolor" data-toggle="collapse" href="#collapseOne">Route Via</a>
                                </div>
                                <div id="collapseOne" class="collapse show" data-parent="#accordion">
                                    <div class="card-body">
                                        <p>{{ $bus->route }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="card shadow">
                                <div class="card-header">
                                    <a class="collapsed card-link darkcolor" data-toggle="collapse" href="#collapseTwo">Contents</a>
                                </div>
                                <div id="collapseTwo" class="collapse" data-parent="#accordion">
                                    <div class="card-body">
                                        <p>{{ $bus->body }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="card shadow">
                                <div class="card-header">
                                    <a class="collapsed card-link darkcolor" data-toggle="collapse" href="#collapseThree">Time of Depature</a>
                                </div>
                                <div id="collapseThree" class="collapse" data-parent="#accordion">
                                    <div class="card-body">
                                        <p>{{ $bus->time }} on {{ $bus->date->diffForHumans() }}</p>
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
                        @if (session('seat_message'))
                        <div class="alert alert-success mt-3" role="alert">
                        {{ session('seat_message') }}
                        </div>
                        @endif
                        @auth
                            @csrf
                            @if (auth()->user()->id == $bus->user_id)
                            @for ($i = 0; $i < $bus->rows; $i++)
                            <div style="width: 400px;" class="row">
                                @if ($i<4)
                                <div class="seat-container">
                                    <img @if (!in_array((($i%4)*4)+1, $seats))
                                    src="{{ asset('image/reserved_seat.png') }}"
                                    @else
                                    onclick="change({{(($i%4)*4)+1}});"
                                    src="{{ asset('image/empty_seat.png') }}"
                                    @endif  id="{{ (($i%4)*4)+1 }}"  class="seat"  width="80px" height="80px" alt="">
                                    <div class="seat-id">{{ (($i%4)*4)+1 }}</div>
                                </div>
                                <div class="seat-container">
                                    <img @if (!in_array((($i%4)*4)+2, $seats))
                                    src="{{ asset('image/reserved_seat.png') }}"
                                    @else
                                    onclick="change({{(($i%4)*4)+2}});"
                                    src="{{ asset('image/empty_seat.png') }}"
                                    @endif  id="{{ (($i%4)*4)+2 }}"  class="seat"  width="80px" height="80px" alt="">
                                    <div class="seat-id">{{ (($i%4)*4)+2 }}</div>
                                </div>
                                <div style="width: 50px;"></div>
                                <div class="seat-container">
                                    <img @if (!in_array((($i%4)*4)+3, $seats))
                                    src="{{ asset('image/reserved_seat.png') }}"
                                    @else
                                    onclick="change({{(($i%4)*4)+3}});"
                                    src="{{ asset('image/empty_seat.png') }}"
                                    @endif  id="{{ (($i%4)*4)+3 }}"  class="seat"  width="80px" height="80px" alt="">
                                    <div class="seat-id">{{ (($i%4)*4)+3 }}</div>
                                </div>
                                <div class="seat-container">
                                    <img @if (!in_array((($i%4)*4)+4, $seats))
                                    src="{{ asset('image/reserved_seat.png') }}"
                                    @else
                                    onclick="change({{(($i%4)*4)+4}});"
                                    src="{{ asset('image/empty_seat.png') }}"
                                    @endif  id="{{ (($i%4)*4)+4 }}"  class="seat"  width="80px" height="80px" alt="">
                                    <div class="seat-id">{{ (($i%4)*4)+4 }}</div>
                                </div>
                                @else
                                    @if ($i>=4 && $i<8)
                                    <div class="seat-container">
                                        <img @if (!in_array((($i%4)*4)+17, $seats))
                                        src="{{ asset('image/reserved_seat.png') }}"
                                        @else
                                        onclick="change({{(($i%4)*4)+17}});"
                                        src="{{ asset('image/empty_seat.png') }}"
                                        @endif  id="{{ (($i%4)*4)+17 }}"  class="seat"  width="80px" height="80px" alt="">
                                        <div class="seat-id">{{ (($i%4)*4)+17 }}</div>
                                    </div>
                                    <div class="seat-container">
                                        <img @if (!in_array((($i%4)*4)+18, $seats))
                                        src="{{ asset('image/reserved_seat.png') }}"
                                        @else
                                        onclick="change({{(($i%4)*4)+18}});"
                                        src="{{ asset('image/empty_seat.png') }}"
                                        @endif  id="{{ (($i%4)*4)+18 }}"  class="seat"  width="80px" height="80px" alt="">
                                        <div class="seat-id">{{ (($i%4)*4)+18 }}</div>
                                    </div>
                                    <div style="width: 50px;"></div>
                                    <div class="seat-container">
                                        <img @if (!in_array((($i%4)*4)+19, $seats))
                                        src="{{ asset('image/reserved_seat.png') }}"
                                        @else
                                        onclick="change({{(($i%4)*4)+19}});"
                                        src="{{ asset('image/empty_seat.png') }}"
                                        @endif  id="{{ (($i%4)*4)+19 }}"  class="seat"  width="80px" height="80px" alt="">
                                        <div class="seat-id">{{ (($i%4)*4)+19 }}</div>
                                    </div>
                                    <div class="seat-container">
                                        <img @if (!in_array((($i%4)*4)+19, $seats))
                                        src="{{ asset('image/reserved_seat.png') }}"
                                        @else
                                        onclick="change({{(($i%4)*4)+19}});"
                                        src="{{ asset('image/empty_seat.png') }}"
                                        @endif  id="{{ (($i%4)*4)+19 }}"  class="seat"  width="80px" height="80px" alt="">
                                        <div class="seat-id">{{ (($i%4)*4)+19 }}</div>
                                    </div>
                                    @else
                                        @if ($i>=8 && $i<12)
                                        <div class="seat-container">
                                            <img @if (!in_array((($i%4)*4)+33, $seats))
                                            src="{{ asset('image/reserved_seat.png') }}"
                                            @else
                                            onclick="change({{(($i%4)*4)+33}});"
                                            src="{{ asset('image/empty_seat.png') }}"
                                            @endif  id="{{ (($i%4)*4)+33 }}"  class="seat"  width="80px" height="80px" alt="">
                                            <div class="seat-id">{{ (($i%4)*4)+33 }}</div>
                                        </div>
                                        <div class="seat-container">
                                            <img @if (!in_array((($i%4)*4)+34, $seats))
                                            src="{{ asset('image/reserved_seat.png') }}"
                                            @else
                                            onclick="change({{(($i%4)*4)+34}});"
                                            src="{{ asset('image/empty_seat.png') }}"
                                            @endif  id="{{ (($i%4)*4)+34 }}"  class="seat"  width="80px" height="80px" alt="">
                                            <div class="seat-id">{{ (($i%4)*4)+34 }}</div>
                                        </div>
                                        <div style="width: 50px;"></div>
                                        <div class="seat-container">
                                            <img @if (!in_array((($i%4)*4)+35, $seats))
                                            src="{{ asset('image/reserved_seat.png') }}"
                                            @else
                                            onclick="change({{(($i%4)*4)+35}});"
                                            src="{{ asset('image/empty_seat.png') }}"
                                            @endif  id="{{ (($i%4)*4)+35 }}"  class="seat"  width="80px" height="80px" alt="">
                                            <div class="seat-id">{{ (($i%4)*4)+35 }}</div>
                                        </div>
                                        <div class="seat-container">
                                            <img @if (!in_array((($i%4)*4)+36, $seats))
                                            src="{{ asset('image/reserved_seat.png') }}"
                                            @else
                                            onclick="change({{(($i%4)*4)+36}});"
                                            src="{{ asset('image/empty_seat.png') }}"
                                            @endif  id="{{ (($i%4)*4)+36 }}"  class="seat"  width="80px" height="80px" alt="">
                                            <div class="seat-id">{{ (($i%4)*4)+36 }}</div>
                                        </div>
                                        @else
                                            @if ($i>=12 && $i<16)
                                            <div class="seat-container">
                                                <img @if (!in_array((($i%4)*4)+49, $seats))
                                                src="{{ asset('image/reserved_seat.png') }}"
                                                @else
                                                onclick="change({{(($i%4)*4)+49}});"
                                                src="{{ asset('image/empty_seat.png') }}"
                                                @endif  id="{{ (($i%4)*4)+49 }}"  class="seat"  width="80px" height="80px" alt="">
                                                <div class="seat-id">{{ (($i%4)*4)+49 }}</div>
                                            </div>
                                            <div class="seat-container">
                                                <img @if (!in_array((($i%4)*4)+50, $seats))
                                                src="{{ asset('image/reserved_seat.png') }}"
                                                @else
                                                onclick="change({{(($i%4)*4)+50}});"
                                                src="{{ asset('image/empty_seat.png') }}"
                                                @endif  id="{{ (($i%4)*4)+50 }}"  class="seat"  width="80px" height="80px" alt="">
                                                <div class="seat-id">{{ (($i%4)*4)+50 }}</div>
                                            </div>
                                            <div style="width: 50px;"></div>
                                            <div class="seat-container">
                                                <img @if (!in_array((($i%4)*4)+51, $seats))
                                                src="{{ asset('image/reserved_seat.png') }}"
                                                @else
                                                onclick="change({{(($i%4)*4)+51}});"
                                                src="{{ asset('image/empty_seat.png') }}"
                                                @endif  id="{{ (($i%4)*4)+51 }}"  class="seat"  width="80px" height="80px" alt="">
                                                <div class="seat-id">{{ (($i%4)*4)+51 }}</div>
                                            </div>
                                            <div class="seat-container">
                                                <img @if (!in_array((($i%4)*4)+52, $seats))
                                                src="{{ asset('image/reserved_seat.png') }}"
                                                @else
                                                onclick="change({{(($i%4)*4)+52}});"
                                                src="{{ asset('image/empty_seat.png') }}"
                                                @endif  id="{{ (($i%4)*4)+52 }}"  class="seat"  width="80px" height="80px" alt="">
                                                <div class="seat-id">{{ (($i%4)*4)+52 }}</div>
                                            </div>
                                            @else
                                            <div class="seat-container">
                                                <img @if (!in_array((($i%4)*4)+62, $seats))
                                                src="{{ asset('image/reserved_seat.png') }}"
                                                @else
                                                onclick="change({{(($i%4)*4)+62}});"
                                                src="{{ asset('image/empty_seat.png') }}"
                                                @endif  id="{{ (($i%4)*4)+62 }}"  class="seat"  width="80px" height="80px" alt="">
                                                <div class="seat-id">{{ (($i%4)*4)+62 }}</div>
                                            </div>
                                            <div class="seat-container">
                                                <img @if (!in_array((($i%4)*4)+63, $seats))
                                                src="{{ asset('image/reserved_seat.png') }}"
                                                @else
                                                onclick="change({{(($i%4)*4)+63}});"
                                                src="{{ asset('image/empty_seat.png') }}"
                                                @endif  id="{{ (($i%4)*4)+63 }}"  class="seat"  width="80px" height="80px" alt="">
                                                <div class="seat-id">{{ (($i%4)*4)+63 }}</div>
                                            </div>
                                            <div style="width: 50px;"></div>
                                            <div class="seat-container">
                                                <img @if (!in_array((($i%4)*4)+64, $seats))
                                                src="{{ asset('image/reserved_seat.png') }}"
                                                @else
                                                onclick="change({{(($i%4)*4)+64}});"
                                                src="{{ asset('image/empty_seat.png') }}"
                                                @endif  id="{{ (($i%4)*4)+64 }}"  class="seat"  width="80px" height="80px" alt="">
                                                <div class="seat-id">{{ (($i%4)*4)+64 }}</div>
                                            </div>
                                            <div class="seat-container">
                                                <img @if (!in_array((($i%4)*4)+65, $seats))
                                                src="{{ asset('image/reserved_seat.png') }}"
                                                @else
                                                onclick="change({{(($i%4)*4)+65}});"
                                                src="{{ asset('image/empty_seat.png') }}"
                                                @endif  id="{{ (($i%4)*4)+65 }}"  class="seat"  width="80px" height="80px" alt="">
                                                <div class="seat-id">{{ (($i%4)*4)+65 }}</div>
                                            </div>
                                            @endif
                                        @endif
                                    @endif
                                @endif
                            </div>
                            @endfor
                        <form action="{{ route('takeseat', $bus) }}" method="post">
                            @csrf
                            <div class="col-md-12 col-sm-12">
                                <input type="hidden" id="seats_id" name="seats_id">
                                <button type="submit" class="btn rounded-lg w-100 mb-4 mt-4 btn-primary">Take Seat</button>
                            </div>

                        </form>
                            @endif

                        @endauth
                            @auth
                                @if (auth()->user()->id!=$bus->user_id)
                                <form class="getin_form wow fadeInUp" data-wow-delay="400ms" method="POST" action="{{ route('ContactBus', $bus->id) }}">
                                    @csrf
                                    <div class="row">
                                    <div class="col-md-12 col-sm-12 mt-4">
                                        @if (session('message_contact'))
                                        <div class="alert alert-success" role="alert">
                                        {{ session('message_contact') }}
                                        </div>
                                        @endif
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
                            @if (session('message_contact'))
                            <div class="alert alert-success" role="alert">
                            {{ session('message_contact') }}
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

<script>
function loadImage() {
        alert("Image is loaded");
}


function remove(array, id){
    const index = array.indexOf(id);
    if (index > -1) { array.splice(index, 1) }
}


function change(id) {
   var img1 = "{{ asset('image/empty_seat.png') }}",
       img2 = "{{ asset('image/selected_seat.png') }}",
       img3 = "{{ asset('image/reserved_seat.png') }}";
   var imgElement = document.getElementById(id);
    var seats = [];
        // imgElement.src = (imgElement.src === img1)? img2 : img1;

   if(imgElement.src === img1){
    imgElement.src = img2;
    seats.push(id);
   } else{
        imgElement.src = img1;
        remove(seats, id);
   }
   document.getElementById("seats_id").value = seats;
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
