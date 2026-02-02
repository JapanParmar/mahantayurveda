@extends('admin.layouts.app')

@section('content')
<div class="mb-6">
    <h1 class="text-2xl font-bold text-gray-800">Hero Section</h1>
    <p class="text-gray-500">Manage the main banner of your website</p>
</div>

<div class="bg-white border border-gray-200 rounded-xl p-6 max-w-4xl">
    <form action="{{ route('admin.hero.update') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf
        @method('PUT')

        <div class="space-y-2">
            <label class="block text-sm font-medium text-gray-700">Background Image</label>
            @if($hero->background_image)
            <div class="mb-2 w-full h-48 relative rounded overflow-hidden">
                <img src="{{ Storage::url($hero->background_image) }}" class="w-full h-full object-cover">
            </div>
            @endif
            <input type="file" name="background_image" class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-green-50 file:text-green-700 hover:file:bg-green-100">
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="space-y-1">
                <label class="block text-sm font-medium text-gray-700">Badge Text</label>
                <input type="text" name="badge_text" value="{{ $hero->badge_text }}" placeholder="e.g. Est. 1985" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500">
            </div>
            
            <div class="space-y-1">
                <label class="block text-sm font-medium text-gray-700">Main Title (Supports HTML)</label>
                <input type="text" name="title" value="{{ $hero->title }}" required class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500">
                <p class="text-xs text-gray-500 mt-1">Use &lt;br/&gt; for line breaks</p>
            </div>
        </div>

        <div class="space-y-1">
            <label class="block text-sm font-medium text-gray-700">Subtitle</label>
            <textarea name="subtitle" rows="3" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500">{{ $hero->subtitle }}</textarea>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="space-y-4 rounded-lg bg-gray-50 p-4">
                <h3 class="text-sm font-semibold text-gray-700">Primary Button</h3>
                <div class="space-y-1">
                    <label class="block text-xs font-medium text-gray-600">Text</label>
                    <input type="text" name="button1_text" value="{{ $hero->button1_text }}" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500">
                </div>
                <div class="space-y-1">
                    <label class="block text-xs font-medium text-gray-600">URL</label>
                    <input type="text" name="button1_url" value="{{ $hero->button1_url }}" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500">
                </div>
            </div>

            <div class="space-y-4 rounded-lg bg-gray-50 p-4">
                <h3 class="text-sm font-semibold text-gray-700">Secondary Button</h3>
                <div class="space-y-1">
                    <label class="block text-xs font-medium text-gray-600">Text</label>
                    <input type="text" name="button2_text" value="{{ $hero->button2_text }}" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500">
                </div>
                <div class="space-y-1">
                    <label class="block text-xs font-medium text-gray-600">URL</label>
                    <input type="text" name="button2_url" value="{{ $hero->button2_url }}" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500">
                </div>
            </div>
        </div>

        <div class="pt-4">
            <button type="submit" class="w-full md:w-auto px-6 py-2.5 bg-green-600 text-white font-medium rounded-lg hover:bg-green-700">
                Save Changes
            </button>
        </div>
    </form>
</div>
@endsection
