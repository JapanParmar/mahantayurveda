@extends('admin.layouts.app')

@section('content')
<div class="flex items-center justify-between mb-6">
    <div>
        <h1 class="text-2xl font-bold text-gray-800">Video Stories</h1>
        <p class="text-gray-500">Manage video sections and stories</p>
    </div>
    <a href="{{ route('admin.video-stories.create') }}" class="px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 flex items-center gap-2">
        <span class="material-symbols-outlined">add</span>
        Add Video Story
    </a>
</div>

<div class="bg-white border border-gray-200 rounded-xl overflow-hidden">
    <table class="w-full text-left">
        <thead class="bg-gray-50 border-b border-gray-200">
            <tr>
                <th class="px-6 py-4 text-xs font-semibold text-gray-500 uppercase">Thumbnail</th>
                <th class="px-6 py-4 text-xs font-semibold text-gray-500 uppercase">Label & Heading</th>
                <th class="px-6 py-4 text-xs font-semibold text-gray-500 uppercase">Video URL</th>
                <th class="px-6 py-4 text-xs font-semibold text-gray-500 uppercase">Status</th>
                <th class="px-6 py-4 text-xs font-semibold text-gray-500 uppercase">Actions</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-100">
            @forelse($videoStories as $story)
            <tr class="hover:bg-gray-50">
                <td class="px-6 py-4">
                    @if($story->thumbnail)
                    <div class="relative w-24 h-14 rounded overflow-hidden">
                        <img src="{{ Storage::url($story->thumbnail) }}" class="w-full h-full object-cover" alt="Thumbnail">
                        <div class="absolute inset-0 bg-black/20 flex items-center justify-center">
                            <span class="material-symbols-outlined text-white text-lg">play_circle</span>
                        </div>
                    </div>
                    @else
                    <div class="w-24 h-14 bg-gray-100 rounded flex items-center justify-center text-gray-400">
                        <span class="material-symbols-outlined">videocam</span>
                    </div>
                    @endif
                </td>
                <td class="px-6 py-4">
                    <div class="text-xs text-green-600 font-medium uppercase tracking-wider mb-1">{{ $story->label }}</div>
                    <div class="font-medium text-gray-800">{{ $story->heading }}</div>
                    @if($story->is_reversed)
                    <span class="text-xs text-purple-600 bg-purple-50 px-2 py-0.5 rounded mt-1 inline-block">Reversed Layout</span>
                    @endif
                </td>
                <td class="px-6 py-4 max-w-xs">
                    <div class="text-sm text-gray-500 truncate">{{ $story->video_url }}</div>
                </td>
                <td class="px-6 py-4">
                    @if($story->is_active)
                    <span class="inline-flex items-center gap-1.5 py-0.5 px-2 rounded-full text-xs font-medium bg-green-100 text-green-800">
                        <span class="w-1.5 h-1.5 rounded-full bg-green-600"></span>
                        Active
                    </span>
                    @else
                    <span class="inline-flex items-center gap-1.5 py-0.5 px-2 rounded-full text-xs font-medium bg-gray-100 text-gray-800">
                        <span class="w-1.5 h-1.5 rounded-full bg-gray-600"></span>
                        Inactive
                    </span>
                    @endif
                </td>
                <td class="px-6 py-4">
                    <div class="flex gap-2">
                        <a href="{{ route('admin.video-stories.edit', $story) }}" class="p-2 text-blue-600 hover:bg-blue-50 rounded">
                            <span class="material-symbols-outlined text-lg">edit</span>
                        </a>
                        <form action="{{ route('admin.video-stories.destroy', $story) }}" method="POST" onsubmit="return confirm('Are you sure?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="p-2 text-red-600 hover:bg-red-50 rounded">
                                <span class="material-symbols-outlined text-lg">delete</span>
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" class="px-6 py-8 text-center text-gray-500">
                    No video stories found. Start by adding one.
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
