@extends('layout.app')

@section('content')

<section id="aboutus" class="padding_top padding_bottom">
    <div class="container align-items-center">
        @if (session('message_role'))
                    <div class="alert alert-success" role="alert">
                    {{ session('message_role') }}
                    </div>
        @endif
        <h1 class="darkcolor font-normal m-auto">One more thing...</h1>
        <div class="row align-items-center">
            <div class="col-lg-4  col-md-6 padding_top_half text-center text-md-left">
                <h2 class="darkcolor font-normal bottom30">Do You Own a<span class="defaultcolor">Fleet?</span> </h2>
                <p class="bottom35">Manage your assets from anywhere by creating an acount with the role of a Master</p>
                <form action="{{ route('makerole', ['role'=>'master', 'language'=>app()->getLocale()]) }}" method="POST">
                @csrf
                    <button type="submit" class="btn-primary btn">Become Master</button>
                </form>
            </div>
            <div class="col-lg-4  col-md-6 padding_top_half text-center text-md-left">
                <h2 class="darkcolor font-normal bottom30">Are you a<span class="defaultcolor">Manager?</span></h2>
                <p class="bottom35">Become the Manager of your assets easier by being able to control your asset with ease on your fingertips</p>
                <form action="{{ route('makerole', ['role'=>'manager', 'language'=>app()->getLocale()]) }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-primary">Become Manager</button>
                </form>
            </div>
            <div class="col-lg-4  col-md-6 padding_top_half text-center text-md-left">
                <h2 class="darkcolor font-normal bottom30">I'm here for<span class="defaultcolor">Tickets?</span></h2>
                <p class="bottom35">Enjoy the services offered by different Companies within this tiketying platform</p>
                <form action="{{ route('makerole', ['role'=>'user', 'language'=>app()->getLocale()]) }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-primary">Use Tikety</button>
                </form>
            </div>
        </div>
        @can('Have_Multiple_Bus', Role::class)
        <a href="{{ route('multiplebus', app()->getLocale()) }}" class="btn btn-primary">Testing button for the Master</a>
        @endcan
    </div>
</section>
<!-- About us ends -->

@endsection
