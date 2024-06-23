<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Banner extends Model
{
    protected $table = 'banners';

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'id',
        'image',
        'title',
        'note',
        'status',
        'filename',
        'size_id',
    ];

    public function size(): BelongsTo
    {
        return $this->belongsTo(BannerSize::class,'size_id');
    }
}
