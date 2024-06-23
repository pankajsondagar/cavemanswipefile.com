<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class DigitalDownload extends Model
{
    protected $table = 'digital_downloads';

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'name',
        'path',
        'file_name',
        'payplan',
        'leader_id',
        'availabilty',
        'status',
        'description',
        'file_size',
        'image',
        'count'
    ];
}
