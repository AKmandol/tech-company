<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CareerRequirement extends Model
{
    use HasFactory;

    protected $fillable = [
        'career_id',
        'requirement',
        'display_order',
        'status',
    ];

    protected function casts(): array
    {
        return [
            'display_order' => 'integer',
        ];
    }

    public function career(): BelongsTo
    {
        return $this->belongsTo(Career::class);
    }
}
