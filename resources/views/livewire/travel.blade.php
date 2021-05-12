<div wire:ignore.self class="modal fade col-6-lg" id="travel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{ __('Traveling Today?') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12 col-sm-12" id="result"></div>
                        <div class="col-md-4 col-sm-6 py-1" >
                            <div class="form-group">
                                <select wire:model="from" name= "from" class="form-control">
                                    <option value="">{{ __('From') }}</option>
                                    @foreach ($states as $state)
                                    <option>{{$state}}</option>
                                    @endforeach
                                </select>
                                @error('from')
                                <p class="danger" style="color: red;">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6 py-1" >
                            <div class="form-group">
                                <select wire:model="to" name= "to" class="form-control">
                                    <option value="">{{ __('To') }}</option>
                                    @foreach ($states as $state)
                                    <option>{{$state}}</option>
                                    @endforeach
                                </select>
                                @error('to')
                                    <p class="danger" style="color: red;">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6" >
                            <button wire:click="travel" class="button btn-primary" data-dismiss="modal">{{ __('Submit') }}</button>
                        </div>
                    </div>
            </div>
            </div>
        </div>
</div>
