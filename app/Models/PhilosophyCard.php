<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PhilosophyCard extends Model
{
    protected $fillable = [
        'icon',
        'title',
        'description',
        'order',
        'is_active'
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    /**
     * Get active philosophy cards ordered by position
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true)->orderBy('order');
    }
}
