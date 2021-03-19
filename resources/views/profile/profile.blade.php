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
                <button class="btn btn-danger mt-4 mr-3 button" data-toggle="modal" data-target="#delete">{{ __('Delete Account') }}</button>
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

    <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{ __('Delete Account') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                {{ __('Are you Sure you want to delete this account?') }}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('Cancel') }}</button>
                <form action="{{ route('delete', ['id'=>$user->id, 'language'=>app()->getLocale()]) }}" method="post">
                    @csrf
                <button class="btn btn-danger"  type="submit">{{ __('Delete') }}</button>
                </form>
            </div>
            </div>
        </div>
    </div>
</section>
<!-- Services us ends -->
@endsection
