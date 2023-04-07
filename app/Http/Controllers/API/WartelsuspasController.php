<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreWartelsuspasRequest;
use App\Models\Wartelsuspas;
use Illuminate\Http\Request;

class WartelsuspasController extends Controller
{
    public function index()
    {
        return response()->json([
            'status' => 'success',
            'data' => Wartelsuspas::all(),
        ]);
    }

    public function store(StoreWartelsuspasRequest $request)
    {
        $wartelsuspas = auth()->user()->wartelsuspas()->create($request->validated());

        return response()->json([
            'status' => 'success',
            'message' => 'Wartelsuspas berhasil dibuat',
            'data' => $wartelsuspas
        ], 201);
    }

    public function show(Wartelsuspas $wartelsuspas)
    {
        return response()->json([
            'status' => 'success',
            'data' => $wartelsuspas
        ]);
    }

    public function update(Request $request, Wartelsuspas $wartelsuspas)
    {
    }

    public function destroy(Wartelsuspas $wartelsuspas)
    {
    }
}
