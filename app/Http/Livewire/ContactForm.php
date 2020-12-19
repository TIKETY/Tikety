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
    public $g_recaptcha_response;

    public function contact_submit(){

        $cto = Founders::where('position', 'CTO')->first();

        $user = $this->validate([
            'name'=>'required',
            'email'=>'required|email',
            'body'=>'required|max:255',
            'g_recaptcha_response'=>['required', new RecaptchaRule]
        ]);

        Contact::create([
            'name'=>$user['name'],
            'email'=>$user['email'],
            'body'=>$user['body'],
        ]);

        // Mail::to('kearajab@gmail.com')->send(new ContactMail($user));

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
        return view('livewire.contact-form');
    }
}
