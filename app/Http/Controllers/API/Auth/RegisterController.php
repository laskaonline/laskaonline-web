<?php

namespace App\Http\Controllers\API\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterUserRequest;
use App\Models\User;
use Request;

class RegisterController extends Controller
{
    public function store(RegisterUserRequest $request)
    {
        $user = User::create([
            'name' => $request->name,
            'no_ktp' => $request->no_ktp,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => bcrypt($request->password),
        ])->assignRole('visitor');

        $token = $user->createToken('mobile-app')->plainTextToken;

        return response()->json([
            'status' => 'success',
            'data' => $token
        ]);
    }
}
