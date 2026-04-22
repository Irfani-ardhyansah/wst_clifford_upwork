<?php
namespace App\Models;

class WhitePaper extends Article
{
    // ── STI: scope otomatis hanya ambil type = 'white-paper' ──────
    protected static function booted(): void
    {
        parent::booted();

        // Global scope: query dari WhitePaper::... otomatis filter type
        static::addGlobalScope('type', function ($query) {
            $query->where('articles.type', self::TYPE_WHITE_PAPER);
        });

        // Set type otomatis saat create
        static::creating(function (self $model) {
            $model->type = self::TYPE_WHITE_PAPER;
        });
    }

    public static function getTypeKey(): string
    {
        return self::TYPE_WHITE_PAPER;
    }

    // ── Scope spesifik White Paper ────────────────────────────────

    /** White paper yang punya PDF */
    public function scopeWithPdf($query)
    {
        return $query->whereNotNull('pdf_path');
    }

    /** White paper berdasarkan audience tertentu */
    public function scopeForAudience($query, string $audience)
    {
        return $query->whereJsonContains('target_audience', $audience);
    }
}