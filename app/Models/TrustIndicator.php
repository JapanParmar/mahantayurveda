<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TrustIndicator extends Model
{
    protected $fillable = [
        'icon',
        'text',
        'order',
        'is_active'
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    /**
     * Get active trust indicators ordered by position
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true)->orderBy('order');
    }
}
