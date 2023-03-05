<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class ItemDeposit extends Model
{
    use HasFactory;

    protected $table = 'item_deposit';
    protected $guarded = [];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function items(): MorphMany
    {
        return $this->morphMany(Deposit::class, 'depositable');
    }

    public function approvals(): HasMany
    {
        return $this->hasMany(ItemDepositApprove::class, 'item_deposit_id');
    }
}
