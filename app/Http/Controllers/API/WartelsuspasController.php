<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreWartelsuspasRequest;
use App\Models\Wartelsuspas;
use Illuminate\Http\Request;

class WartelsuspasController extends Controller
{
    public function index(Request $request)
    {
        $limit  = $request->query('limit', 100);
        $page   = $request->query('page', 1);
        $sortBy = $request->string('sortBy', 'DESC');

        $wartelsuspas = Wartelsuspas::orderBy('created_at', $sortBy)
            ->paginate(
                $perPage = $limit,
                $columns = ['*'],
                $pageName = 'page'
            )->withQueryString();

        return response()->json([
            'message' => 'success',
            'meta' => $this->resultMeta($wartelsuspas, true),
            'data' => $this->resultData($wartelsuspas),
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

    public function show(Wartelsuspas $wartelsuspa)
    {
        return response()->json([
            'status' => 'success',
            'data' => $wartelsuspa
        ]);
    }

    public function update(Request $request, Wartelsuspas $wartelsuspas)
    {
    }

    public function destroy(Wartelsuspas $wartelsuspas)
    {
    }
}
