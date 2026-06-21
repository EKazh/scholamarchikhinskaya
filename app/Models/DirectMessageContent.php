<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;

class DirectMessageContent extends Model
{
    protected $fillable = [
        'direct_message_id',
        'user_id',
        'message',
        'class_ids', // [5, 7]
    ];

    protected $casts = [
        'class_ids' => 'array',
    ];

    public function chat()
    {
        return $this->belongsTo(DirectMessage::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getClassNumbersAttribute(): string
    {
        $classIds = $this->class_ids ?? [];
        if (empty($classIds)) return '';

        $classes = \App\Models\SchoolClass::whereIn('id', $classIds)
            ->pluck('class_number')
            ->join(', ');

        return $classes ?: '— классы не выбраны —';
    }
}
