@extends('admin.layouts.app')

@section('content')
<div class="mb-6">
    <h1 class="text-2xl font-bold text-gray-800">Site Settings</h1>
    <p class="text-gray-500">Manage global website configuration</p>
</div>

<div class="bg-white border border-gray-200 rounded-xl p-6 max-w-4xl">
    <form action="{{ route('admin.settings.update') }}" method="POST" enctype="multipart/form-data" class="space-y-8">
        @csrf
        @method('PUT')

        <!-- General Settings -->
        <div class="space-y-6">
            <h2 class="text-lg font-bold text-gray-800 border-b pb-2">General Information</h2>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="space-y-2">
                    <label class="block text-sm font-medium text-gray-700">Website Logo</label>
                    @if(isset($settings['logo']))
                    <div class="mb-2 p-4 bg-gray-50 rounded border border-gray-200 inline-block">
                        <img src="{{ Storage::url($settings['logo']) }}" class="h-12 object-contain">
                    </div>
                    @endif
                    <input type="file" name="logo" class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-green-50 file:text-green-700 hover:file:bg-green-100">
                </div>

                <div class="space-y-1">
                    <label class="block text-sm font-medium text-gray-700">Site Name</label>
                    <input type="text" name="site_name" value="{{ $settings['site_name'] ?? '' }}" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500">
                </div>
            </div>

            <div class="space-y-1">
                <label class="block text-sm font-medium text-gray-700">Footer About Text</label>
                <textarea name="footer_text" rows="3" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500">{{ $settings['footer_text'] ?? '' }}</textarea>
            </div>
        </div>

        <!-- Contact Information -->
        <div class="space-y-6">
            <h2 class="text-lg font-bold text-gray-800 border-b pb-2">Contact Information</h2>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="space-y-1">
                    <label class="block text-sm font-medium text-gray-700">Phone Number</label>
                    <input type="text" name="phone" value="{{ $settings['phone'] ?? '' }}" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500">
                </div>
                
                <div class="space-y-1">
                    <label class="block text-sm font-medium text-gray-700">Email Address</label>
                    <input type="email" name="email" value="{{ $settings['email'] ?? '' }}" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500">
                </div>
            </div>
            
            <div class="space-y-1">
                <label class="block text-sm font-medium text-gray-700">Clinic Address</label>
                <textarea name="address" rows="2" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500">{{ $settings['address'] ?? '' }}</textarea>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="space-y-1">
                    <label class="block text-sm font-medium text-gray-700">Clinic Name (for map section)</label>
                    <input type="text" name="clinic_name" value="{{ $settings['clinic_name'] ?? '' }}" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500">
                </div>
                
                <div class="space-y-1">
                    <label class="block text-sm font-medium text-gray-700">Clinic Hours</label>
                    <input type="text" name="clinic_hours" value="{{ $settings['clinic_hours'] ?? '' }}" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500">
                </div>
            </div>

            <div class="space-y-1">
                <label class="block text-sm font-medium text-gray-700">Google Map Embed URL</label>
                <input type="text" name="map_embed_url" value="{{ $settings['map_embed_url'] ?? '' }}" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500">
                <p class="text-xs text-gray-500 mt-1">Paste the 'src' value from Google Maps Embed HTML</p>
            </div>
        </div>

        <!-- Social Media -->
        <div class="space-y-6">
            <h2 class="text-lg font-bold text-gray-800 border-b pb-2">Social Media</h2>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="space-y-1">
                    <label class="block text-sm font-medium text-gray-700">Instagram URL</label>
                    <input type="url" name="instagram_url" value="{{ $settings['instagram_url'] ?? '' }}" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500">
                </div>
                
                <div class="space-y-1">
                    <label class="block text-sm font-medium text-gray-700">Facebook URL</label>
                    <input type="url" name="facebook_url" value="{{ $settings['facebook_url'] ?? '' }}" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500">
                </div>

                <div class="space-y-1">
                    <label class="block text-sm font-medium text-gray-700">YouTube URL</label>
                    <input type="url" name="youtube_url" value="{{ $settings['youtube_url'] ?? '' }}" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500">
                </div>
            </div>
        </div>

        <div class="pt-4">
            <button type="submit" class="w-full md:w-auto px-6 py-2.5 bg-green-600 text-white font-medium rounded-lg hover:bg-green-700">
                Save Settings
            </button>
        </div>
    </form>
</div>
@endsection
