<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Swipe extends Model
{
    protected $fillable = [
        'user_id',
        'work_id',
        'direction'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function work(): BelongsTo
    {
        return $this->belongsTo(Work::class, 'work_id', 'id');
    }
}
