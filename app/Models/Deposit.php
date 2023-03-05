<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Deposit extends Model
{
    public function depositable(): MorphTo
    {
        return $this->morphTo('depositable');
    }
}
