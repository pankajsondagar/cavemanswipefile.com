<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class PaymentOption extends Model
{
    protected $table = 'payment_options';

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'content',
        'title',
        'user_id'
    ];
}
