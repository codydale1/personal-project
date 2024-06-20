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
    public static array $status = ['Hired' => 'hired', 
                                   'Processing' => 'processing', 
                                   'Failed' => 'failed'];
    public static array $category = ['Software Engineer' =>'software_engineer', 
                                     'Quality Assurance' => 'quality_assurance', 
                                     'Technical Director' => 'technical_director'];

    public static array $experience = ['Entry' => 'entry', 
                                       'Intermediate' => 'intermediate', 
                                       'Senior' => 'senior'];
    public function getStatusKey()
    {
        return array_search($this->status, self::$status);
    }   
    public function getCategoryKey()
    {
        return array_search($this->category, self::$category);
    }   
    public function getExperienceKey()
    {
        return array_search($this->experience, self::$experience);
    }

    public function scopeFilter(Builder | QueryBuilder $query, array $filters): Builder | QueryBuilder
    {
        return $query->when($filters['search'] ?? null, function($query, $search){
            $query->where(function ($query) use($search) {
                $query->where('first_name', 'like', '%' .$search . '%')
                    ->orWhere('last_name', 'like', '%' . $search . '%');
            });
        })->when($filters['status'] ?? null, function ($query, $status) {
            $query->where('status', '<=', request('status'));
        })->when($filters['min_salary'] ?? null, function ($query, $minSalary) {
            $query->where('salary', '>=', $minSalary);
        })->when($filters['max_salary'] ?? null, function ($query, $maxSalary) {
            $query->where('salary', '<=', request('max_salary'));
        })->when($filters['experience'] ?? null, function ($query, $experience) {
            $query->where('experience', request('experience'));
        })->when($filters['category'] ?? null, function ($query, $category) {
            $query->where('category', request('category'));
        })->when($filters['status'] ?? null, function ($query, $category) {
            $query->where('status', request('status'));
        });

    }
}
