@extends('admin.layouts.app')

@section('content')
<div class="flex items-center justify-between mb-6">
    <div>
        <h1 class="text-2xl font-bold text-gray-800">Testimonials</h1>
        <p class="text-gray-500">Manage customer reviews and stories</p>
    </div>
    <a href="{{ route('admin.testimonials.create') }}" class="px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 flex items-center gap-2">
        <span class="material-symbols-outlined">add</span>
        Add Testimonial
    </a>
</div>

<div class="bg-white border border-gray-200 rounded-xl overflow-hidden">
    <table class="w-full text-left">
        <thead class="bg-gray-50 border-b border-gray-200">
            <tr>
                <th class="px-6 py-4 text-xs font-semibold text-gray-500 uppercase">Customer</th>
                <th class="px-6 py-4 text-xs font-semibold text-gray-500 uppercase">Quote</th>
                <th class="px-6 py-4 text-xs font-semibold text-gray-500 uppercase">Rating</th>
                <th class="px-6 py-4 text-xs font-semibold text-gray-500 uppercase">Status</th>
                <th class="px-6 py-4 text-xs font-semibold text-gray-500 uppercase">Actions</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-100">
            @forelse($testimonials as $testimonial)
            <tr class="hover:bg-gray-50">
                <td class="px-6 py-4">
                    <div class="flex items-center gap-3">
                        @if($testimonial->avatar)
                        <img src="{{ Storage::url($testimonial->avatar) }}" class="w-10 h-10 rounded-full object-cover border border-gray-200" alt="{{ $testimonial->name }}">
                        @else
                        <div class="w-10 h-10 bg-green-100 rounded-full flex items-center justify-center text-green-700 font-bold">
                            {{ substr($testimonial->name, 0, 1) }}
                        </div>
                        @endif
                        <div>
                            <div class="font-medium text-gray-800">{{ $testimonial->name }}</div>
                            <div class="text-xs text-gray-500">{{ $testimonial->location }}</div>
                        </div>
                    </div>
                </td>
                <td class="px-6 py-4 max-w-xs">
                    <p class="text-sm text-gray-600 truncate">{{ $testimonial->quote }}</p>
                    @if($testimonial->treatment)
                    <span class="text-xs text-green-600 bg-green-50 px-2 py-0.5 rounded mt-1 inline-block">{{ $testimonial->treatment }}</span>
                    @endif
                </td>
                <td class="px-6 py-4">
                    <div class="flex items-center text-yellow-500">
                        <span class="font-bold mr-1 text-gray-700">{{ $testimonial->rating }}</span>
                        <span class="material-symbols-outlined text-sm">star</span>
                    </div>
                </td>
                <td class="px-6 py-4">
                    @if($testimonial->is_active)
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
                        <a href="{{ route('admin.testimonials.edit', $testimonial) }}" class="p-2 text-blue-600 hover:bg-blue-50 rounded">
                            <span class="material-symbols-outlined text-lg">edit</span>
                        </a>
                        <form action="{{ route('admin.testimonials.destroy', $testimonial) }}" method="POST" onsubmit="return confirm('Are you sure?');">
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
                    No testimonials found. Start by adding one.
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
