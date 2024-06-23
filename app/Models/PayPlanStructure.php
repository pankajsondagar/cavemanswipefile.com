<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class PayPlanStructure extends Model
{
    protected $table = 'payplan_structures';

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'level_width',
        'level_depth',
        'symbol',
        'code',
        'name',
        'email',
        'reminder'
    ];
}
