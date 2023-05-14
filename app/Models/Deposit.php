<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

/**
 * App\Models\Deposit
 *
 * @property int $id
 * @property string $depositable_type
 * @property int $depositable_id
 * @property string $name
 * @property int $amount
 * @property string $photo
 * @property string|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read Model|\Eloquent $depositable
 * @method static \Illuminate\Database\Eloquent\Builder|Deposit newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Deposit newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Deposit query()
 * @method static \Illuminate\Database\Eloquent\Builder|Deposit whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Deposit whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Deposit whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Deposit whereDepositableId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Deposit whereDepositableType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Deposit whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Deposit whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Deposit wherePhoto($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Deposit whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Deposit extends Model
{
    protected $guarded = [];
    protected $casts   = [
        'depositable_id' => 'string'
    ];

    public function depositable(): MorphTo
    {
        return $this->morphTo('depositable');
    }
}
