@extends('layout.app')

@section('content')

<section id="ourfaq" class="whitebox position-relative padding">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center animated wow fadeIn" data-wow-delay="300ms">
                <h2 class="heading bottom30 darkcolor font-light2">Frequently Asked Questions
                </h2>
                <div class="col-md-8 offset-md-2">
                    <p class="heading_space">Lorem ipsum dolor sit amet, consectetur adipisicing elit. A dolores explicabo laudantium, omnis provident quam reiciendis voluptatum?</p>
                </div>
            </div>
            <h2 class="d-none">Tabs</h2>
            <div class="col-md-12 col-sm-12">
                <div id="accordion">
                    <div class="card shadow">
                        <div class="card-header">
                            <a class="card-link darkcolor" data-toggle="collapse" href="#collapseOne">Our Mission</a>
                        </div>
                        <div id="collapseOne" class="collapse show" data-parent="#accordion">
                            <div class="card-body">
                                <p class="bottom20">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it
                                    to make a type specimen book. It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s. It has survived not only five centuries, but also the leap into
                                    electronic typesetting, remaining essentially unchanged.</p>
                            </div>
                        </div>
                    </div>
                    <div class="card shadow">
                        <div class="card-header">
                            <a class="collapsed card-link darkcolor" data-toggle="collapse" href="#collapseTwo">Our Goals</a>
                        </div>
                        <div id="collapseTwo" class="collapse" data-parent="#accordion">
                            <div class="card-body">
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it
                                    to make a type specimen book.</p>
                            </div>
                        </div>
                    </div>
                    <div class="card shadow">
                        <div class="card-header">
                            <a class="collapsed card-link darkcolor" data-toggle="collapse" href="#collapseThree">Inspections & Occupancy </a>
                        </div>
                        <div id="collapseThree" class="collapse" data-parent="#accordion">
                            <div class="card-body">
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s. It has survived not only five centuries, but also the leap into
                                    electronic typesetting, remaining essentially unchanged.</p>
                            </div>
                        </div>
                    </div>
                    <div class="card shadow">
                        <div class="card-header">
                            <a class="collapsed card-link darkcolor" data-toggle="collapse" href="#collapseFour">Account & Security </a>
                        </div>
                        <div id="collapseFour" class="collapse" data-parent="#accordion">
                            <div class="card-body">
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</p>
                                <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going
                                    to use a passage of Lorem Ipsum,
                            </div>
                        </div>
                    </div>
                    <div class="card shadow">
                        <div class="card-header">
                            <a class="collapsed card-link darkcolor" data-toggle="collapse" href="#collapseFive">Privacy Policy </a>
                        </div>
                        <div id="collapseFive" class="collapse" data-parent="#accordion">
                            <div class="card-body">
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s randomised words which don't look even slightly believable. If
                                    you are going to use a passage of Lorem Ipsum, </p>
                            </div>
                        </div>
                    </div>
                    <div class="card shadow">
                        <div class="card-header">
                            <a class="collapsed card-link darkcolor" data-toggle="collapse" href="#collapseSix">Login & Dashboard </a>
                        </div>
                        <div id="collapseSix" class="collapse" data-parent="#accordion">
                            <div class="card-body">
                                <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going
                                    to use a passage of Lorem Ipsum, </p>
                            </div>
                        </div>
                    </div>
                    <div class="card shadow">
                        <div class="card-header">
                            <a class="collapsed card-link darkcolor" data-toggle="collapse" href="#collapseSeven">Payments & Orders </a>
                        </div>
                        <div id="collapseSeven" class="collapse" data-parent="#accordion">
                            <div class="card-body">
                                <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going
                                    to use a passage of Lorem Ipsum, </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


@endsection
