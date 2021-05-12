<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Contact as Cont;
use Illuminate\Support\Facades\Mail;
use App\Mail\NotifyUser;


class Contact extends Component
{
    public $name;
    public $body;
    public $email;

    public $rules=[
            'name'=>'required|min:2',
            'email'=>'required|email',
            'body'=>'required|max:255',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function contact(){


        Cont::create([
            'name'=>$this->name,
            'email'=>$this->email,
        ]);

        $this->empty();

        session()->flash('success', trans('Contact Made successfully'));
    }


    public function empty(){
        $this->name='';
        $this->email='';
        $this->body='';
    }

    public function render()
    {
        return view('livewire.contact');
    }
}
