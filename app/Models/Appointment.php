<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Support\Carbon;

/**
 * App\Models\Appointment
 *
 * @property int $id
 * @property string $name_wbp
 * @property string $case
 * @property string $relationship
 * @property string $visit_date
 * @property string $problem perkara
 * @property string $photo_visitor
 * @property string $family_card
 * @property string|null $male_followers
 * @property string|null $female_followers
 * @property string|null $child_followers
 * @property string $state
 * @property int $created_by
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property-read Collection<int, Deposit> $items
 * @property-read int|null $items_count
 * @method static Builder|Appointment newModelQuery()
 * @method static Builder|Appointment newQuery()
 * @method static Builder|Appointment query()
 * @method static Builder|Appointment whereCase($value)
 * @method static Builder|Appointment whereChildFollowers($value)
 * @method static Builder|Appointment whereCreatedAt($value)
 * @method static Builder|Appointment whereCreatedBy($value)
 * @method static Builder|Appointment whereDateDeposit($value)
 * @method static Builder|Appointment whereDeletedAt($value)
 * @method static Builder|Appointment whereFamilyCard($value)
 * @method static Builder|Appointment whereFemaleFollowers($value)
 * @method static Builder|Appointment whereId($value)
 * @method static Builder|Appointment whereMaleFollowers($value)
 * @method static Builder|Appointment whereNameWbp($value)
 * @method static Builder|Appointment wherePhotoVisitor($value)
 * @method static Builder|Appointment whereProblem($value)
 * @method static Builder|Appointment whereRelationship($value)
 * @method static Builder|Appointment whereState($value)
 * @method static Builder|Appointment whereUpdatedAt($value)
 * @property string $room_block
 * @property int $queue
 * @property int|null $approve_by
 * @property string|null $approve_date
 * @property-read \App\Models\User $creator
 * @property-read Collection<int, \App\Models\Deposit> $items
 * @property-read \App\Models\User|null $user
 * @method static Builder|Appointment whereApproveBy($value)
 * @method static Builder|Appointment whereApproveDate($value)
 * @method static Builder|Appointment whereQueue($value)
 * @method static Builder|Appointment whereRoomBlock($value)
 * @method static Builder|Appointment whereVisitDate($value)
 * @property-read Collection<int, \App\Models\Deposit> $items
 * @mixin Eloquent
 */
class Appointment extends Model
{
    use HasFactory;

    protected $table = 'appointments';
    protected $guarded = [];

    public function items(): MorphMany
    {
        return $this->morphMany(Deposit::class, 'depositable');
    }

    public function creator(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'approve_by', 'id');
    }
}
