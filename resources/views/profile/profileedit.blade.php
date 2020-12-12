@extends('layout.standard_app')

@section('header_script')
    <x-recaptcha>
        editprofile
    </x-recaptcha>
@endsection

@section('content')
<!-- Services us -->
<section id="our-services" class="padding whitebox">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3 col-md-8 offset-md-2 col-sm-10 offset-sm-1 whitebox">
                <div class="widget logincontainer shadow-lg">
                    <h4 class="text-capitalize darkcolor bottom20">Edit your profile</h4>
                    <form id="editprofile" action="{{ route('editprofile', ['user'=>auth()->user(), 'language'=>app()->getLocale()]) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                            <div class="form-group mr-1">
                                <input class="form-control ml-3" style="width: 280px;" type="text" placeholder="Name:" required id="name" name="name">
                                <label for="first_name1" class="d-none"></label>
                                @error('name')
                                            <p style="color: red;">{{ $message }}</p>
                                        @enderror
                            </div>
                            <div class="form-group mr-1">
                                <input class="form-control ml-3" style="width: 280px;" type="file" placeholder="Profile Image:" required id="image_url" name="image_url">
                                @error('image_url')
                                            <p style="color: red;">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group mr-1">
                                <input class="form-control ml-3" style="width: 280px;" type="password" placeholder="Password:" required id="password" name="password">
                                <label for="first_name1" class="d-none"></label>
                                @error('password')
                                            <p style="color: red;">{{ $message }}</p>
                                        @enderror
                            </div>
                            <div class="form-group mr-1">
                                <input class="form-control ml-3" style="width: 280px;" type="password" placeholder="Confirm Password:" required id="password_confirmation" name="password_confirmation">
                                <label for="first_name1" class="d-none"></label>
                                @error('password_confirmation')
                                            <p style="color: red;">{{ $message }}</p>
                                        @enderror
                            </div>
                            <button data-callback="onSubmit" data-sitekey="{{ config('services.recaptcha.key') }}" class="g-recaptcha btn btn-primary mb-4 ml-3" type="submit">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Services us ends -->
@endsection
