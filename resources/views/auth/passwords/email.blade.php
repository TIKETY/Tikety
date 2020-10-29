@extends('layout.app')

@section('content')
<!-- reset password -->
    <section id="sign-in" class="bglight position-relative padding">
        <div class="container">
            <div class="row">

                <div class="col-lg-6 offset-lg-3 col-md-8 offset-md-2 col-sm-10 offset-sm-1 whitebox">
                    <div class="widget logincontainer shadow text-center text-md-left">
                        <h3 class="darkcolor bottom35">Reset Password </h3>
                        @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                        @endif
                        <form class="getin_form border-form" id="ResetPassword" method="POST" action="{{ route('password.email') }}">
                            <div class="row">
                                <div class="col-md-12 col-sm-12">
                                    <div class="form-group bottom35">
                                        <label for="loginEmail" class="mb-3 pl-0">Please enter Email or Username you remember!</label>
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                    </div>
                                </div>
                                <div class="col-sm-12 forget-buttons">
                                    <button type="submit" class="button btn-primary">Reset</button>
                                    <button type="button" class="button btn-dark ml-2">Cancel</button>
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
