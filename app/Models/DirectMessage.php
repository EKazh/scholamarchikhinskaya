<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DirectMessage extends Model
{
    protected $fillable = [];

    public function users()
    {
        return $this->belongsToMany(User::class, 'direct_message_user');
    }

    public function contents()
    {
        return $this->hasMany(DirectMessageContent::class);
    }
}
