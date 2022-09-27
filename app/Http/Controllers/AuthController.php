<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    //
    public function login(Request $request)
    {
        $creds = $request->validate([
            'email' => 'required|string',
            'password' => 'required|string'
        ]);


        if ($creds) {
            $user = User::where('email', $creds['email'])->first();
            if (!$user || !Hash::check($creds['password'], $user->password)) {
                return response([
                    'message' => 'Invalid Credentials',
                    'status' => 'failed'
                ], 401);
            }

            $token = $user->createToken('ffcm_token')->plainTextToken;
            return response([
                'user' => $user,
                'token' => $token
            ], 201);
        }
    }
}
