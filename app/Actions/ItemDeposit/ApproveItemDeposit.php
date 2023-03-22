<?php

namespace App\Actions\ItemDeposit;

use App\Models\ItemDeposit;
use App\Models\ItemDepositApprove;
use Exception;

class ApproveItemDeposit
{
    /**
     * @param ItemDeposit $itemDeposit
     * @param array $data
     * @return ItemDepositApprove
     * @throws Exception
     */
    public function handle(ItemDeposit $itemDeposit, array $data): ItemDepositApprove
    {
        if (!$this->shouldApprove($itemDeposit)) {
            throw new Exception('Barang ini sudah disetujui oleh 3 petugas');
        }

        return $itemDeposit->approvals()->updateOrCreate([
            'user_id' => auth()->id(),
        ],
            $data
        );
    }

    private function shouldApprove(ItemDeposit $itemDeposit): bool
    {
        return $itemDeposit->approvals()->count() < 3;
    }
}
