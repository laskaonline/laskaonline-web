<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Spatie\Permission\Models\Role;

class ManageUserController extends Controller
{
    public function index()
    {
        $admin = User::role('admin')->get();
        $visitor = User::role('visitor')->get();
        $admins['admins'] = $admin;
        $visitors['visitors'] = $visitor;
        return view('admin.manage_user', $admins, $visitors);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'      => 'required', 'string', 'max:255',
            'no_ktp'    => 'required', 'string', 'between:16,17',
            'email'     => 'required', 'email', 'unique:users,email',
            'phone'     => 'required', 'starts_with:08,+62',
            'job_title' => 'required', 'string',
            'password'  => 'required', 'confirmed', Password::min(8)->uncompromised(3),
        ]);

        User::create([
            'name'      => $request['name'],
            'email'     => $request['email'],
            'no_ktp'    => $request['no_ktp'],
            'phone'     => $request['phone'],
            'job_title' => $request['job_title'],
            'password'  => Hash::make($request['password']),
        ])->assignRole('admin');

        return redirect()->route('admin.manage-user.index')->with('success', 'Create Success!');
    }
}
