<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaskMessages extends Model
{
    use HasFactory;


    protected $table = "taskMessages";
    protected $primaryKey = "taskMessageId";

    protected $fillable = [
        'message',
        'taskId',
        'siteManagerId'
    ];


    public function task()
    {
        return $this->belongsTo(Task::class, 'taskId');
    }
}
