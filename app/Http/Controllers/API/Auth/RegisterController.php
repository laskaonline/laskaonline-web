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
        dd($request->all());
        $user = User::create($request->validated());

        $token = $user->createToken('mobile-app')->plainTextToken;

        return response()->json([
            'status' => 'success',
            'data' => $token
        ]);
    }
}
