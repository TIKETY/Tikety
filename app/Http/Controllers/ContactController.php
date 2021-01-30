<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\NotifyUser;
use App\Models\Contact;
use App\Notifications\ContactNotification;
use App\Models\Bus;
use App\Models\User;
use App\Rules\RecaptchaRule;
use RealRashid\SweetAlert\Facades\Alert;

class ContactController extends Controller
{
    public function store($language, Request $request){
        $validated = $request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:contacts',
            'g-recaptcha-response'=>['required', new RecaptchaRule]
        ]);
        Contact::create([
            'name'=>$validated['name'],
            'email'=>$validated['email'],
        ]);

        return redirect()->back()->with('toast_success', trans('Contact Made successfully'));
    }

    public function contact($language, Request $request){
        $validated = $request->validate([
            'name'=>'required',
            'email'=>'required|email',
            'body'=>'required|max:255',
            'g-recaptcha-response'=>['required', new RecaptchaRule]
        ]);

        Contact::create([
            'name'=>$validated['name'],
            'email'=>$validated['email'],
            'body'=>$validated['body'],
        ]);

        $details = [
            'title' => 'Contact Made successful',
            'user' => $validated['name'],
            'user_email' => $validated['email'],
            'body' =>'Your Message was Received successfully'
        ];


        Mail::to($validated['email'])->send(new NotifyUser($details));

        $details2 = [
            'title' => 'Contact Made',
            'user' => $validated['name'],
            'user_email' => $validated['email'],
            'body' =>$validated['body']
        ];


        Mail::to('support@tikety.co.tz')->send(new NotifyUser($details2));

        return redirect()->route('home', app()->getLocale())->with('toast_success', trans('Contact Made successfully'));
    }

    public function contactbus($language, Bus $bus){

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
        return redirect()->back()->with('toast_success', trans('You have contacted this service Provider'));

    }
}
