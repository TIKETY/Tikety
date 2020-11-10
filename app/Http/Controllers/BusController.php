<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Arr;
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
            'from'=>'required|max:30',
            'to'=>'required|max:30',
            'date'=>'required|date',
            'time'=>'required|date_format:H:i',
            'route'=>'required'
        ]);

        $bus = Bus::create([
            'name'=>$validated['name'],
            'body'=>$validated['body'],
            'rows'=>$validated['rows'],
            'from'=>$validated['from'],
            'to'=>$validated['to'],
            'date'=>$validated['date'],
            'time'=>$validated['time'],
            'route'=>$validated['route'],
            'user_id'=>$user->id
        ]);

        $user->addBus($bus);

        for ($i=1; $i <= $validated['rows']*4; $i++) {
         $bus->addSeat($i);
        }

        return redirect()->route('buses')->with('create_message', 'Bus created Successfully');
    }

    public function show(Bus $bus){
        $seats = (Arr::flatten($bus->seats()->where('bus_id', $bus->id)->where('user_id', NULL)->pluck('seat')));
        return view('busdetail', [
            'bus'=>$bus,
            'seats'=>$seats
        ]);
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
            'rows'=>'required|max:2',
            'from'=>'required|max:30',
            'to'=>'required|max:30',
            'date'=>'required|date',
            'time'=>'required|date_format:H:i',
            'route'=>'required'
        ]);

        if($bus->rows > $validated['rows']){
            for ($i=1; $i < (($bus->rows - $validated['rows'])*4)+1; $i++) {
                $bus->removeSeat(($validated['rows']*4)+$i);
            }
        } else if($validated['rows'] > $bus->rows){
            for ($i=1; $i < ($validated['rows']*4)+1; $i++){
                if(!$bus->seat_existence($i)){
                    $bus->addSeat($i);
                }
            }
        }
        $bus->update($validated);
        $seats = (Arr::flatten($bus->seats()->where('bus_id', $bus->id)->where('user_id', NULL)->pluck('seat')));
        return view('busdetail', [
            'bus'=>$bus,
            'seats'=>$seats
        ])->with('update_message', 'The Bus has been updated successfully');
    }

    public function removeBus(Bus $bus){
        Bus::where('id', $bus->id)->delete();
        return redirect()->route('buses')->with('message_bus', 'Bus removed Successfuly');
    }

    public function takeseat(Request $request, Bus $bus){
        $array = [0=>$request->seats_id];
        $bus->seats_to_user($array, $bus->user);
        return redirect()->back()->with('seat_message', 'Seat has been taken');
    }
}
