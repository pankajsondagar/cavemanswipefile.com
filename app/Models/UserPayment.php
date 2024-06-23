<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserPayment extends Model
{
    protected $table = 'user_payments';

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'sponser_id',
        'is_confirm',
        'user_id',
        'leader_id',
        'type',
        'is_declined',
        'is_unapproved',
        'message'
    ];
    
    public function leader(): BelongsTo
    {
        return $this->belongsTo(PayPlanLeader::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function sponser(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
