<?php

namespace App\Http\Controllers;


use App\Actions\ItemDeposit\ApproveItemDeposit;
use App\Http\Requests\ApproveDepositRequest;
use App\Models\ItemDeposit;

class ApproveDepositController extends Controller
{
    public function __invoke(ApproveDepositRequest $request, ItemDeposit $deposit, ApproveItemDeposit $approveItemDeposit)
    {
        try {
            $approveItemDeposit->handle($deposit, $request->validated());

            return redirect()->back()->withMessage('Barang sudah disetujui');
        } catch (\Exception $e) {
            return redirect()->back(422)->withErrors($e->getMessage());
        }
    }
}
