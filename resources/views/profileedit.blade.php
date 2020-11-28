@extends('layout.app')

@section('content')
<!-- Services us -->
<section id="our-services" class="padding whitebox">
    <div class="container">
        <div class="row whitebox top15">
            <div class="col-lg-12 col-md-12 ">
                <div class="widget shadow heading_space text-center text-md-left">
                    <h4 class="text-capitalize darkcolor bottom20">Edit your profile</h4>
                    <form action="{{ route('editprofile', auth()->user()) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                            <div class="form-group mr-1">
                                <input class="form-control ml-3" style="width: 280px;" type="text" placeholder="Name:" required id="name" name="name">
                                <label for="first_name1" class="d-none"></label>
                                @error('name')
                                            <p style="color: red;">{{ $message }}</p>
                                        @enderror
                            </div>
                            <div class="form-group ml-2">
                                <div class="row">
                                <input class="form-control ml-3" style="width: 280px;" type="file" placeholder="Profile Image:" required id="image_url" name="image_url">
                                <img src="{{ asset('storage/'.$user->image_url) }}" alt="user profile image" width="100px" height="100px">
                                </div>
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
                            <button class="btn btn-primary mb-4 ml-3" type="submit">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Services us ends -->
@endsection
