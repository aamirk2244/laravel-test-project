<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    protected $fillable = ['description', 'task_id'];

    public function task()
    {
        return $this->belongsTo(Task::class);
    }
}
