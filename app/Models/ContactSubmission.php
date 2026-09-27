<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ContactSubmission extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'company_name',
        'subject',
        'message',
        'request_type',
        'service_id',
        'admin_notes',
        'replied_at',
        'status',
    ];

    protected function casts(): array
    {
        return [
            'replied_at' => 'datetime',
        ];
    }

    public function service(): BelongsTo
    {
        return $this->belongsTo(Service::class);
    }

    public function scopeNew(Builder $query): Builder
    {
        return $query->where('status', 'new');
    }

    public function scopeDemoRequests(Builder $query): Builder
    {
        return $query->where('request_type', 'demo_request');
    }

    public function scopeContactRequests(Builder $query): Builder
    {
        return $query->where('request_type', 'contact');
    }
}
