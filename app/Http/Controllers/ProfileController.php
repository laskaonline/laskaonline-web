<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function index()
    {
        return view('user.profile');
    }

    public function update(Request $request)
    {
        $auth = Auth::user();

        $id         = $request->id;
        $name       = $request->name;
        $no_ktp     = $request->no_ktp;
        $phone      = $request->phone;
        $email      = $request->email;
        $gender     = $request->gender;
        $address    = $request->address;
        $photo      = $request->photo;

        $request->validate([
            'name'      => 'string',
            'no_ktp'    => 'numeric',
            'phone'     => 'starts_with:08,+62',
            'email'     => 'email',
        ]);

        $user = User::find($request->id);
        $user->name = $name ?? $auth->name;
        $user->no_ktp = $no_ktp ?? $auth->no_ktp;
        $user->phone = $phone ?? $auth->phone;
        $user->email = $email ?? $auth->email;
        $user->gender = $gender ?? $auth->gender;
        $user->address = $address ?? $auth->address;

        //photo
        $path = $request->photo;

        if ($path != null) {
            Storage::delete($auth->address);
            $path = $request->file('photo')->store('user');
            $user->photo = $path;
        } else {
            $user->photo = $auth->photo;
        }


        $user->save();

        return back()->with('success', 'Profil berhasil di ubah');
    }
}
