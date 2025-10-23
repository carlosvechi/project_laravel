<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attach extends Model
{

    protected $fillable = [
        'task_id',
        'user_id',
        'file_url'
    ];

    public function task()
    {
        return $this->belongsTo(Task::class);
    }

    public function user()
    {
        return $this->belongsTo(Task::class);
    }

    protected $table = 'attaches';
}
