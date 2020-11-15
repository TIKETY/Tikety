<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Arr;
use Illuminate\Support\Facade\Notification;
use App\Notifications\BusNotification;
use Nexmo\Laravel\Facade\Nexmo;
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
            'amount'=>'required',
            'address'=>'required',
            'phonenumber'=>'required',
            'platenumber'=>'required|unique:buses',
            'workinghours'=>'required',
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
            'amount'=>$validated['amount'],
            'phonenumber'=>$validated['phonenumber'],
            'platenumber'=>$validated['platenumber'],
            'workinghours'=>$validated['workinghours'],
            'address'=>$validated['address'],
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
            'seats'=>$seats,
            'notifications'=>auth()->user()->unreadNotifications
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
            'amount'=>'required',
            'platenumber'=>'required',
            'address'=>'required',
            'workinghours'=>'required',
            'phonenumber'=>'required',
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
            'seats'=>$seats,
            'notifications'=>auth()->user()->unreadNotifications
        ])->with('update_message', 'The Bus has been updated successfully');
    }

    public function removeBus(Bus $bus){
        Bus::where('id', $bus->id)->delete();
        return redirect()->route('buses')->with('message_bus', 'Bus removed Successfuly');
    }

    public function takeseat(Request $request, Bus $bus){
        $string = $request->seats_id;
        $array = explode(',', $string);
        $bus->seats_to_user($array, $bus->user);
        return redirect()->back()->with('seat_message', 'Seat has been taken');
    }

    public function payseat(Request $request, Bus $bus){
        $string = $request->seats_id;
        $array = explode(',', $string);
        $bus->seats_to_user($array, auth()->user());
        $bus->user->notify(new BusNotification($string));
        Nexmo::message()->send([
            'to'   => '255654660654',
            'from' => '16105552344',//set it to Tikety
            'text' => 'Using the facade to send a message.'
        ]);
        return redirect()->back()->with('seat_message', 'Seats has been taken');
    }

    public function travel(Request $request){
        $from = $request['from'];
        $to = $request['to'];

        $buses = Bus::where('from', $from)->where('to', $to)->get();

        return view('travel-output', compact('buses'));
    }
}


