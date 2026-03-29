@extends('admin.layouts.app')

@section('content')
<div class="mb-6">
    <div class="flex items-center gap-4 mb-2">
        <a href="{{ route('admin.orders.index') }}" class="text-gray-600 hover:text-gray-900">
            <span class="material-symbols-outlined">arrow_back</span>
        </a>
        <h1 class="text-2xl font-bold text-gray-800">Order Details</h1>
    </div>
    <p class="text-gray-600">Order #{{ $order->order_number }}</p>
</div>

<div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
    <!-- Left Column (2/3) -->
    <div class="lg:col-span-2 space-y-6">
        <!-- Order Items -->
        <div class="bg-white rounded-lg shadow-sm p-6">
            <h2 class="text-lg font-semibold text-gray-800 mb-4">Order Items</h2>
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead class="border-b border-gray-200">
                        <tr>
                            <th class="text-left py-3 text-sm font-medium text-gray-600">Product</th>
                            <th class="text-right py-3 text-sm font-medium text-gray-600">Price</th>
                            <th class="text-center py-3 text-sm font-medium text-gray-600">Qty</th>
                            <th class="text-right py-3 text-sm font-medium text-gray-600">Total</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @foreach($order->items as $item)
                        <tr>
                            <td class="py-4">
                                <div class="flex items-center gap-3">
                                    @if($item->product && $item->product->image)
                                    <img src="{{ asset('storage/' . $item->product->image) }}" alt="{{ $item->product_name }}" class="w-12 h-12 rounded object-cover">
                                    @else
                                    <div class="w-12 h-12 bg-gray-200 rounded flex items-center justify-center">
                                        <span class="material-symbols-outlined text-gray-400">inventory_2</span>
                                    </div>
                                    @endif
                                    <span class="font-medium text-gray-900">{{ $item->product_name }}</span>
                                </div>
                            </td>
                            <td class="py-4 text-right text-gray-700">₹{{ number_format($item->price, 2) }}</td>
                            <td class="py-4 text-center text-gray-700">{{ $item->quantity }}</td>
                            <td class="py-4 text-right font-medium text-gray-900">₹{{ number_format($item->total, 2) }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot class="border-t-2 border-gray-300">
                        <tr>
                            <td colspan="3" class="py-3 text-right font-medium text-gray-700">Subtotal:</td>
                            <td class="py-3 text-right font-medium text-gray-900">₹{{ number_format($order->subtotal, 2) }}</td>
                        </tr>
                        <tr>
                            <td colspan="3" class="py-2 text-right text-gray-600">Shipping:</td>
                            <td class="py-2 text-right text-gray-700">₹{{ number_format($order->shipping_cost, 2) }}</td>
                        </tr>
                        <tr class="text-lg font-bold">
                            <td colspan="3" class="py-3 text-right text-gray-800">Total:</td>
                            <td class="py-3 text-right text-green-600">{{ $order->formatted_total }}</td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>

        <!-- Customer Information -->
        <div class="bg-white rounded-lg shadow-sm p-6">
            <h2 class="text-lg font-semibold text-gray-800 mb-4">Customer Information</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="text-sm font-medium text-gray-600">Name</label>
                    <p class="text-gray-900">{{ $order->guest_name }}</p>
                </div>
                <div>
                    <label class="text-sm font-medium text-gray-600">Email</label>
                    <p class="text-gray-900">{{ $order->guest_email }}</p>
                </div>
                <div>
                    <label class="text-sm font-medium text-gray-600">Phone</label>
                    <p class="text-gray-900">{{ $order->guest_phone }}</p>
                </div>
            </div>
        </div>

        <!-- Shipping Address -->
        <div class="bg-white rounded-lg shadow-sm p-6">
            <h2 class="text-lg font-semibold text-gray-800 mb-4">Shipping Address</h2>
            @php
                $address = $order->shipping_address_array;
            @endphp
            <div class="text-gray-700 space-y-1">
                <p>{{ $address['address'] ?? '' }}</p>
                <p>{{ $address['city'] ?? '' }}, {{ $address['state'] ?? '' }} {{ $address['zip'] ?? '' }}</p>
            </div>
        </div>
    </div>

    <!-- Right Column (1/3) -->
    <div class="space-y-6">
        <!-- Order Status -->
        <div class="bg-white rounded-lg shadow-sm p-6">
            <h2 class="text-lg font-semibold text-gray-800 mb-4">Order Status</h2>
            <form method="POST" action="{{ route('admin.orders.updateStatus', $order->id) }}">
                @csrf
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Current Status</label>
                    <select name="status" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500">
                        <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>Pending</option>
                        <option value="processing" {{ $order->status == 'processing' ? 'selected' : '' }}>Processing</option>
                        <option value="shipped" {{ $order->status == 'shipped' ? 'selected' : '' }}>Shipped</option>
                        <option value="completed" {{ $order->status == 'completed' ? 'selected' : '' }}>Completed</option>
                        <option value="cancelled" {{ $order->status == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                    </select>
                </div>
                <button type="submit" class="w-full px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition">
                    Update Status
                </button>
            </form>

            <div class="mt-4 pt-4 border-t border-gray-200">
                <div class="flex items-center justify-between text-sm mb-2">
                    <span class="text-gray-600">Payment Status:</span>
                    <span class="px-2 py-1 text-xs font-semibold rounded-full {{ $order->payment_status_badge }}">
                        {{ ucfirst($order->payment_status) }}
                    </span>
                </div>
                @if($order->payment)
                <div class="text-xs text-gray-500 mt-2">
                    <p>Payment ID: {{ $order->payment->razorpay_payment_id }}</p>
                </div>
                @endif
            </div>
        </div>

        <!-- Tracking Information -->
        <div class="bg-white rounded-lg shadow-sm p-6">
            <h2 class="text-lg font-semibold text-gray-800 mb-4">Tracking Information</h2>
            <form method="POST" action="{{ route('admin.orders.updateTracking', $order->id) }}">
                @csrf
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Tracking Number</label>
                        <input type="text" name="tracking_number" value="{{ $order->tracking_number }}" placeholder="e.g., 1234567890" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Tracking URL</label>
                        <input type="url" name="tracking_url" value="{{ $order->tracking_url }}" placeholder="https://courier.com/track/..." class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Estimated Delivery</label>
                        <input type="date" name="estimated_delivery" value="{{ $order->estimated_delivery ? $order->estimated_delivery->format('Y-m-d') : '' }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500">
                    </div>
                </div>
                <button type="submit" class="w-full mt-4 px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">
                    Update Tracking
                </button>
            </form>

            @if($order->tracking_url)
            <a href="{{ $order->tracking_url }}" target="_blank" class="block mt-3 text-center text-sm text-blue-600 hover:text-blue-800">
                View tracking page →
            </a>
            @endif
        </div>

        <!-- Order Meta -->
        <div class="bg-white rounded-lg shadow-sm p-6">
            <h2 class="text-lg font-semibold text-gray-800 mb-4">Order Details</h2>
            <div class="space-y-3 text-sm">
                <div class="flex justify-between">
                    <span class="text-gray-600">Order Date:</span>
                    <span class="text-gray-900 font-medium">{{ $order->created_at->format('M d, Y H:i A') }}</span>
                </div>
                <div class="flex justify-between">
                    <span class="text-gray-600">Order Number:</span>
                    <span class="text-gray-900 font-medium">{{ $order->order_number }}</span>
                </div>
                @if($order->estimated_delivery)
                <div class="flex justify-between">
                    <span class="text-gray-600">Est. Delivery:</span>
                    <span class="text-gray-900 font-medium">{{ $order->estimated_delivery->format('M d, Y') }}</span>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
