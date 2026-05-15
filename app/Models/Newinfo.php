<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Newinfo extends Model
{
    protected $fillable = [
        'news_title', 
        'news_description', 
        'news_image'
    ];
}
