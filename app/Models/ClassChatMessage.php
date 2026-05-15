<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClassChatMessage extends Model
{
    protected $fillable = [
        'class_chat_id', 
        'user_id', 
        'message'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function chat()
    {
        return $this->belongsTo(ClassChat::class, 'class_chat_id');
    }
}
