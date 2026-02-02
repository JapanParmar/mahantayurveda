@extends('admin.layouts.app')

@section('content')
<div class="mb-8">
    <h1 class="text-2xl font-bold text-gray-800">Dashboard</h1>
    <p class="text-gray-500">Overview of your website content</p>
</div>

<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
    <!-- Products Stat -->
    <div class="bg-white p-6 rounded-xl border border-gray-100 shadow-sm">
        <div class="flex items-center justify-between mb-4">
            <h3 class="text-gray-500 text-sm font-medium">Total Products</h3>
            <span class="p-2 bg-blue-50 text-blue-600 rounded-lg material-symbols-outlined">inventory_2</span>
        </div>
        <div class="text-3xl font-bold text-gray-800">{{ $stats['products'] }}</div>
    </div>

    <!-- Testimonials Stat -->
    <div class="bg-white p-6 rounded-xl border border-gray-100 shadow-sm">
        <div class="flex items-center justify-between mb-4">
            <h3 class="text-gray-500 text-sm font-medium">Testimonials</h3>
            <span class="p-2 bg-yellow-50 text-yellow-600 rounded-lg material-symbols-outlined">reviews</span>
        </div>
        <div class="text-3xl font-bold text-gray-800">{{ $stats['testimonials'] }}</div>
    </div>

    <!-- Video Stories Stat -->
    <div class="bg-white p-6 rounded-xl border border-gray-100 shadow-sm">
        <div class="flex items-center justify-between mb-4">
            <h3 class="text-gray-500 text-sm font-medium">Video Stories</h3>
            <span class="p-2 bg-purple-50 text-purple-600 rounded-lg material-symbols-outlined">movie</span>
        </div>
        <div class="text-3xl font-bold text-gray-800">{{ $stats['video_stories'] }}</div>
    </div>

    <!-- Philosophy Stat -->
    <div class="bg-white p-6 rounded-xl border border-gray-100 shadow-sm">
        <div class="flex items-center justify-between mb-4">
            <h3 class="text-gray-500 text-sm font-medium">Philosophy Cards</h3>
            <span class="p-2 bg-green-50 text-green-600 rounded-lg material-symbols-outlined">self_improvement</span>
        </div>
        <div class="text-3xl font-bold text-gray-800">{{ $stats['philosophy_cards'] }}</div>
    </div>

    <!-- Bookings Stat -->
    <div class="bg-white p-6 rounded-xl border border-gray-100 shadow-sm">
        <div class="flex items-center justify-between mb-4">
            <h3 class="text-gray-500 text-sm font-medium">New Bookings</h3>
            <span class="p-2 bg-red-50 text-red-600 rounded-lg material-symbols-outlined">event_available</span>
        </div>
        <div class="text-3xl font-bold text-gray-800">{{ $stats['bookings'] }}</div>
    </div>
</div>

<div class="mt-8 bg-white rounded-xl border border-gray-100 shadow-sm p-6">
    <h2 class="text-lg font-bold text-gray-800 mb-4">Quick Actions</h2>
    <div class="flex gap-4">
        <a href="{{ route('admin.products.create') }}" class="px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 flex items-center gap-2">
            <span class="material-symbols-outlined text-sm">add</span>
            Add Product
        </a>
        <a href="{{ route('admin.testimonials.create') }}" class="px-4 py-2 bg-white border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 flex items-center gap-2">
            <span class="material-symbols-outlined text-sm">add</span>
            Add Testimonial
        </a>
    </div>
</div>
@endsection
