<?php

namespace App\Http\Controllers;


use App\Http\Requests\ApproveDepositRequest;
use App\Models\ItemDeposit;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class ApproveDepositController extends Controller
{
    public function __invoke(ApproveDepositRequest $request, ItemDeposit $deposit)
    {
        if ($deposit->approvals()->count() === 3) {
            throw new ValidationException('Barang ini sudah disetujui oleh 3 petugas');
        }

        $deposit->approvals()->updateOrCreate([
            'user_id' => auth()->id(),
        ],
            $request->validated()
        );

        return redirect()->back()->withMessage('Barang sudah disetujui');
    }
}
