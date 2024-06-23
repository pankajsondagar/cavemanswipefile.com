<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserMembership extends Model
{
    protected $table = 'user_memberships';

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'user_id',
        'leader_id',
        'is_current_plan',
    ];

    public function findByUserId($userId)
    {
        return self::with(['user','leader'])->where('user_id',$userId)->first();
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function leader(): BelongsTo
    {
        return $this->belongsTo(PayPlanLeader::class,'leader_id');
    }
}
