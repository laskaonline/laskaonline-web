<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateUserRequest;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        return view('user.profile')->with(compact($user));
    }

    public function update(UpdateUserRequest $request)
    {
        auth()->user()->update($request->validated());

        return redirect()->back();
    }
}
