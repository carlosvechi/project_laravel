<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Step extends Model
{

    protected $fillable = [
        'task_id',
        'user_id',
        'descricao',
        'completed',
    ];

    public function task()
    {
        return $this->belongsTo(Task::class);
    }
}
