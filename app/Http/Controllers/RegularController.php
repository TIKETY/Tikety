<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Founders;
use App\Models\User;
use PragmaRX\Countries\Package\Services\Countries;

class RegularController extends Controller
{

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

    public function verification_code_put(Request $request){
        $code = auth()->user()->verification_code;
        if($code === $request['verification_code']){
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

    public function test(){
        return view('test');
    }
}
