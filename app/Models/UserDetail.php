<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class UserDetail extends Model
{
    protected $table = 'user_details';

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'user_id',
        'about_me',
        'address',
        'state',
        'country',
        'is_notify',
        'phone',
        'bio_page_url',
        'twitter_url',
        'fb_url',
        'manual_payment',
        'avatar'
    ];

    public function findByUserId($userId)
    {
        return self::where('user_id',$userId)->first();
    }
}
