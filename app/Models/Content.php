<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    protected $table = 'contents';

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'slug',
        'title',
        'content'
    ];

    public function findBySlug($slug)
    {
        return self::where('slug',$slug)->first();
    }
}
