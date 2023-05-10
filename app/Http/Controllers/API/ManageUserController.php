<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class ManageUserController extends Controller
{
    public function index()
    {
        $users = User::role(['admin', 'visitor'])->get();

        return response()->json([
            'status' => 'success',
            'data' => $users
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'no_ktp' => 'required|string|between:16,17',
            'phone' => 'required|starts_with:08,+62',
            'job_title' => 'required|string',
            'password' => ['required', 'confirmed', Password::min(8)->uncompromised(3)],
        ]);

        User::create([
            'name' => $request['name'],
            'no_ktp' => $request['no_ktp'],
            'phone' => $request['phone'],
            'job_title' => $request['job_title'],
            'password' => Hash::make($request['password']),
        ])->assignRole('admin');

        return redirect()->route('admin.manage-user.index')->with('success', 'Create Success!');
    }
}
