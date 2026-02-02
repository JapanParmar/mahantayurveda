@extends('admin.layouts.app')

@section('content')
<div class="mb-6 flex items-center gap-4">
    <a href="{{ route('admin.products.index') }}" class="p-2 text-gray-600 hover:bg-gray-100 rounded-lg">
        <span class="material-symbols-outlined">arrow_back</span>
    </a>
    <h1 class="text-2xl font-bold text-gray-800">Edit Product</h1>
</div>

<div class="bg-white border border-gray-200 rounded-xl p-6 max-w-2xl">
    <form action="{{ route('admin.products.update', $product) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf
        @method('PUT')

        <div class="space-y-2">
            <label class="block text-sm font-medium text-gray-700">Main Product Image</label>
            @if($product->image)
            <div class="mb-2">
                <img src="{{ Storage::url($product->image) }}" class="h-24 w-24 object-cover rounded-lg border border-gray-200">
            </div>
            @endif
            <input type="file" name="image" class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-green-50 file:text-green-700 hover:file:bg-green-100">
        </div>

        <div class="space-y-2">
            <label class="block text-sm font-medium text-gray-700">Gallery Images</label>
            @if($product->images->count() > 0)
                <div class="grid grid-cols-4 gap-4 mb-4">
                    @foreach($product->images as $img)
                        <div class="relative group">
                            <img src="{{ Storage::url($img->image_path) }}" class="h-24 w-full object-cover rounded-lg border">
                            <button type="button" onclick="deleteImage({{ $img->id }})" class="absolute top-1 right-1 bg-red-500 text-white rounded-full p-1 opacity-0 group-hover:opacity-100 transition-opacity hover:bg-red-600">
                                <span class="material-symbols-outlined text-sm" style="font-size: 16px;">close</span>
                            </button>
                        </div>
                    @endforeach
                </div>
            @endif
            <input type="file" name="gallery_images[]" multiple class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-green-50 file:text-green-700 hover:file:bg-green-100">
            <p class="text-xs text-gray-500">Hold Ctrl/Cmd to select multiple images. New uploads will be appended.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="space-y-1">
                <label class="block text-sm font-medium text-gray-700">Product Name</label>
                <input type="text" name="name" value="{{ $product->name }}" required class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500">
            </div>
            
            <div class="space-y-1">
                <label class="block text-sm font-medium text-gray-700">Badge (Optional)</label>
                <input type="text" name="badge" value="{{ $product->badge }}" placeholder="e.g. Best Seller" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500">
            </div>
        </div>

        <div class="space-y-1">
            <label class="block text-sm font-medium text-gray-700">Description</label>
            <textarea name="description" rows="3" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500">{{ $product->description }}</textarea>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="space-y-1">
                <label class="block text-sm font-medium text-gray-700">Price (₹)</label>
                <input type="number" name="price" value="{{ $product->price }}" step="0.01" required class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500">
            </div>
            
            <div class="space-y-1">
                <label class="block text-sm font-medium text-gray-700">Sale Price (₹)</label>
                <input type="number" name="sale_price" value="{{ $product->sale_price }}" step="0.01" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500">
            </div>

            <div class="space-y-1">
                <label class="block text-sm font-medium text-gray-700">Rating (0-5)</label>
                <input type="number" name="rating" value="{{ $product->rating }}" step="0.1" max="5" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500">
            </div>
        </div>

        <div class="flex items-center gap-6 pt-4 border-t border-gray-100">
            <label class="flex items-center gap-2 cursor-pointer">
                <input type="checkbox" name="is_active" value="1" {{ $product->is_active ? 'checked' : '' }} class="w-5 h-5 text-green-600 rounded focus:ring-green-500">
                <span class="text-sm font-medium text-gray-700">Active</span>
            </label>
        </div>

        <div class="pt-4">
            <button type="submit" class="w-full md:w-auto px-6 py-2.5 bg-green-600 text-white font-medium rounded-lg hover:bg-green-700">
                Update Product
            </button>
        </div>
    </form>
</div>

<script>
    function deleteImage(imageId) {
        if(confirm('Are you sure you want to delete this image?')) {
            fetch(`/admin/product-image/${imageId}`, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            })
            .then(response => {
                if(response.ok) {
                    window.location.reload();
                } else {
                    alert('Error deleting image');
                }
            });
        }
    }
</script>
@endsection
