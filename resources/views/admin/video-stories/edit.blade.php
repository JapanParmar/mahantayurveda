@extends('admin.layouts.app')

@section('content')
<div class="mb-6 flex items-center gap-4">
    <a href="{{ route('admin.video-stories.index') }}" class="p-2 text-gray-600 hover:bg-gray-100 rounded-lg">
        <span class="material-symbols-outlined">arrow_back</span>
    </a>
    <h1 class="text-2xl font-bold text-gray-800">Edit Video Story</h1>
</div>

<div class="bg-white border border-gray-200 rounded-xl p-6 max-w-2xl">
    <form action="{{ route('admin.video-stories.update', $videoStory) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf
        @method('PUT')

        <div class="space-y-2">
            <label class="block text-sm font-medium text-gray-700">Video Thumbnail</label>
            @if($videoStory->thumbnail)
            <div class="mb-2 w-48 h-28 relative rounded overflow-hidden">
                <img src="{{ Storage::url($videoStory->thumbnail) }}" class="w-full h-full object-cover">
            </div>
            @endif
            <input type="file" name="thumbnail" class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-green-50 file:text-green-700 hover:file:bg-green-100">
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="space-y-1">
                <label class="block text-sm font-medium text-gray-700">Section Label</label>
                <input type="text" name="label" value="{{ $videoStory->label }}" required class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500">
            </div>
            
            <div class="space-y-1">
                <label class="block text-sm font-medium text-gray-700">Heading</label>
                <input type="text" name="heading" value="{{ $videoStory->heading }}" required class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500">
            </div>
        </div>

        <div class="space-y-1">
            <label class="block text-sm font-medium text-gray-700">Description Text</label>
            <textarea name="text" rows="4" required class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500">{{ $videoStory->text }}</textarea>
        </div>

        <div class="space-y-1">
            <label class="block text-sm font-medium text-gray-700">Video URL (Embed Link)</label>
            <input type="text" name="video_url" value="{{ $videoStory->video_url }}" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500">
        </div>

        <div class="space-y-1">
            <label class="block text-sm font-medium text-gray-700">OR Upload Video File</label>
            @if($videoStory->video_path)
            <div class="test-xs text-green-600 mb-1 flex items-center gap-1">
                <span class="material-symbols-outlined text-sm">check_circle</span>
                Current: {{ basename($videoStory->video_path) }}
            </div>
            @endif
            <input type="file" name="video_file" accept="video/*" class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-green-50 file:text-green-700 hover:file:bg-green-100">
            <p class="text-xs text-gray-500">Supported: MP4, MOV, OGG (Max 20MB)</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="space-y-1">
                <label class="block text-sm font-medium text-gray-700">Button Text</label>
                <input type="text" name="button_text" value="{{ $videoStory->button_text }}" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500">
            </div>
            
            <div class="space-y-1">
                <label class="block text-sm font-medium text-gray-700">Button URL</label>
                <input type="text" name="button_url" value="{{ $videoStory->button_url }}" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500">
            </div>
        </div>

        <div class="flex items-center gap-6 pt-4 border-t border-gray-100">
            <label class="flex items-center gap-2 cursor-pointer">
                <input type="checkbox" name="is_active" value="1" {{ $videoStory->is_active ? 'checked' : '' }} class="w-5 h-5 text-green-600 rounded focus:ring-green-500">
                <span class="text-sm font-medium text-gray-700">Active</span>
            </label>
            
            <label class="flex items-center gap-2 cursor-pointer">
                <input type="checkbox" name="is_reversed" value="1" {{ $videoStory->is_reversed ? 'checked' : '' }} class="w-5 h-5 text-purple-600 rounded focus:ring-purple-500">
                <span class="text-sm font-medium text-gray-700">Reverse Layout (Image Right)</span>
            </label>
        </div>

        <div class="pt-4">
            <button type="submit" class="w-full md:w-auto px-6 py-2.5 bg-green-600 text-white font-medium rounded-lg hover:bg-green-700">
                Update Video Story
            </button>
        </div>
    </form>
</div>
@endsection
