@extends('layouts.app')

@section('title', 'Shopping Cart')

@section('content')
<section class="section bg-light" style="min-height: 80vh; padding-top: 4rem;">
    <div class="container">
        <div class="header-group" style="margin-bottom: 3rem; text-align: center;">
            <h1 class="section-title" style="font-size: 3rem; margin-bottom: 0.5rem;">Your Daily Rituals</h1>
            <p class="text-muted" style="font-size: 1.125rem;">Review your selection of holistic wellness.</p>
        </div>

        @if($items->count() > 0)
        <div class="cart-layout">
            <!-- Cart Items List -->
            <div class="cart-container bg-white shadow-sm">
                <!-- Desktop Header -->
                <div class="cart-header">
                    <span class="header-label">Product</span>
                    <span class="header-label text-center">Quantity</span>
                    <span class="header-label text-right">Total</span>
                    <span></span>
                </div>
                
                <div class="cart-items-list">
                    @foreach($items as $item)
                    <div class="cart-item" id="item-{{ $item->id }}">
                        <div class="item-product">
                            <div class="item-image-wrapper">
                                <img src="{{ $item->product->image ? Storage::url($item->product->image) : asset('images/placeholder.png') }}" alt="{{ $item->product->name }}" class="item-image">
                            </div>
                            <div class="item-details">
                                <a href="{{ route('products.show', $item->product->id) }}" class="item-title-link">
                                    <h3 class="item-title">{{ $item->product->name }}</h3>
                                </a>
                                <div class="item-meta">
                                    <span class="item-price-single">₹{{ $item->price }}</span>
                                </div>
                            </div>
                        </div>
                        
                        <div class="item-quantity">
                             <div class="quantity-pill">
                                <button type="button" class="qty-btn" onclick="updateQty({{ $item->id }}, -1)">
                                    <span class="material-symbols-outlined">remove</span>
                                </button>
                                <input type="number" id="qty-{{ $item->id }}" value="{{ $item->quantity }}" readonly>
                                <button type="button" class="qty-btn" onclick="updateQty({{ $item->id }}, 1)">
                                    <span class="material-symbols-outlined">add</span>
                                </button>
                            </div>
                        </div>
                        
                        <div class="item-total" id="total-{{ $item->id }}">
                            ₹{{ $item->price * $item->quantity }}
                        </div>
                        
                        <div class="item-actions">
                            <a href="{{ route('cart.remove', $item->id) }}" class="delete-btn" title="Remove item">
                                <span class="material-symbols-outlined">close</span>
                            </a>
                        </div>
                    </div>
                    @endforeach
                </div>
                
                <div class="cart-footer">
                    <a href="{{ route('products.index') }}" class="continue-shopping">
                        <span class="material-symbols-outlined">arrow_back</span> Continue Shopping
                    </a>
                </div>
            </div>

            <!-- Summary Sidebar -->
            <div class="cart-sidebar">
                <div class="summary-card bg-white shadow-sm">
                    <h3 class="summary-title">Order Summary</h3>
                    
                    <div class="summary-rows">
                        <div class="summary-row">
                            <span class="label">Subtotal</span>
                            <span class="value" id="cart-subtotal">₹{{ $subtotal }}</span>
                        </div>
                        <div class="summary-row">
                            <span class="label">Shipping Estimate</span>
                            <span class="value text-muted">Calculated at checkout</span>
                        </div>
                    </div>
                    
                    <div class="divider"></div>
                    
                    <div class="summary-row total">
                        <span class="label">Total</span>
                        <span class="value" id="cart-total">₹{{ $subtotal }}</span>
                    </div>
                    
                    <div class="summary-actions">
                         <a href="{{ route('checkout.index') }}" class="btn btn-primary btn-block btn-lg">
                            Proceed to Checkout
                        </a>
                        <!-- <p class="secure-text">
                            <span class="material-symbols-outlined" style="font-size: 1rem;">lock</span> Secure Checkout
                        </p> -->
                    </div>
                </div>
                
                <div class="trust-badges">
                    <div class="badge-item">
                        <span class="material-symbols-outlined">local_shipping</span>
                        <span>Free shipping over ₹999</span>
                    </div>
                    <div class="badge-item">
                        <span class="material-symbols-outlined">verified_user</span>
                        <span>Official Guarantee</span>
                    </div>
                </div>
            </div>
        </div>
        @else
        <div class="empty-cart-state">
            <div class="empty-icon-wrapper">
                <span class="material-symbols-outlined">shopping_bag</span>
            </div>
            <h2 class="empty-title">Your cart is feeling light</h2>
            <p class="empty-text">Explore our collection of natural remedies to find your balance.</p>
            <a href="{{ route('products.index') }}" class="btn btn-primary btn-lg">
                Explore The Collection
            </a>
        </div>
        @endif
    </div>
</section>

<style>
    /* Styling Variables locally to ensure premium feel */
    :root {
        --c-border: #e5e7eb;
        --c-text-main: #1f2937;
        --c-text-muted: #6b7280;
        --c-bg-light: #f9fafb;
    }

    .bg-light { background-color: #f8f8f6; } /* Custom soft sand color */
    .bg-white { background-color: #ffffff; }
    .shadow-sm { box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.05), 0 1px 2px 0 rgba(0, 0, 0, 0.03); }
    
    .cart-layout {
        display: grid;
        grid-template-columns: 1fr;
        gap: 2rem;
        align-items: start;
    }
    
    @media(min-width: 1024px) {
        .cart-layout {
            grid-template-columns: 2fr 1fr;
            gap: 3rem;
        }
    }

    /* Cart Container */
    .cart-container {
        border-radius: 1rem;
        border: 1px solid var(--c-border);
        overflow: hidden;
    }

    .cart-header {
        display: none; /* Hidden on mobile */
        grid-template-columns: 5fr 2fr 2fr 1fr; /* Adjusted ratios */
        padding: 1.5rem 2rem;
        background-color: #fafafa;
        border-bottom: 1px solid var(--c-border);
        font-weight: 600;
        color: var(--c-text-muted);
        text-transform: uppercase;
        font-size: 0.75rem;
        letter-spacing: 0.05em;
    }
    
    @media(min-width: 768px) {
        .cart-header { display: grid; }
    }

    .cart-item {
        display: grid;
        grid-template-columns: 1fr;
        gap: 1.5rem;
        padding: 2rem;
        border-bottom: 1px solid var(--c-border);
        align-items: center;
        position: relative;
    }

    @media(min-width: 768px) {
        .cart-item {
            grid-template-columns: 5fr 2fr 2fr 1fr;
            padding: 1.5rem 2rem;
            gap: 1rem;
        }
    }

    .item-product {
        display: flex;
        gap: 1.5rem;
        align-items: center;
    }

    .item-image-wrapper {
        width: 100px;
        height: 100px;
        flex-shrink: 0;
        border-radius: 0.75rem;
        overflow: hidden;
        background-color: #f3f4f6;
        border: 1px solid #eee;
    }

    .item-image {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .item-details {
        display: flex;
        flex-direction: column;
        gap: 0.25rem;
    }

    .item-title {
        font-family: 'Manrope', sans-serif;
        font-size: 1.125rem;
        font-weight: 700;
        color: var(--c-text-main);
        transition: color 0.2s;
    }

    .item-title-link:hover .item-title {
        color: var(--primary);
    }

    .item-price-single {
        color: var(--c-text-muted);
        font-size: 0.9rem;
    }

    /* Quantity Pill */
    .quantity-pill {
        display: inline-flex;
        align-items: center;
        background-color: white;
        border: 1px solid var(--c-border);
        border-radius: 9999px;
        padding: 0.25rem;
        width: fit-content;
    }

    .qty-btn {
        width: 2rem;
        height: 2rem;
        border-radius: 50%;
        border: none;
        background: transparent;
        color: var(--c-text-main);
        display: flex;
        align-items: center;
        justify-content: center;
        transition: background 0.2s;
        cursor: pointer;
    }
    
    .qty-btn:hover {
        background-color: #f3f4f6;
    }
    
    .qty-btn span {
        font-size: 1rem;
    }

    .quantity-pill input {
        width: 2.5rem;
        text-align: center;
        border: none;
        font-weight: 600;
        font-size: 1rem;
        background: transparent;
        color: var(--c-text-main);
        -moz-appearance: textfield;
    }
    .quantity-pill input::-webkit-outer-spin-button,
    .quantity-pill input::-webkit-inner-spin-button {
         -webkit-appearance: none; margin: 0;
    }

    .item-total {
        font-weight: 700;
        font-size: 1.125rem;
        color: var(--c-text-main);
    }
    
    @media(min-width: 768px) {
        .item-total { text-align: right; }
    }

    .delete-btn {
        color: #9ca3af;
        cursor: pointer;
        transition: color 0.2s;
        display: flex;
        justify-content: flex-end;
    }
    
    .delete-btn:hover {
        color: #ef4444;
    }

    .cart-footer {
        padding: 1.5rem 2rem;
        background-color: #fafafa;
    }

    .continue-shopping {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        font-weight: 600;
        color: var(--c-text-main);
        font-size: 0.875rem;
        transition: color 0.2s;
    }
    .continue-shopping:hover {
        color: var(--primary);
    }

    /* Summary Sidebar */
    .summary-card {
        padding: 2rem;
        border-radius: 1rem;
        border: 1px solid var(--c-border);
    }

    .summary-title {
        font-size: 1.5rem;
        font-weight: 700;
        margin-bottom: 2rem;
        padding-bottom: 1rem;
        border-bottom: 1px solid var(--c-border);
    }

    .summary-rows {
        display: flex;
        flex-direction: column;
        gap: 1rem;
        margin-bottom: 1.5rem;
    }

    .summary-row {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .summary-row .label {
        color: var(--c-text-muted);
        font-size: 1rem;
    }
    
    .summary-row .value {
        font-weight: 600;
        color: var(--c-text-main);
    }
    
    .text-muted { color: #9ca3af !important; font-weight: normal !important; font-size: 0.875rem !important;}

    .divider {
        height: 1px;
        background-color: var(--c-border);
        margin: 1.5rem 0;
    }

    .summary-row.total .label {
        color: var(--c-text-main);
        font-size: 1.25rem;
        font-weight: 700;
    }
    
    .summary-row.total .value {
        color: var(--primary);
        font-size: 1.5rem;
        font-weight: 800;
    }

    .btn-lg {
        width: 100%;
        padding: 1rem;
        font-size: 1rem;
        border-radius: 0.75rem;
        display: flex;
        justify-content: center;
    }

    .trust-badges {
        margin-top: 2rem;
        display: flex;
        flex-direction: column;
        gap: 1rem;
    }

    .badge-item {
        display: flex;
        align-items: center;
        gap: 0.75rem;
        color: var(--c-text-muted);
        font-size: 0.875rem;
        background: white;
        padding: 0.75rem;
        border-radius: 0.5rem;
        border: 1px solid var(--c-border);
    }
    .badge-item span.material-symbols-outlined {
        color: var(--primary);
    }

    /* Empty State */
    .empty-cart-state {
        text-align: center;
        padding: 6rem 1rem;
        max-width: 500px;
        margin: 0 auto;
    }

    .empty-icon-wrapper {
        width: 100px;
        height: 100px;
        background-color: #f3f4f6;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 2rem auto;
        color: #9ca3af;
    }

    .empty-icon-wrapper span {
        font-size: 3rem;
    }

    .empty-title {
        font-size: 2rem;
        font-weight: 800;
        margin-bottom: 1rem;
        color: var(--c-text-main);
    }

    .empty-text {
        color: var(--c-text-muted);
        margin-bottom: 2.5rem;
        font-size: 1.125rem;
        line-height: 1.6;
    }

    /* Responsive adjustments */
    @media (max-width: 767px) {
        .header-group .section-title { font-size: 2rem !important; }
        .cart-item { text-align: left; }
        .item-image-wrapper { width: 80px; height: 80px; }
        .item-quantity { margin-top: 1rem; }
        .item-total { margin-top: 0.5rem; }
        .item-actions { position: absolute; top: 1rem; right: 1rem; }
        .delete-btn { width: 2rem; height: 2rem; background: #f3f4f6; border-radius: 50%; align-items: center; justify-content: center; }
    }
</style>
@endsection

@section('scripts')
<script>
    function updateQty(itemId, change) {
        const input = document.getElementById('qty-' + itemId);
        let newQty = parseInt(input.value) + change;
        
        if (newQty < 1) return;
        
        input.value = newQty;

        fetch('{{ route("cart.update") }}', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({
                item_id: itemId,
                quantity: newQty
            })
        })
        .then(response => response.json())
        .then(data => {
            if(data.success) {
                document.getElementById('total-' + itemId).innerText = '₹' + data.item_total;
                document.getElementById('cart-subtotal').innerText = '₹' + data.subtotal;
                document.getElementById('cart-total').innerText = '₹' + data.subtotal;
            }
        });
    }
</script>
@endsection

<style>
    /* Styling Variables locally to ensure premium feel */
    :root {
        --c-border: #e5e7eb;
        --c-text-main: #1f2937;
        --c-text-muted: #6b7280;
        --c-bg-light: #f9fafb;
    }

    .bg-light { background-color: #f8f8f6; } /* Custom soft sand color */
    .bg-white { background-color: #ffffff; }
    .shadow-sm { box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05); }
    
    .cart-layout {
        display: grid;
        grid-template-columns: 1fr;
        gap: 1.5rem;
        align-items: start;
    }
    
    @media(min-width: 1024px) {
        .cart-layout {
            grid-template-columns: 2.2fr 1fr;
            gap: 2rem;
        }
    }

    /* Cart Container */
    .cart-container {
        border-radius: 0.75rem;
        border: 1px solid var(--c-border);
        overflow: hidden;
    }

    .cart-header {
        display: none; /* Hidden on mobile */
        grid-template-columns: 5fr 2fr 2fr 1fr; /* Adjusted ratios */
        padding: 1rem 1.5rem;
        background-color: #fafafa;
        border-bottom: 1px solid var(--c-border);
        font-weight: 600;
        color: var(--c-text-muted);
        text-transform: uppercase;
        font-size: 0.7rem;
        letter-spacing: 0.05em;
    }
    
    @media(min-width: 768px) {
        .cart-header { display: grid; }
    }

    .cart-item {
        display: grid;
        grid-template-columns: 1fr;
        gap: 1rem;
        padding: 1.25rem 1.5rem;
        border-bottom: 1px solid var(--c-border);
        align-items: center;
        position: relative;
    }

    @media(min-width: 768px) {
        .cart-item {
            grid-template-columns: 5fr 2fr 2fr 1fr;
            gap: 1rem;
        }
    }

    .item-product {
        display: flex;
        gap: 1rem;
        align-items: center;
    }

    .item-image-wrapper {
        width: 70px;
        height: 70px;
        flex-shrink: 0;
        border-radius: 0.5rem;
        overflow: hidden;
        background-color: #f3f4f6;
        border: 1px solid #eee;
    }

    .item-image {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .item-details {
        display: flex;
        flex-direction: column;
        gap: 0.2rem;
    }

    .item-title {
        font-family: 'Manrope', sans-serif;
        font-size: 0.95rem;
        font-weight: 700;
        color: var(--c-text-main);
        transition: color 0.2s;
        line-height: 1.3;
    }

    .item-title-link:hover .item-title {
        color: var(--primary);
    }

    .item-price-single {
        color: var(--c-text-muted);
        font-size: 0.85rem;
    }

    /* Quantity Pill */
    .quantity-pill {
        display: inline-flex;
        align-items: center;
        background-color: white;
        border: 1px solid var(--c-border);
        border-radius: 9999px;
        padding: 0.15rem;
        width: fit-content;
    }

    .qty-btn {
        width: 1.75rem;
        height: 1.75rem;
        border-radius: 50%;
        border: none;
        background: transparent;
        color: var(--c-text-main);
        display: flex;
        align-items: center;
        justify-content: center;
        transition: background 0.2s;
        cursor: pointer;
    }
    
    .qty-btn:hover {
        background-color: #f3f4f6;
    }
    
    .qty-btn span {
        font-size: 0.9rem;
    }

    .quantity-pill input {
        width: 2rem;
        text-align: center;
        border: none;
        font-weight: 600;
        font-size: 0.9rem;
        background: transparent;
        color: var(--c-text-main);
        -moz-appearance: textfield;
    }
    .quantity-pill input::-webkit-outer-spin-button,
    .quantity-pill input::-webkit-inner-spin-button {
         -webkit-appearance: none; margin: 0;
    }

    .item-total {
        font-weight: 700;
        font-size: 1rem;
        color: var(--c-text-main);
    }
    
    @media(min-width: 768px) {
        .item-total { text-align: right; }
    }

    .delete-btn {
        color: #9ca3af;
        cursor: pointer;
        transition: color 0.2s;
        display: flex;
        justify-content: flex-end;
    }
    
    .delete-btn:hover {
        color: #ef4444;
    }
    
    .delete-btn span { font-size: 1.25rem; }

    .cart-footer {
        padding: 1rem 1.5rem;
        background-color: #fafafa;
    }

    .continue-shopping {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        font-weight: 600;
        color: var(--c-text-main);
        font-size: 0.85rem;
        transition: color 0.2s;
    }
    .continue-shopping:hover {
        color: var(--primary);
    }

    /* Summary Sidebar */
    .summary-card {
        padding: 1.5rem;
        border-radius: 0.75rem;
        border: 1px solid var(--c-border);
    }

    .summary-title {
        font-size: 1.125rem;
        font-weight: 700;
        margin-bottom: 1.25rem;
        padding-bottom: 0.75rem;
        border-bottom: 1px solid var(--c-border);
    }

    .summary-rows {
        display: flex;
        flex-direction: column;
        gap: 0.75rem;
        margin-bottom: 1.25rem;
    }

    .summary-row {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .summary-row .label {
        color: var(--c-text-muted);
        font-size: 0.9rem;
    }
    
    .summary-row .value {
        font-weight: 600;
        color: var(--c-text-main);
        font-size: 0.95rem;
    }
    
    .text-muted { color: #9ca3af !important; font-weight: normal !important; font-size: 0.8rem !important;}

    .divider {
        height: 1px;
        background-color: var(--c-border);
        margin: 1rem 0;
    }

    .summary-row.total .label {
        color: var(--c-text-main);
        font-size: 1.125rem;
        font-weight: 700;
    }
    
    .summary-row.total .value {
        color: var(--primary);
        font-size: 1.25rem;
        font-weight: 800;
    }

    .btn-lg {
        width: 100%;
        padding: 0.75rem;
        font-size: 0.95rem;
        border-radius: 0.5rem;
        display: flex;
        justify-content: center;
    }

    .trust-badges {
        margin-top: 1.5rem;
        display: flex;
        flex-direction: column;
        gap: 0.75rem;
    }

    .badge-item {
        display: flex;
        align-items: center;
        gap: 0.75rem;
        color: var(--c-text-muted);
        font-size: 0.8rem;
        background: white;
        padding: 0.625rem;
        border-radius: 0.375rem;
        border: 1px solid var(--c-border);
    }
    .badge-item span.material-symbols-outlined {
        color: var(--primary);
        font-size: 1.125rem;
    }

    /* Empty State */
    .empty-cart-state {
        text-align: center;
        padding: 4rem 1rem;
        max-width: 500px;
        margin: 0 auto;
    }

    .empty-icon-wrapper {
        width: 80px;
        height: 80px;
        background-color: #f3f4f6;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 1.5rem auto;
        color: #9ca3af;
    }

    .empty-icon-wrapper span {
        font-size: 2.5rem;
    }

    .empty-title {
        font-size: 1.75rem;
        font-weight: 800;
        margin-bottom: 0.75rem;
        color: var(--c-text-main);
    }

    .empty-text {
        color: var(--c-text-muted);
        margin-bottom: 2rem;
        font-size: 1rem;
        line-height: 1.5;
    }

    /* Responsive adjustments */
    @media (max-width: 767px) {
        .header-group .section-title { font-size: 1.75rem !important; }
        .cart-item { text-align: left; }
        .item-image-wrapper { width: 60px; height: 60px; }
        .item-quantity { margin-top: 0.75rem; }
        .item-total { margin-top: 0.5rem; font-size: 0.95rem; }
        .item-actions { position: absolute; top: 1rem; right: 1rem; }
        .delete-btn { width: 1.75rem; height: 1.75rem; background: #f3f4f6; border-radius: 50%; align-items: center; justify-content: center; }
        .delete-btn span { font-size: 1rem; }
    }
</style>
