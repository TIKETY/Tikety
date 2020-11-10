@extends('layout.app')

@section('content')

    <!-- Contact US -->
    <section id="stayconnect1" class="whitebox position-relative padding noshadow">
        <div class="container whitebox shadow-lg">
            <div class="widget py-5 ">
                <div class="row">
                    <div class="col-md-12 text-center wow fadeIn mt-n3" data-wow-delay="300ms">
                        <h2 class="heading bottom30 darkcolor font-light2 pt-1"><span class="font-normal">Create a Bus</span>
                        </h2>
                    </div>
                    <div class="col-md-12 col-sm-12">
                        <div class="heading-title  wow fadeInUp" data-wow-delay="300ms">
                            <form class="getin_form wow fadeInUp" data-wow-delay="400ms" method="POST" action="{{ route('CreateBusForm', auth()->user()) }}">
                                @csrf
                                <div class="row px-2">
                                    <div class="col-md-12 col-sm-12" id="result1"></div>
                                    <div class="col-md-12 col-sm-12">
                                        <div class="form-group">
                                            <label for="name1" class="d-none"></label>
                                            <input class="form-control" id="name" type="text" placeholder="Name:" required name="name">
                                        @error('name')
                                            <p style="color: red;">{{ $message }}</p>
                                        @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-sm-12">
                                        <div class="form-group">
                                            <label for="email1" class="d-none"></label>
                                            <input class="form-control" type="text" id="route" placeholder="Route:" name="route">
                                        @error('route')
                                            <p class="danger">{{ $message }}</p>
                                        @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-sm-12">
                                        <div class="form-group">
                                            <label for="email1" class="d-none"></label>
                                            <input class="form-control" type="number" id="rows" placeholder="Rows:" name="rows">
                                        @error('rows')
                                            <p class="danger">{{ $message }}</p>
                                        @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="email1" class="d-none"></label>
                                            <input class="form-control" type="date" id="date" placeholder="Date:" name="date">
                                        @error('date')
                                            <p class="danger">{{ $message }}</p>
                                        @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="email1" class="d-none"></label>
                                            <input class="form-control" type="time" id="rows" placeholder="Time:" name="time">
                                        @error('time')
                                            <p class="danger">{{ $message }}</p>
                                        @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="email1" class="d-none"></label>
                                            <input class="form-control" type="text" id="from" placeholder="From:" name="from">
                                        @error('from')
                                            <p class="danger">{{ $message }}</p>
                                        @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="email1" class="d-none"></label>
                                            <input class="form-control" type="text" id="to" placeholder="To:" name="to">
                                        @error('to')
                                            <p class="danger">{{ $message }}</p>
                                        @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-sm-12">
                                        <div class="form-group">
                                            <label for="message1" class="d-none"></label>
                                            <textarea class="form-control" id="body" placeholder="Body:" required name="body"></textarea>
                                        @error('body')
                                            <p class="danger">{{ $message }}</p>
                                        @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-sm-12">
                                        <button type="submit" id="submit_btn1" class="button btn-primary w-100">Create Bus</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Contact US ends -->

@endsection
