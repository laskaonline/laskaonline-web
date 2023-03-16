<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;

/**
 * App\Models\Appointment
 *
 * @property int $id
 * @property string $name_wbp
 * @property string $case
 * @property string $relationship
 * @property string $date_deposit
 * @property string $problem perkara
 * @property string $photo_visitor
 * @property string $family_card
 * @property string|null $male_followers
 * @property string|null $female_followers
 * @property string|null $child_followers
 * @property string $state
 * @property int $created_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Deposit> $items
 * @property-read int|null $items_count
 * @method static \Illuminate\Database\Eloquent\Builder|Appointment newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Appointment newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Appointment query()
 * @method static \Illuminate\Database\Eloquent\Builder|Appointment whereCase($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Appointment whereChildFollowers($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Appointment whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Appointment whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Appointment whereDateDeposit($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Appointment whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Appointment whereFamilyCard($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Appointment whereFemaleFollowers($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Appointment whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Appointment whereMaleFollowers($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Appointment whereNameWbp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Appointment wherePhotoVisitor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Appointment whereProblem($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Appointment whereRelationship($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Appointment whereState($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Appointment whereUpdatedAt($value)
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Deposit> $items
 * @mixin \Eloquent
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
}
