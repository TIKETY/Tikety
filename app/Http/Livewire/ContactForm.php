<?php

namespace App\Http\Livewire;

use App\Mail\ContactMail;
use App\Models\Contact;
use App\Models\Founders;
use App\Rules\RecaptchaRule;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;


class ContactForm extends Component
{

    public $name;
    public $email;
    public $body;
    // public $g_recaptcha_response;

    protected $rules = [
        'name' => 'required|min:6',
        'email' => 'required|email',
        'body' => 'required|max:256',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function contact_submit(){

        $cto = Founders::where('position', 'CTO')->first();

        $validatedData = $this->validate();

        Contact::create($validatedData);

        sleep(2);

        Mail::to('kearajab@gmail.com')->send(new ContactMail($validatedData));

        $this->resetForm();

        session()->flash('message', trans('Contact made successfully'));
    }

    public function resetForm()
    {
        $this->name = '';
        $this->email = '';
        $this->body = '';
    }

    public function render()
    {
        $errors = $this->getErrorBag();

        return view('livewire.contact-form');
    }
}
