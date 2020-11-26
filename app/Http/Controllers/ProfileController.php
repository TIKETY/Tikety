<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class ProfileController extends Controller
{
    public function storeimage(){

    }

    public function show(User $user){
        return view('profile', compact('user'));
    }

    public function edit(){

    }

    public function editprofileshow(User  $user){
        return view('profileedit', compact('user'));
    }

    public function editprofile(Request $request, User $user){

        $validated = $request->validate([
            'name'=>'required|string',
            'image_url'=>'file',
            'password'=>'string|max:255|confirmed|min:8',
        ]);

        $validated['image_url'] = request('image_url')->store('profile_images');
        $validated['password'] = Hash::make($validated['password']);

        $user->update($validated);

        return redirect()->route('ShowProfile', $user)->with('update_message', 'Your Profile was updated successfully');
    }

}
