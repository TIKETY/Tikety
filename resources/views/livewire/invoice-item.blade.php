<div>
    <div class="table-responsive">
        @if (session('success_message'))
            <div class="alert alert-success mt-3" role="alert">
            {{ session('success_message') }}
            </div>
        @endif
        <table class="table table-bordered">
            <thead>
            <tr>
                <th class="darkcolor">{{ __('Seat No:')}}</th>
                <th class="darkcolor ">{{ __('Amount:') }}</th>
                <th class="darkcolor">{{ __('Quantity') }}</th>
                <th class="darkcolor">{{ __('Total') }}</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach ($seats as $seat)
            <tr>
                <td>
                <div class="d-table">
                    <div class="d-block d-lg-table-cell">
                        <h4 class="darkcolor product-name"><a href="shop-detail.html">{{ $seat }}</a></h4>
                        <p>{{ $bus->name }}</p>
                    </div>
                </div>
                </td>
                <td>
                <h4 class="default-color text-center">{{ $bus->amount }}</h4>
            </td>
            <td class="text-center">
                <div class="quote text-center">
                    <label for="quantity1" class="d-none"></label>
                    <input type="text" placeholder="1" class="quote" disabled id="quantity1">
                </div>
                </td>
                <td>
                <h4 class="darkcolor text-center">TZS {{ $bus->amount }}</h4>
                </td>
                <td class="text-center">
                        <button wire:click="remove({{ $seat }})" class="btn-close fas fa-times"></button>
                </td>
            </tr>
            @endforeach
            <tr>
                <td>
                <div class="d-table">
                    <div class="d-block d-lg-table-cell">
                        <h4 class="darkcolor product-name">{{ __('Total') }}</h4>
                    </div>
                </div>
                </td>
                <td>
                <h4 class="default-color text-center"></h4>
            </td>
            <td class="text-center">
                <div class="quote text-center">
                    <label for="quantity1" class="d-none"></label>
                    <input type="text" placeholder="{{ count($seats) }}" class="quote" disabled id="quantity1">
                </div>
                </td>
                <td>
                <h4 class="darkcolor text-center">TZS {{ count($seats)*$bus->amount }}</h4>
                </td>
                <td class="text-center">
                </td>
            </tr>
        </tbody>
        </table>
    </div>
</div>

