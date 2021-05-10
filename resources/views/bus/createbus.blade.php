@extends('layout.standard_app')

@section('header_script')
    <x-recaptcha>
        buscreate
    </x-recaptcha>
    <x-analytics></x-analytics>
@endsection

@section('content')

    <!-- Contact US -->
    <section id="stayconnect1" class="whitebox position-relative padding noshadow">
        <div class="container whitebox shadow-lg">
            <div class="widget py-5 ">
                <div class="row">
                    <div class="col-md-12 text-center wow fadeIn mt-n3" data-wow-delay="300ms">
                        <h2 class="heading bottom30 darkcolor font-light2 pt-1"><span class="font-normal">{{ __('Create a Bus') }}</span>
                        </h2>
                    </div>
                    <div class="col-md-12 col-sm-12">
                        <div class="heading-title  wow fadeInUp" data-wow-delay="300ms">
                            <form id="buscreate" class="getin_form wow fadeInUp" enctype="multipart/form-data" data-wow-delay="400ms" method="POST" action="{{ route('CreateBusForm', ['language'=>app()->getLocale(), 'user'=>auth()->user()]) }}">
                                @csrf
                                <div class="row px-2">
                                    <div class="col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="name1" class="d-none"></label>
                                            <input class="form-control" id="name" type="text" placeholder="{{ __('Name Of the Bus:') }}" required name="name">
                                        @error('name')
                                            <p style="color: red;">{{ $message }}</p>
                                        @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="name1" class="d-none"></label>
                                            <input class="form-control" id="image_url" type="file" placeholder="{{ __('Image of the Bus:') }}" name="image_url">
                                        @error('image_url')
                                            <p style="color: red;">{{ $message }}</p>
                                        @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="name1" class="d-none"></label>
                                            <input class="form-control" id="name" type="text" placeholder="{{ __('Plate Number:') }}" required name="platenumber">
                                        @error('platenumber')
                                            <p style="color: red;">{{ $message }}</p>
                                        @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <input class="form-control" type="number" id="rows" placeholder="{{ __('Rows:') }}" name="rows">
                                        @error('rows')
                                            <p style="color: red;">{{ $message }}</p>
                                        @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-4">
                                        <div class="form-group">
                                            <input class="form-control" type="number" id="amount" placeholder="{{ __('Amount:') }}" name="amount">
                                        @error('amount')
                                            <p style="color: red;">{{ $message }}</p>
                                        @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-4">
                                        <div class="form-group">
                                            <input class="form-control" type="date" id="date" placeholder="{{ __('Date:') }}" name="date">
                                        @error('date')
                                            <p style="color: red;">{{ $message }}</p>
                                        @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-4">
                                        <div class="form-group">
                                            <input class="form-control" type="time" id="rows" placeholder="{{ __('Time:') }}" name="time">
                                        @error('time')
                                            <p style="color: red;">{{ $message }}</p>
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
                                            <p style="color: red;">{{ $message }}</p>
                                        @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-4">
                                        <div class="form-group">
                                            <input class="form-control" type="text" id="route" placeholder="{{ __('Route:') }}" name="route">
                                        @error('route')
                                            <p style="color: red;">{{ $message }}</p>
                                        @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-4">
                                        <div class="form-group">
                                            <select name= "to" class="form-control">
                                                <option value="">{{ __('Select Region') }}</option>
                                                @foreach ($states as $state)

                                                <option>{{$state}}</option>

                                                @endforeach
                                            </select>
                                        @error('to')
                                            <p style="color: red;">{{ $message }}</p>
                                        @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-4">
                                        <div class="form-group">
                                            <input class="form-control" type="text" id="address" placeholder="{{ __('Address:') }}" name="address">
                                        @error('address')
                                            <p style="color: red;">{{ $message }}</p>
                                        @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-4">
                                        <div class="form-group">
                                            <input class="form-control" type="text" id="workinghours" placeholder="{{ __('Working Hours:') }}" name="workinghours">
                                        @error('workinghours')
                                            <p style="color: red;">{{ $message }}</p>
                                        @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-sm-12">
                                        <div class="form-group">
                                            <label for="message1" class="d-none"></label>
                                            <textarea class="form-control" id="body" placeholder="{{ __('Body:') }}" required name="body"></textarea>
                                        @error('body')
                                            <p style="color: red;">{{ $message }}</p>
                                        @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-sm-12">
                                        <div class="form-group bottom30 ml-1">
                                            <div class="form-check text-left">
                                                <input class="form-check-input" name="Terms" type="checkbox" {{ old('Terms') ? '1' : '0' }} id="TermsOfUse">
                                            <label class="form-check-label" for="TermsOfUse">
                                                {{ __('I accept ') }}<a target="_blank" style="color: #006dbf" href="">{{ __('Terms of Use') }}</a>{{ __(' and ') }}<a target="_blank" style="color: #006dbf" href="{{ route('privacy',['language'=>app()->getLocale()]) }}">{{ __('Privacy Policy') }}</a>
                                            </label>
                                            </div>
                                            @error('Terms')
                                            <p style="color: red;">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-sm-12">
                                        <button type="submit" id="submit_btn1" data-callback="onSubmit" data-sitekey="{{ config('services.recaptcha.key') }}" class="g-recaptcha button btn-primary w-100">{{ __('Create Bus') }}</button>
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
