<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Career extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'short_description',
        'description',
        'job_type',
        'location',
        'workplace_type',
        'vacancy_count',
        'deadline',
        'experience_min',
        'experience_max',
        'salary_min',
        'salary_max',
        'salary_currency',
        'display_order',
        'is_featured',
        'status',
    ];

    protected function casts(): array
    {
        return [
            'deadline' => 'date',
            'vacancy_count' => 'integer',
            'experience_min' => 'integer',
            'experience_max' => 'integer',
            'salary_min' => 'decimal:2',
            'salary_max' => 'decimal:2',
            'display_order' => 'integer',
            'is_featured' => 'boolean',
        ];
    }

    public function skills(): HasMany
    {
        return $this->hasMany(CareerSkill::class);
    }

    public function responsibilities(): HasMany
    {
        return $this->hasMany(CareerResponsibility::class);
    }

    public function requirements(): HasMany
    {
        return $this->hasMany(CareerRequirement::class);
    }

    public function media(): MorphMany
    {
        return $this->morphMany(Media::class, 'mediable');
    }

    public function scopePublished(Builder $query): Builder
    {
        return $query->where('status', 'published');
    }

    public function scopeOpen(Builder $query): Builder
    {
        return $query
            ->where('status', 'published')
            ->where(function ($query) {
                $query->whereNull('deadline')
                    ->orWhereDate('deadline', '>=', today());
            });
    }
}
