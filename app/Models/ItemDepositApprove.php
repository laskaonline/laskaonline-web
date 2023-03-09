<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\ItemDepositApprove
 *
 * @property int $id
 * @property int $item_deposit_id
 * @property int $user_id
 * @property string $photo
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|ItemDepositApprove newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ItemDepositApprove newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ItemDepositApprove query()
 * @method static \Illuminate\Database\Eloquent\Builder|ItemDepositApprove whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ItemDepositApprove whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ItemDepositApprove whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ItemDepositApprove whereItemDepositId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ItemDepositApprove wherePhoto($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ItemDepositApprove whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ItemDepositApprove whereUserId($value)
 * @mixin \Eloquent
 */
class ItemDepositApprove extends Model
{
    use HasFactory;

    protected $table    = 'item_deposit_approve';
    protected $guarded  = [];
}
