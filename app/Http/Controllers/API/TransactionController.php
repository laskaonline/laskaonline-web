<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index(Request $request)
    {
        $limit  = $request->query('limit', 100);
        $page   = $request->query('page', 1);
        $sortBy = $request->string('sortBy', 'DESC');

        $transactions = Transaction::whereHasMorph('transactionable', '*', function ($query) use ($request) {
            $query->where('created_by', $request->user()->id);
        })
            ->orderBy('id', $sortBy)
            ->paginate(
                $perPage = $limit,
                $columns = ['*'],
                $pageName = 'page'
            )->withQueryString();

        return response()->json([
            'message' => 'success',
            'meta' => $this->resultMeta($transactions, true),
            'data' => $this->resultData($transactions),
        ]);
    }
}
