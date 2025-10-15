<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserBoard extends Pivot
{
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function boards(): BelongsTo
    {
        return $this->belongsTo(Board::class);
    }
}
