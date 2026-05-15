<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    protected $table = 'feedback';

    protected $fillable = [
        'feedback_name',
        'feedback_email',
        'feedback_message'
    ];
}
