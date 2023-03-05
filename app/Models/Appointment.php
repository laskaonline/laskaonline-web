<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;

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