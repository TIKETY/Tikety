<?php

namespace App\Http\Controllers;

use App\Mail\VerifyEmail;
use Illuminate\Http\Request;
use App\Models\User;
use App\Jobs\InformUser;
use App\Rules\RecaptchaRule;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class ProfileController extends Controller
{
    public function storeimage(){

    }

    public function show($language, User $user){
        return view('profile.profile', compact('user'));
    }

    public function edit(){

    }

    public function editprofileview($language, User  $user){
        return view('profile.profileedit', compact('user'));
    }

    public function editprofile($language, Request $request, User $user){

        $validated = $request->validate([
            'name'=>'required|string',
            'email'=>'email',
            'image_url'=>'file|max:10240',
            'password'=>'string|max:255|confirmed|min:8',
            'g-recaptcha-response'=>['required', new RecaptchaRule]
        ]);

        Storage::disk('do')->putFile('profiles', $request->file('image_url'), 'public');

        $validated['image_url'] = request('image_url')->store('profiles');

        $validated['password'] = Hash::make($validated['password']);

        $user->update($validated);

        Auth::logout($user);

        Auth::login($user);

        if(!is_null($validated['email'])){
            $user->tokenizer();

            $user->email_nullify();

            Mail::to($validated['email'])->send(new VerifyEmail($user));

            Alert::success('Updates', trans('You have successfully updated other details, except your email, please verify!'));

            return redirect()->route('verification', ['language'=>app()->getLocale(), 'user'=>$user])->with('message', trans('Please Verify your Email'));
        } else{
        return redirect()->route('profile', ['user'=>$user, 'language'=>app()->getLocale()])->with('update_message', trans('Your Profile was updated successfully'));
        }
    }

    public function verification_resend($language, User $user){
        $user->tokenizer();

        Mail::to($user->email)->send(new VerifyEmail($user));

        return redirect()->route('verification', ['language'=>app()->getLocale()])->with('message', trans('Email was resent successfully'));
    }

    public function verify($language, $token){
        $user = User::where('token', $token)->first();

        if(!is_null($user)){
            $user->email_verify();

            $user->tokenizer();

            return redirect()->route('home', ['language'=>app()->getLocale()])->with('success', trans('Email verified successfully'));
        }

        return abort(422);
    }

    public function delete($language, $id){
        $user = User::where(['id'=>$id])->first();

        dispatch(new InformUser($user));

        return redirect()->route('home', ['language'=>app()->getLocale()])->with('success', trans('Your Account will be deleted in 7 days'));
    }

}
