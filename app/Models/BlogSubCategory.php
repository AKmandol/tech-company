<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class BlogSubCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'blog_category_id',
        'name',
        'slug',
        'description',
        'display_order',
        'status',
    ];

    protected function casts(): array
    {
        return [
            'display_order' => 'integer',
        ];
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(
            BlogCategory::class,
            'blog_category_id'
        );
    }

    public function posts(): HasMany
    {
        return $this->hasMany(
            BlogPost::class,
            'blog_sub_category_id'
        );
    }

    public function scopeActive(Builder $query): Builder
    {
        return $query->where('status', 'active');
    }
}
