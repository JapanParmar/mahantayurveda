<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VideoStory extends Model
{
    protected $fillable = [
        'label',
        'heading',
        'text',
        'button_text',
        'button_url',
        'thumbnail',
        'video_url',
        'video_path',
        'order',
        'is_reversed',
        'is_active'
    ];

    protected $casts = [
        'is_reversed' => 'boolean',
        'is_active' => 'boolean',
    ];

    public function scopeActive($query)
    {
        return $query->where('is_active', true)->orderBy('order');
    }
}
