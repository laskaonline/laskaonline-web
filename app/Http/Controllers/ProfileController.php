<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateProfileAdminRequest;
use App\Http\Requests\UpdateProfileRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function index()
    {
        if (auth()->user()->hasAnyRole(['admin', 'superior'])) {
            $user = auth()->user();

            return view('admin.profile', compact('user'));
        }
        $user = auth()->user();

        return view('user.profile', compact('user'));
    }

    public function update(UpdateProfileRequest $request, UpdateProfileAdminRequest $request_admin)
    {
        if (auth()->user()->hasAnyRole(['admin', 'superior'])) {
            $user = Auth::user();

            $name = $request_admin->name;
            $no_ktp = $request_admin->no_ktp;
            $phone = $request_admin->phone;
            $email = $request_admin->email;
            $job_title = $request_admin->job_title;
            $gender = $request_admin->gender;
            $address = $request_admin->address;

            $user->name = $name;
            $user->no_ktp = $no_ktp;
            $user->phone = $phone;
            $user->email = $email;
            $user->job_title = $job_title;
            $user->gender = $gender;
            $user->address = $address;

            if ($request->hasFile('photo')) {
                if ($user->photo !== null) {
                    Storage::delete($user->photo);
                }
                $path = $request->file('photo')->store('user');
                $user->photo = $path;
            }

            $user->save();

            return back()->with('success', 'Profil berhasil di ubah');
        }

        $user = Auth::user();

        $name = $request->name;
        $no_ktp = $request->no_ktp;
        $phone = $request->phone;
        $email = $request->email;
        $gender = $request->gender;
        $address = $request->address;

        $user->name = $name;
        $user->no_ktp = $no_ktp;
        $user->phone = $phone;
        $user->email = $email;
        $user->gender = $gender;
        $user->address = $address;

        if ($request->hasFile('photo')) {
            Storage::delete($user->photo);
            $path = $request->file('photo')->store('user');
            $user->photo = $path;
        }

        $user->save();

        return back()->with('success', 'Profil berhasil di ubah');
    }
}
