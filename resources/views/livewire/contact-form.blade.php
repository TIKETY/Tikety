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
                    <input wire:model.lazy="name" wire:errors="$errors" class="form-control @error('name') border border-danger @enderror" id="name" type="text" placeholder="{{ __('Name:') }}" required name="name">
                    @error('name')
                    <p style="color:red;">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="col-md-12 col-sm-12">
                <div class="form-group">
                    <label for="email1" class="d-none"></label>
                    <input wire:model.lazy="email" :errors="$error" class="form-control @error('email') border border-danger @enderror" type="email" id="email" placeholder="{{ __('Email:') }}" name="email">
                    @error('email')
                    <p style="color:red;">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="col-md-12 col-sm-12">
                <div class="form-group">
                    <label for="message1" class="d-none"></label>
                    <textarea wire:model.lazy="body" class="form-control" id="body" placeholder="{{ __('Message:') }}" required name="body"></textarea>
                    @error('body')
                    <p style="color:red;">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="col-md-12 col-sm-12">
            <button wire:loading type="submit" id="submit_btn1"
                data-callback="onSubmit"
                data-sitekey="{{ config('services.recaptcha.key') }}"
                class="g-recaptcha button btnsecondary gradient-btn">
                <div wire:target="contact_submit" wire:loading.class="spinner-border spinner-border-sm text-light align-items-center">
                    <span wire:target="contact_submit" wire:loading.class="sr-only"></span>
                </div>
                <span wire:loading.remove wire:target="contact_submit">{{ __('Submit') }}</span>
            </button>
            </div>
        </div>
    </form>
    <style>
        .button.btnsecondary.gradient-btn[disabled] {
            background-color: #98d1f2;
        }
    </style>
</div>
