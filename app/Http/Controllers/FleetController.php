<?php

namespace App\Http\Controllers;

use App\Models\Fleet;
use App\Models\User;
use App\Models\Bus;

class FleetController extends Controller
{
    public function ShowFleet($language, User $user){
    $fleet = Fleet::where('user_id', $user->id)->get()->pluck('bus_id');
    $buses = Bus::find($fleet);
    return view('fleet.fleet', compact('buses'));
    }

    public function AddBusFleet($language, Bus $bus){
        $fleet = new Fleet;
        $fleet->addBus($bus, auth()->user());
        return redirect()->back()->with('fleet_message', 'Bus added to the fleet successful');
    }

}
