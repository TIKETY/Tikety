<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bus;
use App\Models\Gallery;
use App\Models\User;
use App\Models\Review;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Gate;

class FlutterAPI extends Controller
{

    public function search(Request $request){
        $buses = Bus::query()
                ->where('name', 'LIKE', "%{$request->input('name')}%")->inRandomOrder()->get();
        return response()->json([
                    'buses'=>$buses,
            ]);
    }

    public function buses(){
        $buses = Bus::inRandomOrder()->get();
        return response()->json([
            'buses'=>$buses,
        ]);
    }

    public function show(Bus $bus){
        $seats = (Arr::flatten($bus->seats()->where('bus_id', $bus->id)->where('user_id', NULL)->pluck('seat')));
        $users_t = (Arr::flatten($bus->seats()->where('bus_id', $bus->id)->whereNotNull('user_id')->pluck('user_id')));
        $users = User::whereIn('id', $users_t)->get();

        if(Gate::allows('isowner', $bus)){
            $reviews = Review::where('bus_id', $bus->id)->paginate(1);
        } else{
            if(Review::where('bus_id', $bus->id)->where('approved', 1)->exists()){
                $reviews = Review::where('bus_id', $bus->id)->where('approved', 1)->paginate(1);
            } else{
                $reviews = null;
            }
        }

        if(Gallery::where('bus_id', $bus->id)->exists()){
            $images = Gallery::where('bus_id', $bus->id)->get();
        } else{
            $images = null;
        }

        return response()->json([
            'images'=>$images,
            'bus'=>$bus,
            'seats'=>$seats,
            'users'=>$users,
            'reviews'=>$reviews,
        ]);
    }
}
