<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


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
            'image_url'=>'file',
            'password'=>'string|max:255|confirmed|min:8',
        ]);

        $validated['image_url'] = request('image_url')->store('profile_images');
        $validated['password'] = Hash::make($validated['password']);

        $user->update($validated);

        Auth::logout($user);

        Auth::login($user);

        return redirect()->route('profile', ['user'=>$user, 'language'=>app()->getLocale()])->with('update_message', 'Your Profile was updated successfully');
    }

}
