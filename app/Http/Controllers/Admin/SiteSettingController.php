<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SiteSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SiteSettingController extends Controller
{
    public function edit()
    {
        $settings = SiteSetting::all()->pluck('value', 'key')->toArray();
        return view('admin.settings.edit', compact('settings'));
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'site_name' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:50',
            'email' => 'nullable|email|max:255',
            'address' => 'nullable|string',
            'footer_text' => 'nullable|string',
            'instagram_url' => 'nullable|url',
            'facebook_url' => 'nullable|url',
            'youtube_url' => 'nullable|url',
            'map_embed_url' => 'nullable|string',
            'clinic_name' => 'nullable|string|max:255',
            'clinic_hours' => 'nullable|string|max:255',
            'logo' => 'nullable|image|max:2048',
        ]);

        // Handle logo upload
        if ($request->hasFile('logo')) {
            $oldLogo = SiteSetting::get('logo');
            if ($oldLogo && Storage::disk('public')->exists($oldLogo)) {
                Storage::disk('public')->delete($oldLogo);
            }
            $logoPath = $request->file('logo')->store('settings', 'public');
            SiteSetting::set('logo', $logoPath, 'image', 'general');
        }

        // Save text settings
        $textSettings = [
            'site_name', 'phone', 'email', 'address', 'footer_text',
            'instagram_url', 'facebook_url', 'youtube_url', 
            'map_embed_url', 'clinic_name', 'clinic_hours'
        ];

        foreach ($textSettings as $key) {
            if (isset($validated[$key])) {
                $group = in_array($key, ['instagram_url', 'facebook_url', 'youtube_url']) ? 'social' : 'general';
                SiteSetting::set($key, $validated[$key], 'text', $group);
            }
        }

        return redirect()->route('admin.settings.edit')->with('success', 'Settings updated successfully!');
    }
}
