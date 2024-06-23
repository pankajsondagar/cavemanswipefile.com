<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Feedback extends Model
{
    protected $table = 'feedbacks';

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'user_id',
        'subject',
        'message',
        'ip_address',
        'has_replied'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function list()
    {
        return self::with(['user.userDetail','feedbacks'])->latest()->simplePaginate(5);
    }

    public function findById($id)
    {
        return self::with(['user.userDetail','feedbacks'])->find($id);
    }

    public function feedbacks()
    {
        return $this->hasMany(AdminFeedback::class);
    }
}
