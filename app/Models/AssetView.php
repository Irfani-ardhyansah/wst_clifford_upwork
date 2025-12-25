<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AssetView extends Model
{
    protected $fillable = [
        'asset_id',
        'user_id',
        'view_date',
    ];
}
