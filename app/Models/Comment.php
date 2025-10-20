<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{

    protected $fillable = [
        'task_id',
        'user_id',
        'descricao'
    ];

    public function task()
    {
        return $this->belongsTo(Task::class);
    }
}
