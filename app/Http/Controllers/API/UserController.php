<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateUserRequest;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function view()
    {
        $user = Auth::user();

        return response()->json([
            'status' => 'success',
            'data' => $user
        ]);
    }

    public function update(UpdateUserRequest $request)
    {
        auth()->user()->update($request->validated());

        return response()->json([
            'status' => 'success',
            'message' => 'User berhasil diupdate'
        ]);
    }
}
