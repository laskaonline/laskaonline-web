<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ManageUserController extends Controller
{
    public function index()
    {
        return view('admin.manage_user');
    }

    public function store(Request $request)
    {
        // $data = $request->all();
        // User::create($data);
        // return redirect()->view('admin.manage-user')->with('alert', 'Create Success!');
    }
}
