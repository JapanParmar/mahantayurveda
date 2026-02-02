<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\VideoStory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class VideoStoryController extends Controller
{
    public function index()
    {
        $videoStories = VideoStory::orderBy('order')->get();
        return view('admin.video-stories.index', compact('videoStories'));
    }

    public function create()
    {
        return view('admin.video-stories.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'label' => 'required|string|max:255',
            'heading' => 'required|string|max:255',
            'text' => 'required|string',
            'button_text' => 'nullable|string|max:100',
            'button_url' => 'nullable|string|max:255',
            'thumbnail' => 'nullable|image|max:2048',
            'video_url' => 'nullable|string|max:500',
            'video_file' => 'nullable|mimes:mp4,mov,ogg,qt|max:20480', // 20MB max default, increase in php.ini if needed
            'order' => 'nullable|integer',
            'is_reversed' => 'boolean',
            'is_active' => 'boolean',
        ]);

        if ($request->hasFile('thumbnail')) {
            $validated['thumbnail'] = $request->file('thumbnail')->store('video-stories/thumbnails', 'public');
        }

        if ($request->hasFile('video_file')) {
            $validated['video_path'] = $request->file('video_file')->store('video-stories/videos', 'public');
        }

        $validated['is_reversed'] = $request->has('is_reversed');
        $validated['is_active'] = $request->has('is_active');

        VideoStory::create($validated);

        return redirect()->route('admin.video-stories.index')->with('success', 'Video story created successfully!');
    }

    public function edit(VideoStory $videoStory)
    {
        return view('admin.video-stories.edit', compact('videoStory'));
    }

    public function update(Request $request, VideoStory $videoStory)
    {
        $validated = $request->validate([
            'label' => 'required|string|max:255',
            'heading' => 'required|string|max:255',
            'text' => 'required|string',
            'button_text' => 'nullable|string|max:100',
            'button_url' => 'nullable|string|max:255',
            'thumbnail' => 'nullable|image|max:2048',
            'video_url' => 'nullable|string|max:500',
            'video_file' => 'nullable|mimes:mp4,mov,ogg,qt|max:20480',
            'order' => 'nullable|integer',
            'is_reversed' => 'boolean',
            'is_active' => 'boolean',
        ]);

        if ($request->hasFile('thumbnail')) {
            if ($videoStory->thumbnail) {
                Storage::disk('public')->delete($videoStory->thumbnail);
            }
            $validated['thumbnail'] = $request->file('thumbnail')->store('video-stories/thumbnails', 'public');
        }

        if ($request->hasFile('video_file')) {
            if ($videoStory->video_path) {
                Storage::disk('public')->delete($videoStory->video_path);
            }
            $validated['video_path'] = $request->file('video_file')->store('video-stories/videos', 'public');
        }

        $validated['is_reversed'] = $request->has('is_reversed');
        $validated['is_active'] = $request->has('is_active');

        $videoStory->update($validated);

        return redirect()->route('admin.video-stories.index')->with('success', 'Video story updated successfully!');
    }

    public function destroy(VideoStory $videoStory)
    {
        if ($videoStory->thumbnail) {
            Storage::disk('public')->delete($videoStory->thumbnail);
        }
        if ($videoStory->video_path) {
            Storage::disk('public')->delete($videoStory->video_path);
        }
        $videoStory->delete();

        return redirect()->route('admin.video-stories.index')->with('success', 'Video story deleted successfully!');
    }
}
