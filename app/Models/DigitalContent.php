<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class DigitalContent extends Model
{
    protected $table = 'digital_contents';

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'page_id',
        'name',
        'menu_name',
        'title',
        'content',
        'subtitle',
        'payplan',
        'availabilty',
        'status',
        'member_active',
        'member_inactive',
    ];
}
