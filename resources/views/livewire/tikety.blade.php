<div wire:ignore.self class="modal fade" id="tikety" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">{{ __('Buying Your Tikety') }}</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <input wire:model='seat' type="hidden" id="seatid" name="seatid">
        <div class="modal-body" style="align-self: center;">
            {!! QrCode::size(200)->generate($bus);  !!}
        </div>
        <div class="container">
            <div class="py-4 px-4 row">
                <div class="col">
                    <ul>
                        <li>{{ __('Bus name: ') }}{{ $bus->name }}</li>
                        <li>{{ __('Seat No: ').$seat }}</li>
                        <li>{{ __('From: ') }}{{ $bus->from }}</li>
                        <li>{{ __('To: ') }}{{ $bus->to }}</li>
                        <li>{{ __('Amount: ') }}{{ $bus->amount }}</li>
                        <li>{{ __('Date: ') }}{{ $bus->date }}</li>
                        <li>{{ __('Time: ') }}{{ $bus->time }}</li>
                        <li>{{ __('In: ') }}{{ $bus->timings->DiffForHumans() }}</li>
                    </ul>
                </div>
                <div class="container col">
                    <div class="row py-2">
                        <img width="80px" onclick="mobile('voda')"  src="https://tikety.fra1.digitaloceanspaces.com/patners/voda.png" alt="">
                        <input placeholder="{{ __('Mpesa Phone number') }}" id="voda" class="form-control mt-1" type="phone" style="display: block;">
                    </div>
                    <div class="row py-2">
                        <img width="80px" onclick="mobile('tigo')" src="https://tikety.fra1.digitaloceanspaces.com/patners/tigo.png" alt="">
                        <input placeholder="{{ __('Tigopesa Phone number') }}" id="tigo" class="form-control mt-1" type="phone" style="display: none;">
                    </div>
                    <div class="row py-2">
                        <img width="80px" onclick="mobile('airtel')" src="https://tikety.fra1.digitaloceanspaces.com/patners/airtel.png" alt="">
                        <input placeholder="{{ __('Airtel Money Phone number') }}" id="airtel" class="form-control mt-1" type="phone" style="display: none;">
                    </div>
                </div>
            </div>
            <button wire:click='buy_tikety' type="button" class="btn rounded-lg w-100 mb-4 mt-4 btn-primary" data-dismiss="modal">{{ __('Pay For Seat') }}</button>
        </div>
        {{-- <div class="modal-footer">
        </div> --}}
        </div>
    </div>
</div>
