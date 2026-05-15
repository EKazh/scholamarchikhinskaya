<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Document extends Model
{
    protected $table = 'documents';

    protected $fillable = [
        'category_id',
        'title',
        'type',
        'path',
    ];

    //check type
    public function isValidType(): bool
    {
        return in_array($this->type, ['pdf', 'docx', 'txt', 'xlsx', 'xls']);
    }

    //category
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
