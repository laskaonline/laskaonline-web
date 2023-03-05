<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class QueueNumber extends Model
{
    use HasFactory;

    protected $table = 'queue_number';
    protected $guarded = [];

    public function items(): MorphMany
    {
        return $this->morphMany(Deposits::class, 'depositable');
    }
}
