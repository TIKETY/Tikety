<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\NotifyUser;
use App\Models\Contact;
use App\Notifications\ContactNotification;
use App\Models\Bus;
use App\Models\User;

class ContactController extends Controller
{
    public function store(Request $request){
        $validated = $request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:contacts',
        ]);
        Contact::create([
            'name'=>$validated['name'],
            'email'=>$validated['email'],
        ]);

        return redirect()->route('home')->with('message_connected', 'You are Connected');
    }

    public function contact(Request $request){
        $validated = $request->validate([
            'name'=>'required',
            'email'=>'required|email',
            'body'=>'required|max:255',
        ]);
        Contact::create([
            'name'=>$validated['name'],
            'email'=>$validated['email'],
            'body'=>$validated['body'],
        ]);

        return redirect()->route('home');
    }

    public function contactbus(Bus $bus){

        $user = User::find($bus->user_id);

        $validated = request()->validate([
            'name'=>'string',
            'email'=>'email|unique:contacts',
            'body'=>'string',
        ]);

        $details = [
            'title' => 'Consultation Needed',
            'user' => $validated['name'],
            'user_email' => $validated['email'],
            'body' =>$validated['body']
        ];


        Mail::to($user->email)->send(new NotifyUser($details));

        return redirect()->route('ShowBus', $bus)->with('message', 'You have contacted this service provider');

    }
}
