<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HeroSection extends Model
{
    protected $fillable = [
        'badge_text',
        'title',
        'subtitle',
        'background_image',
        'button1_text',
        'button1_url',
        'button2_text',
        'button2_url',
        'is_active'
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    /**
     * Get the active hero section
     */
    public static function getActive()
    {
        return static::where('is_active', true)->first();
    }
}
