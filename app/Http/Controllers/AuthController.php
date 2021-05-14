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
            'phone_number' => 'required|max:15|min:10|unique:users|string',
            'password' => 'required|string|min:6',
        ]);

        $user = User::create([
            'name' => $attr['name'],
            'phone_number' => $attr['phone_number'],
            'password' => bcrypt($attr['password']),
        ]);

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
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
            'message' => 'Tokens Revoked'
        ];
    }
}
