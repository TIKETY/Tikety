@extends('layout.standard_app')

@section('header_script')
<x-analytics></x-analytics>
@endsection

@section('content')
<!-- Services us -->
<section id="our-services" class="padding whitebox">
    <div class="container">
        <div class="row whitebox top15">
            <div class="col-lg-4 col-md-5 ">
                <div class="image widget bottom20 shadow"><img alt="SEO" @if (is_null($user->image_url))
                    src="{{ asset('image/tikety_user.png') }}" class="rounded"
                    @else src="{{ ('https://tikety.fra1.digitaloceanspaces.com/'.$user->image_url) }}" class="rounded-circle"
                @endif  >
                <div class="row">
                @if ($user->is(auth()->user()))
                <a href="{{ route('editprofileview', ['user'=>auth()->user(), 'language'=>app()->getLocale()]) }}" class="btn mt-3 mr-3 btn-primary button">{{ __('Edit') }}</a>
                <form action="{{ route('delete', ['id'=>$user->id, 'language'=>app()->getLocale()]) }}" method="post">
                    @csrf
                <button class="mt-3 mr-3 btn btn-danger button"  type="submit">{{ __('Delete') }}</button>
                </form>
                @else
                @auth
                @if ($user->user_has_bus())
                    <a href="" class="btn mt-3 btn-primary button">{{ __('Message') }}</a>
                @endif
                @endauth
                @endif
                @if (session('update_message'))
                    <div class="alert alert-success py-2 mt-3" role="alert">
                    {{ session('update_message') }}
                    </div>
                @endif
                </div>
                </div>
                <div class="widget shadow heading_space text-center text-md-left">
                    <h4 class="text-capitalize darkcolor bottom20">{{ __('Need Help?') }}</h4>
                    <div class="contact-table colorone d-table bottom15">
                        <div class="d-table-cell cells">
                            <span class="icon-cell"><i class="fas fa-mobile-alt"></i></span>
                        </div>
                        <div class="d-table-cell cells">
                            <p class="bottom0">{{ $user->phone_number }}</p>
                        </div>
                    </div>
                    <div class="contact-table colorone d-table bottom15 text-left">
                        <div class="d-table-cell cells">
                            <span class="icon-cell"><i class="fas fa-map-marker-alt"></i></span>
                        </div>
                        <div class="d-table-cell cells">
                            <p class="bottom0">130 Queens St.Tottenham Road,
                                <span class="d-block">Tokio Japan</span>
                            </p>
                        </div>
                    </div>
                    <div class="contact-table colorone d-table text-left">
                        <div class="d-table-cell cells">
                            <span class="icon-cell"><i class="far fa-clock"></i></span>
                        </div>
                        <div class="d-table-cell cells">
                            <p class="bottom0">Mon to Sat - 9:00am to 6:00pm
                                <span class="d-block">Sunday: Closed</span>
                            </p>
                        </div>
                    </div>
                    <a href="#." class="button btnsecondary gradient-btn top30"> Download Brochure</a>
                </div>
            </div>
            <div class="col-lg-8 col-md-7">
                <div class="col-md-12 wow fadeInUp" data-wow-delay="300ms">
                    <div class="tab-to-accordion heading_space">
                        <ul class="tabset-list">
                            <li class="active"><a href="#tab2">{{ __('Users Reservations') }}</a></li>
                        </ul>
                        <div class="tab-container">
                            <div id="tab2">
                                <table class="table table-striped">
                                    <tbody>
                                        <tr>
                                            <th>{{ __('Bus') }}</th>
                                            <th>{{ __('Amount Paid') }}</th>
                                            <th>{{ __('Seats Taken') }}</th>
                                            <th>{{ __('Depature Date') }}</th>
                                        </tr>
                                    @foreach ($histories as $history)
                                    <tr>
                                        <td>{{ $history->bus_name }}</td>
                                        <td>{{ $history->amount_paid }}</td>
                                        <td>{{ $history->seat}}</td>
                                        <td>{{ $history->depature_date}}</td>
                                    </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Services us ends -->
@endsection
