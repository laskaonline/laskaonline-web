<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreWartelsuspasRequest;
use App\Models\Wartelsuspas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WartelsuspasController extends Controller
{
    public function index()
    {
        $data = [
            'dataWartelsuspas'   => Wartelsuspas::orderBy('created_at', 'desc')->get()
        ];
        return view('admin.wartelsuspas', $data);
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
        if (Auth()->user()->hasAnyRole(['admin', 'superior'])) {
            $wartelSuspasData = Wartelsuspas::with('user')->find($wartelsuspas->id);
            $userData = $wartelSuspasData->user;
            return view('admin.detail_wartelsuspas', ['wartelSuspasData' => $wartelSuspasData, 'userData' => $userData]);
        }
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
