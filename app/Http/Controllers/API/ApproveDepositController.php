<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\ApproveDepositRequest;
use App\Models\ItemDeposit;
use Illuminate\Validation\ValidationException;

class ApproveDepositController extends Controller
{
    public function __invoke(ApproveDepositRequest $request, ItemDeposit $deposit)
    {
        if ($deposit->approvals()->count() === 3) {
            throw new ValidationException('Barang ini sudah disetujui oleh 3 petugas');
        }

        $deposit->approvals()->updateOrCreate([
            'id' => auth()->id()
        ],
            $request->validated()
        );

        return response()->json([
            'message' => 'success'
        ]);

    }
}
