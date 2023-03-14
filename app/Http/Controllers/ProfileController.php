<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateProfileRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function index()
    {
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
