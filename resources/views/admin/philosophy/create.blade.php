@extends('admin.layouts.app')

@section('content')
<div class="mb-6 flex items-center gap-4">
    <a href="{{ route('admin.philosophy.index') }}" class="p-2 text-gray-600 hover:bg-gray-100 rounded-lg">
        <span class="material-symbols-outlined">arrow_back</span>
    </a>
    <h1 class="text-2xl font-bold text-gray-800">Add Philosophy Card</h1>
</div>

<div class="bg-white border border-gray-200 rounded-xl p-6 max-w-2xl">
    <form action="{{ route('admin.philosophy.store') }}" method="POST" class="space-y-6">
        @csrf

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="space-y-1">
                <label class="block text-sm font-medium text-gray-700">Icon Name</label>
                <div class="text-xs text-gray-500 mb-1">Use Material Symbols names (e.g. spa, self_improvement)</div>
                <input type="text" name="icon" placeholder="e.g. water_drop" required class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500">
            </div>
            
            <div class="space-y-1">
                <label class="block text-sm font-medium text-gray-700">Title</label>
                <input type="text" name="title" required class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500">
            </div>
        </div>

        <div class="space-y-1">
            <label class="block text-sm font-medium text-gray-700">Description</label>
            <textarea name="description" rows="3" required class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500"></textarea>
        </div>

        <div class="flex items-center gap-6 pt-4 border-t border-gray-100">
            <label class="flex items-center gap-2 cursor-pointer">
                <input type="checkbox" name="is_active" value="1" checked class="w-5 h-5 text-green-600 rounded focus:ring-green-500">
                <span class="text-sm font-medium text-gray-700">Active</span>
            </label>
        </div>

        <div class="pt-4">
            <button type="submit" class="w-full md:w-auto px-6 py-2.5 bg-green-600 text-white font-medium rounded-lg hover:bg-green-700">
                Create Card
            </button>
        </div>
    </form>
</div>
@endsection
