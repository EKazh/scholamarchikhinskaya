<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SchoolClass extends Model
{
    protected $fillable = [
        'class_number'
    ];

    public function users()
    {
        return $this->belongsToMany(User::class, 'class_user', 'school_class_id', 'user_id')->withPivot('role');
    }

    public function teachers()
    {
        return $this->users()->wherePivot('role', 'teacher');
    }

    public function parents()
    {
        return $this->users()->wherePivot('role', 'parent');
    }

    public function chat()
    {
        return $this->hasOne(ClassChat::class);
    }
}
