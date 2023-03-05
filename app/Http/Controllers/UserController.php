<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        return view('user.profile')->with(compact($user));
    }

    public function update()
    {
        //TODO: Update User
        return redirect()->back();
    }
}
