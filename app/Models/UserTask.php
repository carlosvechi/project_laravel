<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserTask extends Pivot
{
   public function user(): BelongsTo 
   {
    return $this->belongsTo(User::class);
   }

   public function task(): BelongsTo 
   {
    return $this->belongsTo(Task::class);
   }
}


