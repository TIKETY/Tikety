<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
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
            'rows'=>'required',
            'route'=>'required'
        ]);
        Bus::create([
            'name'=>$validated['name'],
            'body'=>$validated['body'],
            'rows'=>$validated['rows'],
            'route'=>$validated['route'],
            'user_id'=>$user->id
        ]);

        return redirect()->route('bus', $user);
    }

    public function show(Bus $bus){
        return view('busdetail', compact('bus'));
    }

    public function showbuses(){
        $buses = Bus::latest()->get();
        return view('bus', compact('buses'));
    }

    public function updatebus(Bus $bus){
        if(auth()->user()->id != $bus->user_id){
            abort(404);
        }

        return view('updatebus', compact('bus'));
    }

    public function update(Request $request, Bus $bus){

        $validated = $request->validate([
            'name'=>['required', Rule::unique('buses')->ignore($bus)],
            'body'=>'required',
            'rows'=>'required',
            'route'=>'required'
        ]);

        $bus->update($validated);

        return view('busdetail', compact('bus'));
    }
}
