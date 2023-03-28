<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateProfileRequest;
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

    public function update(UpdateProfileRequest $request)
    {
        $user = Auth::user();

        $name = $request->name;
        $no_ktp = $request->no_ktp;
        $phone = $request->phone;
        $email = $request->email;
        $gender = $request->gender;
        $address = $request->address;
        $job_title = $request->job_title;

        $user->name = $name;
        $user->no_ktp = $no_ktp;
        $user->phone = $phone;
        $user->email = $email;
        $user->gender = $gender;
        $user->address = $address;
        if (auth()->user()->hasAnyRole(['admin', 'superior'])) {
            $user->job_title = $job_title;
        }

        if ($request->hasFile('photo')) {
            if ($user->photo !== null) {
                Storage::delete($user->photo);
            }
            $path = $request->file('photo')->store('user', 'web-file');
            $user->photo = $path;
        }

        $user->save();

        return back()->with('success', 'Profil berhasil di ubah');
    }
}
