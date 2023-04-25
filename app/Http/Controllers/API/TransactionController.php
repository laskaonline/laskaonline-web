<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index(Request $request)
    {
        $limit = $request->query('limit', 100);
        $offset = $request->query('offset', 0);

        $transactions = Transaction::with('transactionable')
            ->limit($limit)
            ->offset($offset)
            ->whereHasMorph('transactionable', '*', function ($query) use ($request) {
                $query->where('created_by', $request->user()->id);
            })->orderBy('created_at', 'desc')->get();

        return response()->json([
            'message' => 'success',
            'data' => $transactions,
        ]);
    }
}
