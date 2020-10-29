@extends('layouts.app')

@section('content')
    <!-- confirm password -->
    <section id="sign-in" class="whitebox position-relative padding">
        <div class="container">
            <div class="row">

                <div class="col-lg-6 offset-lg-3 col-md-8 offset-md-2 col-sm-10 offset-sm-1 whitebox">
                    <div class="widget logincontainer shadow text-center text-md-left">
                        <h3 class="darkcolor bottom35">Confirm Password </h3>
                        <form class="getin_form border-form" id="ResetPassword" method="POST" action="{{ route('password.confirm') }}">
                            @csrf
                            <div class="row">
                                <div class="col-md-12 col-sm-12">
                                    <div class="form-group bottom35">
                                        <label for="password" class="mb-3 pl-0">Confirm password before continuing</label>
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                </div>
                                <div class="col-sm-12 forget-buttons">
                                    <button type="submit" class="button btn-primary">Confirm Password</button>
                                    @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                    @endif
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- confirm password -->
@endsection
