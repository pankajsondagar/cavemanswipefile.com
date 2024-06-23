<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BannerSize extends Model
{
    protected $table = 'banner_sizes';

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'id',
        'title',
    ];
}
