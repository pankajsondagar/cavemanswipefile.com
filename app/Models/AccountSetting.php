<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class AccountSetting extends Model
{
    protected $table = 'account_settings';

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'admin_pic',
        'smtp_host',
        'smtp_port',
        'smtp_username',
        'smtp_password'
    ];
}
