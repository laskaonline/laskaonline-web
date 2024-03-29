<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateProfileRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        if (auth()->user()->hasAnyRole(['admin', 'superior'])) {
            return view('admin.profile', compact('user'));
        }

        return view('user.profile', compact('user'));
    }

    public function update(UpdateProfileRequest $request)
    {
        $user = Auth::user();

        $name = $request->name;
        $no_ktp = $request->no_ktp;
        $phone = $request->phone;
        $gender = $request->gender;
        $address = $request->address;
        $job_title = $request->job_title;

        $user->name = $name;
        $user->no_ktp = $no_ktp;
        $user->phone = $phone;
        $user->gender = $gender;
        $user->address = $address;
        if (auth()->user()->hasAnyRole(['admin', 'superior'])) {
            $user->job_title = $job_title;
        }

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
}
