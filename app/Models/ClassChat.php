<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClassChat extends Model
{
    protected $fillable = [
        'class_id',
    ];

    public function schoolClass()
    {
        return $this->belongsTo(SchoolClass::class);
    }

    public function messages()
    {
        return $this->hasMany(ClassChatMessage::class)->latest();
    }

    public function userCanAccess($user)
    {
        if ($user->role === 'director') {
            return true;
        }
        
        return $this->schoolClass->users()
            ->where('users.id', $user->id)
            ->whereIn('class_user.role', ['teacher', 'parent'])
            ->exists();
    }
}
