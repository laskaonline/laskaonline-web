<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Support\Carbon;

/**
 * App\Models\ItemDeposit
 *
 * @property int $id
 * @property string $name_wbp
 * @property string $room_block
 * @property string $case
 * @property string $relationship
 * @property string $deposit_date
 * @property string $problem perkara
 * @property string $photo_visitor
 * @property string $family_card
 * @property string $state
 * @property int $created_by
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property-read Collection<int, ItemDepositApprove> $approvals
 * @property-read int|null $approvals_count
 * @property-read Collection<int, Deposit> $items
 * @property-read int|null $items_count
 * @property-read User $user
 * @method static Builder|ItemDeposit newModelQuery()
 * @method static Builder|ItemDeposit newQuery()
 * @method static Builder|ItemDeposit query()
 * @method static Builder|ItemDeposit whereCase($value)
 * @method static Builder|ItemDeposit whereCreatedAt($value)
 * @method static Builder|ItemDeposit whereCreatedBy($value)
 * @method static Builder|ItemDeposit whereDateDeposit($value)
 * @method static Builder|ItemDeposit whereDeletedAt($value)
 * @method static Builder|ItemDeposit whereFamilyCard($value)
 * @method static Builder|ItemDeposit whereId($value)
 * @method static Builder|ItemDeposit whereNameWbp($value)
 * @method static Builder|ItemDeposit wherePhotoVisitor($value)
 * @method static Builder|ItemDeposit whereProblem($value)
 * @method static Builder|ItemDeposit whereRelationship($value)
 * @method static Builder|ItemDeposit whereRoomBlock($value)
 * @method static Builder|ItemDeposit whereState($value)
 * @method static Builder|ItemDeposit whereUpdatedAt($value)
 * @property-read Collection<int, \App\Models\ItemDepositApprove> $approvals
 * @property-read Collection<int, \App\Models\Deposit> $items
 * @method static Builder|ItemDeposit whereDepositDate($value)
 * @property-read Collection<int, \App\Models\ItemDepositApprove> $approvals
 * @property-read Collection<int, \App\Models\Deposit> $items
 * @mixin Eloquent
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

    public function transaction(): MorphOne
    {
        return $this->morphOne(Transaction::class, 'transactionable');
    }
}
