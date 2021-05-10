<div wire:ignore.self class="modal fade" id="search" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-body">
            <form action="{{ route('search', ['language'=>app()->getLocale()]) }}" method="GET">

                <div class="input-group">
                    <input wire:model="search" type="text" id="query" value="{{ request()->input('query') }}" class="form-control" placeholder="{{ __('Search Buses') }}" aria-label="Recipient's username" aria-describedby="basic-addon2" name="search">
                    <div class="input-group-append">
                    <button type="submit" class="btn btn-outline-secondary" type="button"><i class="fa fa-search"></i></button>
                    </div>
                </div>

            </form>
        </div>
        @if ($search!='')
        @foreach ($results as $result)
        <div class="modal-body">
            <div class="row ml-1">
                <a href="{{ route('ShowBus',['language' => app()->getLocale(), 'bus' => $result->id]) }}" class="overlay_center border_radius"><img width="50px" height="50px" src="{{ ('https://tikety.fra1.digitaloceanspaces.com/'.$result->image_url) }}" alt=""></a>
                <div class="ml-3">
                    <h4><a href="{{ route('ShowBus',['language' => app()->getLocale(), 'bus' => $result->id]) }}" class="overlay_center border_radius">{{ $result->name }}</a></h4>
                    <h5><a href="{{ route('ShowBus',['language' => app()->getLocale(), 'bus' => $result->id]) }}" class="overlay_center border_radius">{{ $result->platenumber }}</a></h5>
                </div>
            </div>
        </div>
        @endforeach
        @endif
        </div>
    </div>
</div>
