<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Board extends Model
{
    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    public function users()
    {
        return $this->belongsToMany(User::class)->using(UserBoard::class)->withPivot(['user_id','board_id']);
    }

    public function position()
    {
        return $this->hasMany(Position::class);
    }
}