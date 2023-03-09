<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;

/**
 * App\Models\ItemDeposit
 *
 * @property int $id
 * @property string $name_wbp
 * @property string $room_block
 * @property string $case
 * @property string $relationship
 * @property string $date_deposit
 * @property string $problem perkara
 * @property string $photo_visitor
 * @property string $family_card
 * @property string $state
 * @property int $created_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\ItemDepositApprove> $approvals
 * @property-read int|null $approvals_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Deposit> $items
 * @property-read int|null $items_count
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|ItemDeposit newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ItemDeposit newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ItemDeposit query()
 * @method static \Illuminate\Database\Eloquent\Builder|ItemDeposit whereCase($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ItemDeposit whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ItemDeposit whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ItemDeposit whereDateDeposit($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ItemDeposit whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ItemDeposit whereFamilyCard($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ItemDeposit whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ItemDeposit whereNameWbp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ItemDeposit wherePhotoVisitor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ItemDeposit whereProblem($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ItemDeposit whereRelationship($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ItemDeposit whereRoomBlock($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ItemDeposit whereState($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ItemDeposit whereUpdatedAt($value)
 * @mixin \Eloquent
 */
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
