<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

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
}
