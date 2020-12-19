<div>
    @if (session('message'))
                    <div class="alert alert-success" role="alert">
                    {{ session('message') }}
                    </div>
    @endif
    <form wire:submit.prevent="contact_submit" id="contact" class="getin_form wow fadeInUp" data-wow-delay="400ms" method="POST">
        @csrf
        <div class="row px-2">
            <div class="col-md-12 col-sm-12" id="result1"></div>
            <div class="col-md-12 col-sm-12">
                <div class="form-group">
                    <label for="name1" class="d-none"></label>
                    <input wire:model.lazy="name" class="form-control" id="name" type="text" placeholder="{{ __('Name:') }}" required name="name">
                    @error('name')
                    <p class="danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="col-md-12 col-sm-12">
                <div class="form-group">
                    <label for="email1" class="d-none"></label>
                    <input wire:model.lazy="email" class="form-control" type="email" id="email" placeholder="{{ __('Email:') }}" name="email">
                    @error('email')
                    <p class="danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="col-md-12 col-sm-12">
                <div class="form-group">
                    <label for="message1" class="d-none"></label>
                    <textarea wire:model.lazy="body" class="form-control" id="body" placeholder="{{ __('Message:') }}" required name="body"></textarea>
                    @error('body')
                    <p class="danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="col-md-12 col-sm-12">
                <button type="submit" id="submit_btn1"
                data-callback="onSubmit"
                data-sitekey="{{ config('services.recaptcha.key') }}"
                class="g-recaptcha button btn-primary w-100">{{ __('Submit') }}</button>
            </div>
        </div>
    </form>
</div>
