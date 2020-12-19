@extends('layout.standard_app')

@section('header_script')
    <x-recaptcha>
        travel
    </x-recaptcha>
@endsection

@section('content')
{{-- traveling query --}}
<section id="stayconnect" class="whitebox mb-5 mt-5 p-md-4 position-relative">
    <div class="container">
        <div class="contactus-wrapp shadow-lg">
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="heading-title wow fadeInUp text-center text-md-left" data-wow-delay="300ms">
                        <h3 class="darkcolor bottom20">{{ __('Tell us a little...') }}</h3>
                    </div>
                </div>
                <div class="col-md-12 col-sm-12">
                    <form id="travel" class="wow fadeInUp" method="POST" action="{{ route('TravelForm', app()->getLocale()) }}">
                        @csrf
                        <div class="row">
                            <div class="col-md-12 col-sm-12" id="result"></div>
                            <div class="col-md-3 col-sm-6">
                                <div class="form-group">
                                    <select name= "from" class="form-control">
                                        <option value="">{{ __('From') }}</option>
                                        @foreach ($states as $state)

                                        <option>{{$state}}</option>

                                        @endforeach
                                    </select>
                                    @error('from')
                                    <p class="danger" style="color: red;">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6">
                                <div class="form-group">
                                    <select name= "to" class="form-control">
                                        <option value="">{{ __('To') }}</option>
                                        @foreach ($states as $state)

                                        <option>{{$state}}</option>

                                        @endforeach
                                    </select>
                                    @error('to')
                                        <p class="danger" style="color: red;">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6">
                                <button data-callback="onSubmit" data-sitekey="{{ config('services.recaptcha.key') }}" type="submit" class="button btn-primary w-100" id="submit">{{ __('Submit') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
{{-- traveling query --}}
@endsection
