<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Media extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'file_name',
        'file_path',
        'disk',
        'mime_type',
        'size',
        'collection',
        'mediable_type',
        'mediable_id',
        'alt_text',
        'caption',
        'display_order',
        'status',
    ];

    protected function casts(): array
    {
        return [
            'size' => 'integer',
            'display_order' => 'integer',
        ];
    }

    public function mediable(): MorphTo
    {
        return $this->morphTo();
    }
}
