<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class UserConfirmation extends Model
{
    protected $table = 'user_confirmations';

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'email',
        'token',
        'plain_password',
    ];

    public function getRecord($token)
    {
        return self::where('token',$token)->first();
    }
}
