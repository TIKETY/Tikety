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
                                    <div class="col-md-12 col-sm-12">
                                        <div class="form-group">
                                            <label for="name1" class="d-none"></label>
                                            <input class="form-control" id="name" type="text" placeholder="Name Of the Bus:" value="{{ $bus->name }}" required name="name">
                                        @error('name')
                                            <p style="color: red;">{{ $message }}</p>
                                        @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-sm-12">
                                        <div class="form-group">
                                            <label for="name1" class="d-none"></label>
                                            <input class="form-control" id="name" type="text" placeholder="Plate Number:" value="{{ $bus->platenumber }}" required name="platenumber">
                                        @error('name')
                                            <p style="color: red;">{{ $message }}</p>
                                        @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-12 col-sm-12">
                                        <div class="form-group">
                                            <input class="form-control" type="number" id="rows" placeholder="Rows:" value="{{ $bus->rows }}" name="rows">
                                        @error('rows')
                                            <p class="danger">{{ $message }}</p>
                                        @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-sm-12">
                                        <div class="form-group">
                                            <input class="form-control" type="number" id="amount" placeholder="Amount:" value="{{ $bus->amount }}" name="amount">
                                        @error('amount')
                                            <p class="danger">{{ $message }}</p>
                                        @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <input class="form-control" type="date" id="date" placeholder="Date:" value="{{ $bus->date }}" name="date">
                                        @error('date')
                                            <p class="danger">{{ $message }}</p>
                                        @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <input class="form-control" type="time" id="rows" placeholder="Time:" value="{{ $bus->time }}" name="time">
                                        @error('time')
                                            <p class="danger">{{ $message }}</p>
                                        @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-4">
                                        <div class="form-group">
                                            <input class="form-control" type="text" id="from" placeholder="From:" value="{{ $bus->from }}" name="from">
                                        @error('from')
                                            <p class="danger">{{ $message }}</p>
                                        @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-4">
                                        <div class="form-group">
                                            <input class="form-control" type="text" id="route" placeholder="Route:" value="{{ $bus->route }}" name="route">
                                        @error('route')
                                            <p class="danger">{{ $message }}</p>
                                        @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-4">
                                        <div class="form-group">
                                            <input class="form-control" type="text" id="to" placeholder="To:" value="{{ $bus->to }}" name="to">
                                        @error('to')
                                            <p class="danger">{{ $message }}</p>
                                        @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-4">
                                        <div class="form-group">
                                            <input class="form-control" type="tel" id="phonenumber" placeholder="Phone Number:" value="{{ $bus->phonenumber }}" name="phonenumber">
                                        @error('phonenumber')
                                            <p class="danger">{{ $message }}</p>
                                        @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-4">
                                        <div class="form-group">
                                            <input class="form-control" type="text" id="address" placeholder="Address:" value="{{ $bus->address }}" name="address">
                                        @error('address')
                                            <p class="danger">{{ $message }}</p>
                                        @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-4">
                                        <div class="form-group">
                                            <input class="form-control" type="text" id="workinghours" placeholder="Working Hours:" value="{{ $bus->workinghours }}" name="workinghours">
                                        @error('workinghours')
                                            <p class="danger">{{ $message }}</p>
                                        @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-sm-12">
                                        <div class="form-group">
                                            <label for="message1" class="d-none"></label>
                                            <textarea class="form-control" id="body" placeholder="Body:" required name="body">{{ $bus->body }}</textarea>
                                        @error('body')
                                            <p class="danger">{{ $message }}</p>
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
