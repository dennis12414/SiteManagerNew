<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChatMessage extends Model
{
    use HasFactory;

    protected $table = "chat_messages";
    protected $primaryKey = "chatMessageId";

    protected $fillable = [
        'message',
        'name',
        'taskId',
        'siteManagerId'
    ];


    public function task()
    {
        return $this->belongsTo(Task::class, 'taskId');
    }
}
