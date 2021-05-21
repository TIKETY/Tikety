<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Bus;
use App\Models\Review;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Gate;

class AuthController extends Controller
{
    use ApiResponser;

    public function register(Request $request)
    {
        $attr = $request->validate([
            'name' => 'required|string|max:255',
            'phone_number' => 'required|max:15|min:10|string',
            'password' => 'required|string|min:6',
        ]);

        if(User::where('phone_number', $attr['phone_number'])->exists()){
            return response()->json([
                'Success'=>false,
                'User'=>'The User phone number exists'
            ]);
        }

        $user = User::create([
            'name' => $attr['name'],
            'phone_number' => $attr['phone_number'],
            'password' => bcrypt($attr['password']),
        ]);

        $user->verifyphone($attr['phone_number']);

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
                    'Success'=>true,
                    'access_token' => $token,
                    'token_type' => 'Bearer',
        ]);
        }

    public function login(Request $request)
    {
        $attr = $request->validate([
            'phone_number' => 'required|string|min:10|max:15',
            'password' => 'required|string|min:6'
        ]);

        if (!Auth::attempt($attr)) {
            return $this->error('Credentials not match', 401);
        }

        return $this->success([
            'token' => auth()->user()->createToken('API Token')->plainTextToken
        ]);
    }

    public function logout()
    {
        auth()->user()->tokens()->delete();

        return [
            'Success'=>true,
            'message' => 'Tokens Revoked'
        ];
    }

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

    public function verify(Request $request){
        $attr = $request->validate([
            'code' => 'required|string|max:8',
        ]);

        $checker = User::where('verification_code', $attr['code'])->where('id', auth()->user()->id)->exists();

        if($checker){
            auth()->user()->verify();
            return response()->json([
                'Success'=>true,
                'message'=>'Phone Number Verified'
            ]);
        } else{
            return response()->json([
                'Success'=>false,
                'message'=>'Phone Number Not Verified'
            ]);
        }
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

        return response()->json([
            'bus'=>$bus,
            'seats'=>$seats,
            'users'=>$users,
            'reviews'=>$reviews,
        ]);
    }
}
