@extends('layout.standard_app')

@section('header_script')
    <x-recaptcha>updatebus</x-recaptcha>
@endsection

@section('content')

    <!-- Contact US -->
    <section id="stayconnect1" class="whitebox position-relative padding noshadow">
        <div class="container whitebox shadow-lg">
            <div class="widget py-5 ">
                <div class="row">
                    <div class="col-md-12 text-center wow fadeIn mt-n3" data-wow-delay="300ms">
                        <h2 class="heading bottom30 darkcolor font-light2 pt-1"><span class="font-normal">{{ __('Update This Bus') }}</span>
                        </h2>
                    </div>
                    <div class="col-md-12 col-sm-12">
                        <div class="heading-title  wow fadeInUp" data-wow-delay="300ms">
                            <form id="updatebus" class="getin_form wow fadeInUp" data-wow-delay="400ms" method="POST" action="{{ route('UpdateBusForm', ['language'=>app()->getLocale(), 'bus'=>$bus->id]) }}">
                                @csrf
                                @method('PUT')
                                <div class="row px-2">
                                    <div class="col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="name1" class="d-none"></label>
                                            <input class="form-control" id="name" type="text" placeholder="{{ __('Name Of the Bus:') }}" value="{{ $bus->name }}" required name="name">
                                        @error('name')
                                            <p style="color: red;">{{ $message }}</p>
                                        @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="name1" class="d-none"></label>
                                            <input class="form-control" id="image_url" type="file" placeholder="{{ __('Image of the Bus:') }}" required name="image_url">
                                        @error('image_url')
                                            <p style="color: red;">{{ $message }}</p>
                                        @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-4">
                                        <div class="form-group">
                                            <label for="name1" class="d-none"></label>
                                            <input class="form-control" id="name" type="text" placeholder="{{ __('Plate Number:') }}" value="{{ $bus->platenumber }}" required name="platenumber">
                                        @error('platenumber')
                                            <p style="color: red;">{{ $message }}</p>
                                        @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-4 col-sm-4">
                                        <div class="form-group">
                                            <input class="form-control" type="number" id="rows" placeholder="{{ __('Rows:') }}" value="{{ $bus->rows }}" name="rows">
                                        @error('rows')
                                            <p class="danger" style="color: red;">{{ $message }}</p>
                                        @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-4">
                                        <div class="form-group">
                                            <input class="form-control" type="number" id="amount" placeholder="{{ __('Amount:') }}" value="{{ $bus->amount }}" name="amount">
                                        @error('amount')
                                            <p class="danger" style="color: red;">{{ $message }}</p>
                                        @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <input class="form-control" type="date" id="date" placeholder="{{ __('Date:') }}" value="{{ $bus->date }}" name="date">
                                        @error('date')
                                            <p class="danger" style="color: red;">{{ $message }}</p>
                                        @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <input class="form-control" type="time" id="rows" placeholder="{{ __('Time:') }}" value="{{ $bus->time }}" name="time">
                                        @error('time')
                                            <p class="danger" style="color: red;">{{ $message }}</p>
                                        @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-4">
                                        <div class="form-group">
                                            <select name= "from" class="form-control">
                                                <option value="">{{ __('Select Region') }}</option>
                                                @foreach ($states as $state)

                                                <option>{{$state}}</option>

                                                @endforeach
                                            </select>
                                        @error('from')
                                            <p class="danger" style="color: red;">{{ $message }}</p>
                                        @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-4">
                                        <div class="form-group">
                                            <input class="form-control" type="text" id="route" placeholder="{{ __('Route:') }}" value="{{ $bus->route }}" name="route">
                                        @error('route')
                                            <p class="danger" style="color: red;">{{ $message }}</p>
                                        @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-4">
                                        <div class="form-group">
                                            <select name= "from" class="form-control">
                                                <option value="">{{ __('Select Region') }}</option>
                                                @foreach ($states as $state)

                                                <option>{{$state}}</option>

                                                @endforeach
                                            </select>
                                        @error('to')
                                            <p class="danger" style="color: red;">{{ $message }}</p>
                                        @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-4">
                                        <div class="form-group">
                                            <input class="form-control" type="tel" id="phonenumber" placeholder="{{ __('Phone Number:') }}" value="{{ $bus->phonenumber }}" name="phonenumber">
                                        @error('phonenumber')
                                            <p class="danger" style="color: red;">{{ $message }}</p>
                                        @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-4">
                                        <div class="form-group">
                                            <input class="form-control" type="text" id="address" placeholder="{{ __('Address:') }}" value="{{ $bus->address }}" name="address">
                                        @error('address')
                                            <p class="danger" style="color: red;">{{ $message }}</p>
                                        @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-4">
                                        <div class="form-group">
                                            <input class="form-control" type="text" id="workinghours" placeholder="{{ __('Working Hours:') }}" value="{{ $bus->workinghours }}" name="workinghours">
                                        @error('workinghours')
                                            <p class="danger" style="color: red;">{{ $message }}</p>
                                        @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-sm-12">
                                        <div class="form-group">
                                            <label for="message1" class="d-none"></label>
                                            <textarea class="form-control" id="body" placeholder="{{ __('Body:') }}" required name="body">{{ $bus->body }}</textarea>
                                        @error('body')
                                            <p class="danger" style="color: red;">{{ $message }}</p>
                                        @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-sm-12">
                                        <button type="submit" data-callback="onSubmit" data-sitekey="{{ config('services.recaptcha.key') }}" id="submit_btn1" class="g-recaptcha button btn-primary w-100">{{ __('Update Bus') }}</button>
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
