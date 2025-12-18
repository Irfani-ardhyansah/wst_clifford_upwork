<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CaseStudy extends Model
{
    use HasFactory;

    protected $fillable = [
        'industry_id',
        'title',
        'slug',
        'category',
        'impact_highlight',
        'image_path',
        'link_url',
        'sort_order',
        'is_featured',
        'is_active',
    ];

    public function industry(): BelongsTo
    {
        return $this->belongsTo(Industry::class);
    }
}