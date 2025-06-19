<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthAdminController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('username', 'password');

        if (!auth()->attempt($credentials)) {
            return response()->json(['message' => 'username or password invalid'], 401);
        }

        return response()->json([
            'message' => 'Login successful',
            "data" => [
                'token' => $request->user()->createToken('auth_token')->plainTextToken,
            ]
        ], 200);
    }

    public function logout(Request $request)
    {
        if (!$request->user()) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        $request->user()->currentAccessToken()->delete();

        return response()->json(['message' => 'Logout successful'], 200);
    }
}
