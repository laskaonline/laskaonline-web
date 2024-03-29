<?php

namespace App\Http\Controllers\API\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function store(Request $request)
    {
        $credentials = $request->only(['phone', 'password']);

        if (Auth::attempt($credentials)) {
            $user = $request->user();
            $token = $user->createToken('mobile-app')->plainTextToken;
            return response()->json([
                'status' => 'success',
                'data' => $token
            ]);
        }

        return response()->json([
            'status' => 'error',
            'message' => 'Invalid credentials'
        ], 401);
    }
}
