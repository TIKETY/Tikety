@extends('layout.app')

@section('content')
<!-- reset password -->
    <section id="sign-in" class="whitebox position-relative padding">
        <div class="container">
            <div class="row">

                <div class="col-lg-6 offset-lg-3 col-md-8 offset-md-2 col-sm-10 offset-sm-1 whitebox">
                    <div class="widget logincontainer shadow text-center text-md-left">
                        <h3 class="darkcolor bottom35">Phone Number</h3>
                        @if (session('status'))
                        <div class="alert alert-danger" role="alert">
                            {{ session('status') }}
                        </div>
                        @endif
                        <form class="getin_form border-form" id="ResetPassword" method="POST" action="{{ route('phoneverified') }}">
                            @csrf
                            <div class="row">
                                <div class="col-md-12 col-sm-12">
                                    <div class="form-group bottom35">
                                        <label for="loginphone_number" class="mb-3 pl-0">Please enter phone number for Verification</label>
                                        <input id="phone_number" type="phone_number" class="form-control @error('phone_number') is-invalid @enderror" name="phone_number" value="+255" required autocomplete="phone_number" autofocus>

                                @error('phone_number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                    </div>
                                </div>
                                <div class="col-sm-12 forget-buttons">
                                    <button type="submit" class="button btn-primary mr-4">Submit</button>
                                    <a href="{{ redirect()->back() }}" class="mr-4">Cancel</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- sign-in ends -->
@endsection
