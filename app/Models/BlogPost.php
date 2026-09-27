<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class BlogPost extends Model
{
    use HasFactory;

    protected $fillable = [
        'blog_category_id',
        'blog_sub_category_id',
        'author_id',
        'title',
        'slug',
        'excerpt',
        'content',
        'published_at',
        'reading_time',
        'views',
        'is_recommended',
        'is_latest',
        'is_featured',
        'status',
    ];

    protected function casts(): array
    {
        return [
            'published_at' => 'datetime',
            'reading_time' => 'integer',
            'views' => 'integer',
            'is_recommended' => 'boolean',
            'is_latest' => 'boolean',
            'is_featured' => 'boolean',
        ];
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(
            BlogCategory::class,
            'blog_category_id'
        );
    }

    public function subCategory(): BelongsTo
    {
        return $this->belongsTo(
            BlogSubCategory::class,
            'blog_sub_category_id'
        );
    }

    public function author(): BelongsTo
    {
        return $this->belongsTo(
            User::class,
            'author_id'
        );
    }

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(
            BlogTag::class,
            'blog_post_tag',
            'blog_post_id',
            'blog_tag_id'
        )->withPivot([
            'status',
        ])->withTimestamps();
    }

    public function media(): MorphMany
    {
        return $this->morphMany(Media::class, 'mediable');
    }

    public function scopePublished(Builder $query): Builder
    {
        return $query
            ->where('status', 'published')
            ->where(function ($query) {
                $query->whereNull('published_at')
                    ->orWhere('published_at', '<=', now());
            });
    }

    public function scopeFeatured(Builder $query): Builder
    {
        return $query->where('is_featured', true);
    }

    public function scopeRecommended(Builder $query): Builder
    {
        return $query->where('is_recommended', true);
    }

    public function scopeLatestNews(Builder $query): Builder
    {
        return $query->where('is_latest', true);
    }
}
