<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GresbConsultation extends Model {
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'company',
        'phone',
        'portfolio_size',
        'interest',
        'time_preference',
        'notes',
        'status',
        'meeting_link'
    ];

    protected $casts = [
        'time_preference' => 'datetime',
    ];
}