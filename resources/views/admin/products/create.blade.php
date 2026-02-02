@extends('admin.layouts.app')

@section('content')
<div class="mb-6 flex items-center gap-4">
    <a href="{{ route('admin.products.index') }}" class="p-2 text-gray-600 hover:bg-gray-100 rounded-lg">
        <span class="material-symbols-outlined">arrow_back</span>
    </a>
    <h1 class="text-2xl font-bold text-gray-800">Add Product</h1>
</div>

<div class="bg-white border border-gray-200 rounded-xl p-6 max-w-2xl">
    <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf

        <div class="space-y-2">
            <label class="block text-sm font-medium text-gray-700">Product Image</label>
            <input type="file" name="image" class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-green-50 file:text-green-700 hover:file:bg-green-100">
        </div>

        <div class="space-y-2">
            <label class="block text-sm font-medium text-gray-700">Gallery Images (Multiple)</label>
            <input type="file" name="gallery_images[]" multiple class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-green-50 file:text-green-700 hover:file:bg-green-100">
            <p class="text-xs text-gray-500">Hold Ctrl/Cmd to select multiple images</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="space-y-1">
                <label class="block text-sm font-medium text-gray-700">Product Name</label>
                <input type="text" name="name" required class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500">
            </div>
            
            <div class="space-y-1">
                <label class="block text-sm font-medium text-gray-700">Badge (Optional)</label>
                <input type="text" name="badge" placeholder="e.g. Best Seller" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500">
            </div>
        </div>

        <div class="space-y-1">
            <label class="block text-sm font-medium text-gray-700">Description</label>
            <textarea name="description" rows="3" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500"></textarea>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="space-y-1">
                <label class="block text-sm font-medium text-gray-700">Price (₹)</label>
                <input type="number" name="price" step="0.01" required class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500">
            </div>
            
            <div class="space-y-1">
                <label class="block text-sm font-medium text-gray-700">Sale Price (₹)</label>
                <input type="number" name="sale_price" step="0.01" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500">
            </div>

            <div class="space-y-1">
                <label class="block text-sm font-medium text-gray-700">Rating (0-5)</label>
                <input type="number" name="rating" step="0.1" max="5" value="5" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500">
            </div>
        </div>

        <div class="flex items-center gap-6 pt-4 border-t border-gray-100">
            <label class="flex items-center gap-2 cursor-pointer">
                <input type="checkbox" name="is_active" value="1" checked class="w-5 h-5 text-green-600 rounded focus:ring-green-500">
                <span class="text-sm font-medium text-gray-700">Active</span>
            </label>
        </div>

        <div class="pt-4">
            <button type="submit" class="w-full md:w-auto px-6 py-2.5 bg-green-600 text-white font-medium rounded-lg hover:bg-green-700">
                Create Product
            </button>
        </div>
    </form>
</div>
@endsection
