<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    public function users() {
        return $this->belongsToMany(User::class)->using(UserTask::class)->withPivot(['user_id', 'task_id']);
    }
}
