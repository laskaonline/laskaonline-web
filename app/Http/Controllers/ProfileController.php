<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateProfileRequest;
use Illuminate\Support\Facades\Auth;

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
            $path = 'images/user/';

            if (!is_null($user->photo)) {
                !file_exists('file/' . $path . $user->photo) ?: unlink('file/' . $path . $user->photo);
            }

            $file = $request->file('photo');
            $filename = str()->random(20) . '.' . $file->getClientOriginalExtension();
            $file->storeAs($path, $filename, 'local');

            $user->photo = $filename;
        }

        $user->save();

        return back()->with('success', 'Profil berhasil di ubah');
    }
}
