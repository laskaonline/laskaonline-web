<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function index()
    {
        // $user = User::find($id);
        // $data = [
        //     'id'        => $id,
        //     'name'      => $user->name,
        //     'no_ktp'    => $user->no_ktp,
        //     'phone'     => $user->phone,
        //     'email'     => $user->email,
        //     'gender'    => $user->gender,
        //     'address'   => $user->address,
        //     'photo'     => $user->photo,
        // ];
        return view('user.profile');
    }

    public function update(Request $request)
    {

        $data['id']         = $request->id;

        $data['name']       = $request->name;
        $data['no_ktp']     = $request->no_ktp;
        $data['phone']      = $request->phone;
        $data['email']      = $request->email;
        $data['gender']     = $request->gender;
        $data['address']    = $request->address;

        //photo
        $path = $request->file('photo')->store('photo');

        $data['photo'] = $path;
        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('photo');
            $data['photo'] = $path;
        } else {
            $path = '';
            $data['photo'] = $path;
        }
        //delete photo
        $user = User::find($request->id);
        $pathFoto =  $user->photo;
        if ($pathFoto != null || $pathFoto != '') {
            Storage::delete($pathFoto);
        }
        User::where(['id' => $request->id])->update($data);

        return back()->with('message', 'Profil berhasil di ubah');
    }
}