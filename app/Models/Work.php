<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Work extends Model
{
    protected $fillable = [
        'type',
        'title',
        'year',
        'cover_url',
        'meta'
    ];
    protected $casts = [
        'meta' => 'array'
    ];

    public function swipes(): HasMany
    {
        return $this->hasMany(Swipe::class, 'work_id', 'id');
    }
}
