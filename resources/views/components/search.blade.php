<div class="modal fade" id="search" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-body">
            <div class="container input-group input-group">
                <form action="{{ route('search', ['language'=>app()->getLocale()]) }}" method="GET">
                    <input type="text" id="query" value="{{ request()->input('query') }}" class="form-control border-0 mt-1" placeholder="{{ __('Search Buses') }}" name="name">
                    <button class="btn btn-outline-secondary" type="button"><i class="fa fa-search align-middle input-group-text mt-2 mb-1 mr-2"></i></button>
                </form>
            </div>
        </div>
        </div>
    </div>
</div>
