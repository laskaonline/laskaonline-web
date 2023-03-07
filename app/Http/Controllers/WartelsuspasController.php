<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreWartelsuspasRequest;
use App\Models\Wartelsuspas;
use Illuminate\Http\Request;

class WartelsuspasController extends Controller
{
    public function index()
    {
        return view('admin.wartelsuspas');
    }

    public function create()
    {
    }

    public function store(StoreWartelsuspasRequest $request)
    {
        auth()->user()->wartelsuspas()->create($request->validated());

        return back()->with('message', 'Wartelsuspas berhasil dibuat');
    }

    public function show(Wartelsuspas $wartelsuspas)
    {
    }

    public function edit(Wartelsuspas $wartelsuspas)
    {
    }

    public function update(Request $request, Wartelsuspas $wartelsuspas)
    {
    }

    public function destroy(Wartelsuspas $wartelsuspas)
    {
    }
}
