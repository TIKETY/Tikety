@extends('layout.app')

@section('content')
{{-- traveling query --}}
<section id="stayconnect" class="whitebox mb-5 mt-5 p-md-4 position-relative">
    <div class="container">
        <div class="contactus-wrapp shadow-lg">
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="heading-title wow fadeInUp text-center text-md-left" data-wow-delay="300ms">
                        <h3 class="darkcolor bottom20">Tell us a little...</h3>
                    </div>
                </div>
                <div class="col-md-12 col-sm-12">
                    <form class="wow fadeInUp" method="POST" action="{{ route('TravelForm') }}">
                        @csrf
                        <div class="row">
                            <div class="col-md-12 col-sm-12" id="result"></div>
                            <div class="col-md-3 col-sm-6">
                                <div class="form-group">
                                    <input class="form-control" type="text" placeholder="From:" required id="from" name="from">
                                    @error('from')
                                    <p class="danger" style="color: red;">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6">
                                <div class="form-group">
                                    <input class="form-control" type="text" placeholder="To:" required id="to" name="to">
                                    @error('to')
                                        <p class="danger" style="color: red;">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6">
                                <button type="submit" class="button btn-primary w-100" id="submit">Submit</button>
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
