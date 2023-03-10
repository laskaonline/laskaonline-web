<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;

class ItemDepositController extends Controller
{
    public function index()
    {
        if (Auth::user()->hasRole('admin')) {
            return view('admin.item_deposit');
        } else {
            return view('user.titip-barang');
        }
    }

    public function create()
    {
        return view('user.registrasi-titip-barang');
    }

    public function store(Request $request)
    {
    }

    public function show($id)
    {
        return view('user.detail-titip-barang');
    }

    public function edit($id)
    {
    }

    public function update(Request $request, $id)
    {
    }

    public function destroy($id)
    {
    }
}
