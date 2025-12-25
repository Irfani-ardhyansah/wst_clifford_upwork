<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asset extends Model
{
    use HasFactory;

    protected $fillable = [
        'industry_id',
        'title',
        'slug',
        'category',
        'tags',
        'description',
        'video_path',
        'html_content',
        'image_path',
        'sort_order',
        'is_active',
        'is_featured',
    ];

    public function industry()
    {
        return $this->belongsTo(Industry::class);
    }
    
    public function views()
    {
        return $this->hasMany(AssetView::class);
    }
}
