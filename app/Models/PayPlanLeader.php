<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class PayPlanLeader extends Model
{
    protected $table = 'payplan_leaders';

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'type',
        'name',
        'description',
        'logo',
        'header_img',
        'reg_fee',
        'renewal_fee',
        'membership_interval',
        'member_as_vendor',
        'allow_inactive',
        'status',
        'personal_commission',
        'intial_commission',
        'renewal_commission',
        'complete_reward'
    ];

    public function getAllPlans()
    {
        return self::get();
    }

    public function getById($id)
    {
        return self::find($id);
    }
}
