<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class MemberSetting extends Model
{
    protected $table = 'member_settings';

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'default_pic',
        'max_pic_width',
        'max_pic_height',
        'max_mem_site_title',
        'max_mem_site_desc',
        'payplan_reg_option',
        'visitor_refferal',
        'enable_default_refferer',
        'default_refferer'
    ];

    public function findFirst()
    {
        return self::first();
    }
}
