<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\UserEvent;
use App\Models\Founders;
use App\Rules\RecaptchaRule;
use App\Models\User;
use App\Models\Contact;
use App\Models\Bus;
use App\Models\Event;
use PragmaRX\Countries\Package\Services\Countries;

class RegularController extends Controller
{
    public function search($language, Request $request){
        $buses = Bus::query()
                ->where('name', 'LIKE', "%{$request->input('name')}%")->latest()->paginate(10);
        return view('bus.search', compact('buses'));
    }

    public function soon(){
        $date = Event::where('title', 'Applications')->first()->time;
        return view('misc.soon', [
            'date'=>$date
        ]);
    }

    public function prevent(){
        return abort(403);
    }

    public function broadcast(){
        return view('misc.broadcaster');
    }

    public function broadcast_event($language, Request $request){
        $validated = $request->validate([
            'title'=>'required',
            'body'=>'required',
            'link'=>'required',
            'g-recaptcha-response'=>['required', new RecaptchaRule]
        ]);

        $event = Event::create([
            'title'=>$validated['title'],
            'body'=>$validated['body'],
            'link'=>$validated['link'],
            'time'=>NOW(),
        ]);

        event(new UserEvent($event));

        return redirect()->back()->with('success', 'Message Broadcasted successfully');
    }

    public function event($language, $event_id){
        $event = Event::where('id', $event_id)->first();
        $event->seen(auth()->user());
        return redirect()->route($event->link, ['language'=>app()->getLocale()]);
    }

    public function soon_create($language, Request $request){
        $validated = $request->validate([
            'title'=>'required',
            'email'=>'email',
            'g-recaptcha-response'=>['required', new RecaptchaRule]
        ]);

        Contact::create([
            'name'=>$validated['title'],
            'email'=>$validated['email'],
        ]);

        return redirect()->back()->with('success', trans('You have successfully Subscribed'));
    }

    public function terms(){
        return view('misc.terms');
    }

    public function contact(){
        return view('misc.contact');
    }

    public function about(){
        $founders = Founders::latest()->get();
        // dd($founders);
        return view('misc.about', compact('founders'));
    }

    public function faq(){
        return view('misc.faq');
    }

    public function travel(){
        $countries = new Countries;
        $states = $countries->whereNameCommon('Tanzania')->first()->hydrateStates()->states->pluck('name', 'postal')->toArray();
        return view('travel.travel', compact('states'));
    }

    public function verification_code(){
        return view('registration.verification_code');
    }

    public function verification_code_put($language, Request $request){
        $code = auth()->user()->verification_code;
        $validated = $request->validate([
            'verification_code'=>'max:30',
            'g-recaptcha-response'=>['required', new RecaptchaRule]
        ]);

        if($code === $validated['verification_code']){
            auth()->user()->phone_register($request['phone_number']);
            auth()->user()->verify();
            return redirect()->route('role', app()->getLocale())->with('message_role', trans('You have registered your number Successfully'));
        } else{
            return redirect()->back()->with('error',trans('Oops, something is wrong'));
        }
    }

    public function verification_code_resend(){
        auth()->user()->verifyphone(auth()->user()->phone_number);
        return redirect()->route('verification_code', app()->getLocale())->with('number_message', trans('The verification Code was resent'));
    }

    public function forgot_password(){
        return view('auth.passwords.phone');
    }

    public function privacy(){
        return view('misc.privacy');
    }

    public function verification($language, User $user){
        return view('auth.verify', compact('user'));
    }

    public function pricing(){
        return view('registration.price');
    }

    public function events(){
        $event= Event::all()->pluck('id');
        $event_t=[];

        for($i = 1; $i < count($event)+1; $i++){
            $events=Event::where('id', $i)->first();
            if($events->user()->where('user_id', auth()->user()->id)->where('event_id', $i)->exists()){
            array_push($event_t, $i);
            }
        }

        return Event::whereNotIn('id', $event_t)->get();
    }
}
