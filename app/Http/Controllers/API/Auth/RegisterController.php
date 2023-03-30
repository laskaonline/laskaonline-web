<?php

namespace App\Http\Controllers\API\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterUserRequest;
use App\Models\User;
use Request;

class RegisterController extends Controller
{
    public function apiregister(RegisterUserRequest $request)
    {
        $user = User::create($request->validated());

        $token = $user->createToken('mobile-app')->plainTextToken;

        return response()->json([
            'status' => 'success',
            'data' => $token
        ]);
    }
}
