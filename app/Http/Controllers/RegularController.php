<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PragmaRX\Countries\Package\Services\Countries;

class RegularController extends Controller
{

    public function contact(){
        return view('contact');
    }

    public function about(){
        return view('about');
    }

    public function faq(){
        return view('faq');
    }

    public function travel(){
        $countries = new Countries;
        $states = $countries->whereNameCommon('Tanzania')->first()->hydrateStates()->states->pluck('name', 'postal')->toArray();
        return view('travel', compact('states'));
    }

    public function phoneverified(){
        return view('phoneverified');
    }

    public function verification_code(){
        return view('verification_code');
    }

    public function verification_code_put(Request $request){
        $code = auth()->user()->verification_code;
        if($code === $request['verification_code']){
            auth()->user()->phone_register($request['phone_number']);
            auth()->user()->verify();
            return redirect()->route('role')->with('message_role', 'You have registered your number Successfully');
        } else{
            return redirect()->route('phoneverified')->with('phone_message','Oops, something is wrong');
        }
    }

    public function verification_code_resend(){
        auth()->user()->verifyphone(auth()->user()->phone_number);
        return redirect()->back()->with('number_message', 'The verification Code was resent');
    }
}
