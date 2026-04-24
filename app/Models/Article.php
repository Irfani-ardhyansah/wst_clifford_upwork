<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $table = 'articles';

    protected static array $stiMap = [
        'article'     => Article::class,
        'white-paper' => WhitePaper::class,
    ];

    protected $fillable = [
        'author_id',
        'type',
        'title',
        'slug',
        'category',
        'excerpt',
        'source_type',
        'content',
        'pdf_path',
        'thumbnail',
        'target_audience',
        'status',
        'page_count',
        'published_at',
    ];

    protected $casts = [
        'target_audience' => 'array',
        'published_at' => 'datetime',
    ];

    const TYPE_ARTICLE     = 'article';
    const TYPE_WHITE_PAPER = 'white-paper';

    const STATUS_DRAFT     = 'draft';
    const STATUS_PUBLISHED = 'published';

    // ── STI Boot: otomatis set type & resolve class ───────────────
    protected static function booted(): void
    {
        // Set default type saat create dari subclass
        static::creating(function (self $model) {
            if (empty($model->type)) {
                $model->type = static::getTypeKey();
            }
        });
    }

    /**
     * Override newFromBuilder agar Eloquent otomatis
     * return instance class yang benar berdasarkan kolom 'type'
     */
    public function newFromBuilder($attributes = [], $connection = null): static
    {
        $attributes = (array) $attributes;
        $type  = $attributes['type'] ?? null;
        $class = static::$stiMap[$type] ?? static::class;

        /** @var static $model */
        $model = (new $class)->newInstance([], true);
        $model->setRawAttributes((array) $attributes, true);
        $model->setConnection($connection ?: $this->getConnectionName());
        $model->fireModelEvent('retrieved', false);

        return $model;
    }

    /**
     * Tiap subclass override method ini untuk return type string-nya
     */
    public static function getTypeKey(): string
    {
        return self::TYPE_ARTICLE;
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function views()
    {
        return $this->hasMany(AssetView::class);
    }

    // Scope
    public function scopePublished($query)
    {
        return $query->where('status', self::STATUS_PUBLISHED)
                        ->whereNotNull('published_at')
                        ->where('published_at', '<=', now());
    }

    public function scopeOfType($query, string $type)
    {
        return $query->where('type', $type);
    }

    // Helpers
    public function isPublished(): bool
    {
        return $this->status === self::STATUS_PUBLISHED;
    }

    public function isDraft(): bool
    {
        return $this->status === self::STATUS_DRAFT;
    }

    public function isWhitePaper(): bool
    {
        return $this->type === self::TYPE_WHITE_PAPER;
    }

    public function isArticle(): bool
    {
        return $this->type === self::TYPE_ARTICLE;
    }
}
