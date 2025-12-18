<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Industry extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'description',
        'image_path',
        'link_url',
        'sort_order',
        'is_active',
    ];

    public function caseStudies(): HasMany
    {
        return $this->hasMany(CaseStudy::class);
    }
}