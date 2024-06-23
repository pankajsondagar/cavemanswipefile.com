<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class TermCondition extends Model
{
    protected $table = 'term_conditions';

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'content',
    ];

    public function findFirst()
    {
        return self::first();
    }
}
