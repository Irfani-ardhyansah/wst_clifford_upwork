<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Industry extends Model
{
    use HasFactory;

    protected $fillable = [
        'parent_id',
        'title',
        'slug',
        'description',
        'image_path',
        'is_featured',
        'sort_order',
        'is_active',
    ];

    protected $casts = [
        'is_featured' => 'boolean',
        'is_active'   => 'integer',
        'sort_order'  => 'integer',
    ];

    // ── Konstanta status ──────────────────────────────────────────
    const STATUS_INACTIVE    = 0;
    const STATUS_ACTIVE      = 1;
    const STATUS_COMING_SOON = 2;

    // ── Relasi Parent–Child ───────────────────────────────────────

    /** Industry induk */
    public function parent(): BelongsTo
    {
        return $this->belongsTo(Industry::class, 'parent_id');
    }

    /** Industry anak langsung */
    public function children(): HasMany
    {
        return $this->hasMany(Industry::class, 'parent_id')
                    ->orderBy('sort_order');
    }

    /** Semua keturunan (rekursif) */
    public function allChildren(): HasMany
    {
        return $this->hasMany(Industry::class, 'parent_id')
                    ->where('is_active', self::STATUS_ACTIVE)
                    ->orderBy('sort_order');
        // ← HAPUS ->with('allChildren') dari sini
    }

    // ── Relasi ke model lain ──────────────────────────────────────

    public function caseStudies(): HasMany
    {
        return $this->hasMany(CaseStudy::class);
    }

    public function assets(): HasMany
    {
        return $this->hasMany(Asset::class);
    }

    // ── Scope query ───────────────────────────────────────────────

    /** Hanya industry level atas (tidak punya parent) */
    public function scopeRoots($query)
    {
        return $query->whereNull('parent_id');
    }

    /** Hanya industry yang aktif */
    public function scopeActive($query)
    {
        return $query->where('is_active', self::STATUS_ACTIVE);
    }

    /** Hanya industry yang featured */
    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }

    public function scopeChildren($query)
    {
        return $query->where('parent_id', '!=', null);
    }

    // ── Helper ────────────────────────────────────────────────────

    public function isRoot(): bool
    {
        return is_null($this->parent_id);
    }

    public function hasChildren(): bool
    {
        return $this->children()->exists();
    }

    public function isActive(): bool
    {
        return $this->is_active === self::STATUS_ACTIVE;
    }

    public function isComingSoon(): bool
    {
        return $this->is_active === self::STATUS_COMING_SOON;
    }
}