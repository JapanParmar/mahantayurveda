<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HeroSection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HeroController extends Controller
{
    public function edit()
    {
        $hero = HeroSection::first() ?? new HeroSection();
        return view('admin.hero.edit', compact('hero'));
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'badge_text' => 'nullable|string|max:100',
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string',
            'background_image' => 'nullable|image|max:4096',
            'button1_text' => 'nullable|string|max:100',
            'button1_url' => 'nullable|string|max:255',
            'button2_text' => 'nullable|string|max:100',
            'button2_url' => 'nullable|string|max:255',
        ]);

        $hero = HeroSection::first();

        if ($request->hasFile('background_image')) {
            if ($hero && $hero->background_image) {
                Storage::disk('public')->delete($hero->background_image);
            }
            $validated['background_image'] = $request->file('background_image')->store('hero', 'public');
        }

        $validated['is_active'] = true;

        if ($hero) {
            $hero->update($validated);
        } else {
            HeroSection::create($validated);
        }

        return redirect()->route('admin.hero.edit')->with('success', 'Hero section updated successfully!');
    }
}
