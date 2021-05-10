<div>
    {{-- <form method="POST">
        @csrf
        @method('PUT') --}}
        <div class="row">
            <div class="form-group mr-1">
                <input wire:model="seat" class="form-control ml-3" style="width: 200px;" type="text" placeholder="{{ __('Seat No:') }}" required id="seat" name="seat">
                <label for="first_name1" class="d-none"></label>
            </div>
            <button wire:click="revoke" class="btn btn-primary mb-4" type="submit">{{ __('Revoke') }}</button>
        </div>
    {{-- </form> --}}
</div>
