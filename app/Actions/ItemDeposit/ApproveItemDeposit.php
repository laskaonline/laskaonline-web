<?php

namespace App\Actions\ItemDeposit;

use App\Models\ItemDeposit;
use App\Models\ItemDepositApprove;
use Exception;
use Illuminate\Support\Facades\Storage;

class ApproveItemDeposit
{
    /**
     * @param ItemDeposit $itemDeposit
     * @param array $data
     * @return \App\Models\ItemDepositApprove|\Illuminate\Database\Eloquent\Model
     * @throws \Exception
     */
    public function handle(ItemDeposit $itemDeposit, array $data): ItemDepositApprove|\Illuminate\Database\Eloquent\Model
    {
        if (!$this->shouldApprove($itemDeposit)) {
            throw new Exception('Barang ini sudah disetujui oleh 3 petugas');
        }

        $photo_path = Storage::putFile('item_deposit', $data['photo']);
        $data['photo'] = $photo_path;

        return $itemDeposit->approvals()->updateOrCreate(['user_id' => auth()->id()], $data);
    }

    private function shouldApprove(ItemDeposit $itemDeposit): bool
    {
        return $itemDeposit->approvals()->count() < 3;
    }
}
