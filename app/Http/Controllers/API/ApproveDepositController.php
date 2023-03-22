<?php

namespace App\Http\Controllers\API;

use App\Actions\ItemDeposit\ApproveItemDeposit;
use App\Http\Controllers\Controller;
use App\Http\Requests\ApproveDepositRequest;
use App\Models\ItemDeposit;

class ApproveDepositController extends Controller
{
    public function __invoke(ApproveDepositRequest $request, ItemDeposit $deposit, ApproveItemDeposit $approveItemDeposit)
    {
        try {
            $approveItemDeposit->handle($deposit, $request->validated());

            return response()->json([
                'status' => 'success',
                'message' => 'Barang telah disetujui'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage()
            ], 400);
        }
    }
}
