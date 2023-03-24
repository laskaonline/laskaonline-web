<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Wartelsuspas
 *
 * @property int $id
 * @property string $name_wbp
 * @property string $bin_wbp
 * @property string $block_and_room
 * @property int $destination_phone
 * @property string $relationship
 * @property string $address
 * @property string $information
 * @property int $created_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|Wartelsuspas newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Wartelsuspas newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Wartelsuspas query()
 * @method static \Illuminate\Database\Eloquent\Builder|Wartelsuspas whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Wartelsuspas whereBinWbp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Wartelsuspas whereBlockAndRoom($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Wartelsuspas whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Wartelsuspas whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Wartelsuspas whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Wartelsuspas whereDestinationPhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Wartelsuspas whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Wartelsuspas whereInformation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Wartelsuspas whereNameWbp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Wartelsuspas whereRelationship($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Wartelsuspas whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Wartelsuspas extends Model
{
    use HasFactory;

    protected $table    = 'wartelsuspas';
    protected $guarded  = [];

    public function user()
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }
}
