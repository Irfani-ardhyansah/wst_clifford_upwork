<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;

class EventAttendance extends Model
{
    use HasFactory;

    protected $fillable = [
        'event_id',
        'first_name',
        'last_name',
        'email',
        'company',
        'phone',
        'job_title',
        'registration_type',
        'notes',
        'status',
        'meeting_link',
        'time_preference',
        'token',
    ];

    protected $casts = [
        'time_preference' => 'datetime',
        'status'          => 'integer',
    ];

    // ── Konstanta ─────────────────────────────────────────────────
    const STATUS_PENDING   = 0;
    const STATUS_APPROVED  = 1;
    const STATUS_REJECTED  = 2;
    const STATUS_CANCELLED = 3;

    const TYPE_INTEREST   = 'interest';
    const TYPE_CONFIRMED  = 'confirmed';
    const TYPE_WAITLIST   = 'waitlist';

    // ── Boot: auto-generate token ─────────────────────────────────
    protected static function booted(): void
    {
        static::creating(function (self $model) {
            if (empty($model->token)) {
                $model->token = Str::random(32);
            }
        });
    }

    // ── Relasi ────────────────────────────────────────────────────

    public function event(): BelongsTo
    {
        return $this->belongsTo(Event::class);
    }

    // ── Helpers ───────────────────────────────────────────────────

    public function isPending(): bool
    {
        return $this->status === self::STATUS_PENDING;
    }

    public function isApproved(): bool
    {
        return $this->status === self::STATUS_APPROVED;
    }

    public function isRejected(): bool
    {
        return $this->status === self::STATUS_REJECTED;
    }

    public function isCancelled(): bool
    {
        return $this->status === self::STATUS_CANCELLED;
    }

    public function getStatusLabelAttribute(): string
    {
        return match ($this->status) {
            self::STATUS_PENDING   => 'Pending',
            self::STATUS_APPROVED  => 'Approved',
            self::STATUS_REJECTED  => 'Rejected',
            self::STATUS_CANCELLED => 'Cancelled',
            default                => 'Unknown',
        };
    }
}