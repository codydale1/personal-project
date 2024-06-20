<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Query\Builder as QueryBuilder;

class Applicant extends Model
{
    use HasFactory;

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public static array $status = ['hired', 'processing', 'failed'];
    public static array $category = ['software_engineer', 'quality_assurance', 'technical_director'];

    public static array $experience = ['entry', 'intermediate', 'senior'];

    public function scopeFilter(Builder | QueryBuilder $query, array $filters): Builder | QueryBuilder
    {
        return $query->when($filters['search'] ?? null, function($query, $search){
            $query->where(function ($query) use($search) {
                $query->where('first_name', 'like', '%' .$search . '%')
                    ->orWhere('last_name', 'like', '%' . $search . '%');
            });
        })->when($filters['status'] ?? null, function ($query, $status) {
            $query->where('status', '<=', request('status'));
        })->when($filters['experience'] ?? null, function ($query, $experience) {
            $query->where('experience', request('experience'));
        })->when($filters['category'] ?? null, function ($query, $category) {
            $query->where('category', request('category'));
        });

    }
}
