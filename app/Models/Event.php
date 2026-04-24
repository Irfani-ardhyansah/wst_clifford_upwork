<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Carbon;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'description',
        'event_date',
        'event_time',
        'location',
        'is_virtual',
        'event_type',
        'attendance_status',
        'attendance_label',
        'image_path',
        'is_featured',
        'external_url',
        'status',
        'sort_order',
    ];

    protected $casts = [
        'event_date'  => 'date',
        'is_virtual'  => 'boolean',
        'is_featured' => 'boolean',
        'status'      => 'integer',
        'sort_order'  => 'integer',
    ];

    // ── Konstanta ─────────────────────────────────────────────────
    const STATUS_INACTIVE = 0;
    const STATUS_ACTIVE   = 1;
    const STATUS_PAST     = 2;

    const TYPE_CONFERENCE        = 'conference';
    const TYPE_WORKSHOP          = 'workshop';
    const TYPE_SPEAKING          = 'speaking_engagement';
    const TYPE_WEBINAR           = 'webinar';

    const ATTENDANCE_ATTENDING   = 'attending';
    const ATTENDANCE_PRESENTING  = 'presenting';
    const ATTENDANCE_SPEAKING    = 'speaking';

    // ── Relasi ────────────────────────────────────────────────────

    /** Semua registrasi untuk event ini */
    public function attendances(): HasMany
    {
        return $this->hasMany(EventAttendance::class);
    }

    /** Hanya yang sudah approved */
    public function approvedAttendances(): HasMany
    {
        return $this->attendances()->where('status', EventAttendance::STATUS_APPROVED);
    }

    // ── Scopes ────────────────────────────────────────────────────

    public function scopeActive($query)
    {
        return $query->where('status', self::STATUS_ACTIVE);
    }

    public function scopePast($query)
    {
        return $query->where('status', self::STATUS_PAST);
    }

    public function scopeUpcoming($query)
    {
        return $query->where('status', self::STATUS_ACTIVE)
                     ->where('event_date', '>=', now()->toDateString())
                     ->orderBy('event_date');
    }

    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }

    public function scopeOfType($query, string $type)
    {
        return $query->where('event_type', $type);
    }

    // ── Helpers ───────────────────────────────────────────────────

    public function isPast(): bool
    {
        return $this->status === self::STATUS_PAST
            || $this->event_date->isPast();
    }

    public function isUpcoming(): bool
    {
        return !$this->isPast() && $this->status === self::STATUS_ACTIVE;
    }

    public function getFormattedDateAttribute(): array
    {
        return [
            'day'   => $this->event_date->format('d'),
            'month' => strtoupper($this->event_date->format('M')),
            'year'  => $this->event_date->format('Y'),
        ];
    }

    public function getEventTypeLabelAttribute(): string
    {
        return match ($this->event_type) {
            self::TYPE_CONFERENCE => 'Conference',
            self::TYPE_WORKSHOP   => 'Workshop',
            self::TYPE_SPEAKING   => 'Speaking Engagement',
            self::TYPE_WEBINAR    => 'Webinar',
            default               => ucfirst($this->event_type),
        };
    }

    public function getTotalRegistrationsAttribute(): int
    {
        return $this->registrations()->count();
    }
}