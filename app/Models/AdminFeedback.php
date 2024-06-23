<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AdminFeedback extends Model
{
    protected $table = 'admin_feedbacks';

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'feedback_id',
        'reply',
    ];

    public function feedback(): BelongsTo
    {
        return $this->belongsTo(Feedback::class,'feedback_id');
    }
}
