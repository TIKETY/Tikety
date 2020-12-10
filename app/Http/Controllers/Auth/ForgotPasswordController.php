<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Twilio\Rest\Client;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    // use SendsPasswordResetEmails;

    public function forgot_password(){
        if(!User::where('phone_number', request()->input('phone_number'))->exists()){
            abort(422);
        }
        $user_id= User::where('phone_number', request()->input('phone_number'))->get()->pluck('id');
        $user = User::find($user_id)->pluck('phone_number');
        $token = Str::random(60);
        User::find($user_id)->first()->forceFill([
            'token' => $token
          ])->save();

        $account_sid = getenv("TWILIO_SID");
        $auth_token = getenv("TWILIO_AUTH_TOKEN");
        $twilio_number = getenv("TWILIO_NUMBER");
        $client = new Client($account_sid, $auth_token);
        $client->messages->create($user,
        ['from' => $twilio_number, 'body' => 'The Password reset link is :'.url("/Tikety/public/verify/{$token}")] );

        return redirect()->route('verify', $user)->with('message', 'Reset link was sent to '.$user);

    }

    public function verify($phone){
        return view('auth.phone', compact('phone'));
    }

    public function tokenVerify($token){
        if(User::where('token', $token)->exists()){
            $user = User::where('token', $token)->first();
            Auth::login($user);
            return redirect()->route('reset', $user)->with('message', 'Change your Password');
        } else(
            abort(422)
        );
    }

    public function resetview($user){
        return view('auth.passwords.reset', compact('user'));
    }

    public function resetpassword(Request $request){
        $validated = $request->validate([
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $request->user()->fill([
            'password' => Hash::make($validated['password'])
        ])->save();
        return redirect()->route('home')->with('success', trans('Password changed successfully'));
    }
}
