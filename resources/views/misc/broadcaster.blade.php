@extends('layout.standard_app')

@section('header_script')
    <x-recaptcha>
        broadcast
    </x-recaptcha>
    <x-analytics></x-analytics>
@endsection

@section('content')
<!-- Services us -->
<section id="our-services" class="padding whitebox">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3 col-md-8 offset-md-2 col-sm-10 offset-sm-1 whitebox">
                <div class="widget logincontainer shadow-lg">
                    <h4 class="text-capitalize darkcolor bottom20">{{ __('Broadcast Event') }}</h4>
                    <form id="broadcast" action="{{ route('broadcast_event', ['language'=>app()->getLocale()]) }}" method="POST">
                        @csrf
                            <div class="form-group mr-1">
                                <input class="form-control ml-3" style="width: 280px;" type="text" placeholder="{{ __('Title:') }}" required id="name" name="title">
                                <label for="first_name1" class="d-none"></label>
                                @error('title')
                                        <p style="color: red;">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group mr-1">
                                <input class="form-control ml-3" style="width: 280px;" type="text" placeholder="{{ __('Body:') }}" required id="name" name="body">
                                <label for="first_name1" class="d-none"></label>
                                @error('name')
                                        <p style="color: red;">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group mr-1">
                                <input class="form-control ml-3" style="width: 280px;" type="text" placeholder="{{ __('Link:') }}" required id="name" name="link">
                                <label for="first_name1" class="d-none"></label>
                                @error('link')
                                        <p style="color: red;">{{ $message }}</p>
                                @enderror
                            </div>
                            <button data-callback="onSubmit" data-sitekey="{{ config('services.recaptcha.key') }}" class="g-recaptcha btn btn-primary mb-4 ml-3" type="submit">{{ __('Broadcast')}}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Services us ends -->
@endsection
