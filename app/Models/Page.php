<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Page extends Model
{
    protected $table = 'pages';

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'slug',
        'title',
        'content',
        'url',
    ];
}
