<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CareerResponsibility extends Model
{
    use HasFactory;

    protected $fillable = [
        'career_id',
        'responsibility',
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
