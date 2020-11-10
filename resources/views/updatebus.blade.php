@extends('layout.app')

@section('content')

    <!-- Contact US -->
    <section id="stayconnect1" class="whitebox position-relative padding noshadow">
        <div class="container whitebox shadow-lg">
            <div class="widget py-5 ">
                <div class="row">
                    <div class="col-md-12 text-center wow fadeIn mt-n3" data-wow-delay="300ms">
                        <h2 class="heading bottom30 darkcolor font-light2 pt-1"><span class="font-normal">Update This Bus</span>
                        </h2>
                    </div>
                    <div class="col-md-12 col-sm-12">
                        <div class="heading-title  wow fadeInUp" data-wow-delay="300ms">
                            <form class="getin_form wow fadeInUp" data-wow-delay="400ms" method="POST" action="{{ route('UpdateBusForm', $bus->id) }}">
                                @csrf
                                @method('PUT')
                                <div class="row px-2">
                                    <div class="col-md-12 col-sm-12" id="result1"></div>
                                    <div class="col-md-12 col-sm-12">
                                        <div class="form-group">
                                            <label for="name1" class="d-none"></label>
                                            <input class="form-control" id="name" value="{{ $bus->name }}" type="text" placeholder="Name:" required name="name">
                                        @error('name')
                                            <p style="color: red;" class="danger">{{ $message }}</p>
                                        @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-sm-12">
                                        <div class="form-group">
                                            <label for="email1" class="d-none"></label>
                                            <input class="form-control" type="text" value="{{ $bus->route }}" id="route" placeholder="Route:" name="route">
                                        @error('route')
                                            <p style="color: red;" class="danger">{{ $message }}</p>
                                        @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-sm-12">
                                        <div class="form-group">
                                            <label for="email1" class="d-none"></label>
                                            <input class="form-control" type="number" value="{{ $bus->rows }}" id="rows" placeholder="Rows:" name="rows">
                                        @error('rows')
                                            <p style="color: red;" class="danger">{{ $message }}</p>
                                        @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="email1" class="d-none"></label>
                                            <input class="form-control" type="date" id="date" value="{{ $bus->date }}" placeholder="Date:" name="date">
                                        @error('date')
                                            <p style="color: red;" class="danger">{{ $message }}</p>
                                        @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="email1" class="d-none"></label>
                                            <input class="form-control" type="time" id="time" value="{{ $bus->time }}" placeholder="Time:" name="time">
                                        @error('time')
                                            <p style="color: red;" class="danger">{{ $message }}</p>
                                        @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="email1" class="d-none"></label>
                                            <input class="form-control" type="text" id="from" value="{{ $bus->from }}" placeholder="From:" name="from">
                                        @error('from')
                                            <p style="color: red;" class="danger">{{ $message }}</p>
                                        @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="email1" class="d-none"></label>
                                            <input class="form-control" type="text" id="to" value="{{ $bus->to }}" placeholder="To:" name="to">
                                        @error('to')
                                            <p style="color: red;" class="danger">{{ $message }}</p>
                                        @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-sm-12">
                                        <div class="form-group">
                                            <label for="message1" class="d-none"></label>
                                            <textarea class="form-control" id="body" placeholder="Body:" required name="body">{{ $bus->body }}</textarea>
                                        @error('body')
                                            <p style="color: red;" class="danger">{{ $message }}</p>
                                        @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-sm-12">
                                        <button type="submit" id="submit_btn1" class="button btn-primary w-100">Update Bus</button>
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
