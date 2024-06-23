<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class ResetPasswordToken extends Model
{
    protected $table = 'reset_password_tokens';

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'email',
        'token',
    ];

    public function getRecord($token)
    {
        return self::where('token',$token)->first();
    }
}
