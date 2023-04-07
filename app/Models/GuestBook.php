<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\GuestBook
 *
 * @property int $id
 * @property string $name
 * @property string $origin
 * @property int $nik
 * @property string $address
 * @property string $email
 * @property string $phone
 * @property string $necessity
 * @property string $photo
 * @property int $created_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|GuestBook newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|GuestBook newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|GuestBook query()
 * @method static \Illuminate\Database\Eloquent\Builder|GuestBook whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GuestBook whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GuestBook whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GuestBook whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GuestBook whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GuestBook whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GuestBook whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GuestBook whereNecessity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GuestBook whereNik($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GuestBook whereOrigin($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GuestBook wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GuestBook wherePhoto($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GuestBook whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class GuestBook extends Model
{
    use HasFactory;

    protected $table    = 'guest_books';
    protected $guarded  = [];
    protected $casts    = [
        'nik' => 'string',
    ];
    protected $appends  = [
        'date',
    ];

    public function date(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->created_at->translatedFormat('Y-m-d H:i:s'),
        );
    }
}
