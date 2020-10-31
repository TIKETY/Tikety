<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Bus;

class BusController extends Controller
{
    public function MyBus(User $user){
        $buses = $user->bus;

        return view('bus', compact('buses'));
    }

    public function CreateBus(){
        return view('createbus');
    }

    public function CreateBusForm(Request $request, User $user){
        $user = auth()->user();

        $validated = $request->validate([
            'name'=>'required|unique:buses',
            'body'=>'required',
            'route'=>'required'
        ]);
        Bus::create([
            'name'=>$validated['name'],
            'body'=>$validated['body'],
            'route'=>$validated['route'],
            'user_id'=>$user->id
        ]);

        return redirect()->route('bus', $user);
    }

    public function show(Bus $bus){
        return view('busdetail', compact('bus'));
    }
}
