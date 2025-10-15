<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class UserBoard extends Model
{
    public function infoBoard(): HasMany
    {
        return $this->hasMany(Board::class);
    }
}
