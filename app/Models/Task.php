<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{

    protected $fillable = [
        'title',
        'descricao',
        'asign_user',
        'position_id',
        'users_id',
        'dt_start',
        'dt_end'
    ];

    


    public function users() {
        return $this->belongsToMany(User::class)->using(UserTask::class)->withPivot(['user_id', 'task_id']);
    }

     public function attaches() 
    {
        return $this->hasMany(Attach::class);
    }

    public function comments() 
    {
        return $this->hasMany(Comment::class);
    }

    public function steps()
    {
        return $this->hasMany(Step::class);
    }
}
