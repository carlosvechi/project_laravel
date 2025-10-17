<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    protected $fillable = [
        'board_id',
        'cod',
        'descricao',
        'status'
    ];


    public function boards() 
    {
        return $this->BelongsTo(Board::class);
    }

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }
}
