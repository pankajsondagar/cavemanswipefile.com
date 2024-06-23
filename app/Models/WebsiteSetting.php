<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class WebsiteSetting extends Model
{
    protected $table = 'website_settings';

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'site_title',
        'site_name',
        'site_url',
        'alias_name',
        'logo',
        'icon',
        'site_keywords',
        'site_desc',
        'from_name',
        'from_email',
        'reg_status',
        'logo_style',
        'member_website',
        'cooking_consent'
    ];
}
