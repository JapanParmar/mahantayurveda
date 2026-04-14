@extends('layouts.app')

@section('title', 'Shopping Cart')

@section('content')
<section class="section" style="min-height: 80vh; padding-top: 2rem;">
    <div class="container">
        <div class="header-group" style="margin-bottom: 3rem; text-align: center;">
            <span class="section-label" style="justify-content: center;">Your Cart</span>
            <h1 class="section-title" style="margin-bottom: 0.5rem;">Your Daily <em>Rituals</em></h1>
            <p class="section-text" style="margin: 0 auto;">Review your selection of holistic wellness.</p>
        </div>

        @if($items->count() > 0)
        <div class="cart-layout">
            <!-- Cart Items List -->
            <div class="cart-container">
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
                                <button type="button" class="qty-btn" onclick="updateQty({{ $item->id }}, -1)">−</button>
                                <input type="number" id="qty-{{ $item->id }}" value="{{ $item->quantity }}" readonly>
                                <button type="button" class="qty-btn" onclick="updateQty({{ $item->id }}, 1)">+</button>
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
                <div class="summary-card">
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
                         <a href="{{ route('checkout.index') }}" class="btn btn-primary" style="width: 100%; justify-content: center; margin-top: 1rem;">
                            Proceed to Checkout
                        </a>
                    </div>
                </div>
                
                <div class="trust-badges" style="margin-top: 1.5rem; display: flex; flex-direction: column; gap: 0.75rem;">
                    <div class="badge-item" style="display: flex; align-items: center; gap: 0.75rem; background: rgba(255,255,255,0.03); padding: 0.75rem; border: 1px solid var(--border-subtle); border-radius: var(--radius-sm); color: var(--text-body); font-size: 0.85rem;">
                        <span class="material-symbols-outlined" style="color: var(--accent);">local_shipping</span>
                        <span>Free shipping over ₹999</span>
                    </div>
                    <div class="badge-item" style="display: flex; align-items: center; gap: 0.75rem; background: rgba(255,255,255,0.03); padding: 0.75rem; border: 1px solid var(--border-subtle); border-radius: var(--radius-sm); color: var(--text-body); font-size: 0.85rem;">
                        <span class="material-symbols-outlined" style="color: var(--accent);">verified_user</span>
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
            <a href="{{ route('products.index') }}" class="btn btn-primary" style="padding: 1rem 2rem;">
                Explore The Collection
            </a>
        </div>
        @endif
    </div>
</section>

@endsection

@section('styles')
<style>
    .cart-layout { display: grid; grid-template-columns: 1fr; gap: 2rem; align-items: start; }
    @media(min-width: 1024px) { .cart-layout { grid-template-columns: 2fr 1fr; gap: 3rem; } }
    
    .cart-container { background: var(--bg-card); border-radius: var(--radius-lg); border: 1px solid var(--border-subtle); overflow: hidden; backdrop-filter: blur(10px); }
    .cart-header { display: none; grid-template-columns: 5fr 2fr 2fr 1fr; padding: 1rem 2rem; background: rgba(0,0,0,0.2); border-bottom: 1px solid var(--border-subtle); font-weight: 600; color: var(--text-muted); text-transform: uppercase; font-size: 0.75rem; letter-spacing: 0.1em; }
    @media(min-width: 768px) { .cart-header { display: grid; } }

    .cart-item { display: grid; grid-template-columns: 1fr; gap: 1.5rem; padding: 2rem; border-bottom: 1px solid var(--border-subtle); align-items: center; position: relative; }
    @media(min-width: 768px) { .cart-item { grid-template-columns: 5fr 2fr 2fr 1fr; padding: 1.5rem 2rem; gap: 1rem; } }

    .item-product { display: flex; gap: 1.5rem; align-items: center; }
    .item-image-wrapper { width: 90px; height: 90px; flex-shrink: 0; border-radius: var(--radius-sm); overflow: hidden; background: rgba(0,0,0,0.2); border: 1px solid var(--border-subtle); }
    .item-image { width: 100%; height: 100%; object-fit: cover; }
    .item-details { display: flex; flex-direction: column; gap: 0.25rem; }
    .item-title { font-family: var(--font-heading); font-size: 1.25rem; font-weight: 500; color: var(--text-heading); transition: color 0.2s; }
    .item-title-link:hover .item-title { color: var(--accent); }
    .item-price-single { color: var(--text-muted); font-size: 0.9rem; }

    .quantity-pill { display: inline-flex; align-items: center; background: rgba(255,255,255,0.03); border: 1px solid var(--border-subtle); border-radius: 9999px; padding: 0.15rem; width: fit-content; }
    .qty-btn { width: 2rem; height: 2rem; border-radius: 50%; color: var(--text-heading); display: flex; align-items: center; justify-content: center; transition: background 0.2s; cursor: pointer; }
    .qty-btn:hover { background: rgba(200,169,110,0.1); color: var(--accent); }
    .quantity-pill input { width: 2.5rem; text-align: center; border: none; font-weight: 600; font-size: 1rem; background: transparent; color: var(--text-heading); -moz-appearance: textfield; }
    .quantity-pill input::-webkit-outer-spin-button, .quantity-pill input::-webkit-inner-spin-button { -webkit-appearance: none; margin: 0; }

    .item-total { font-family: var(--font-body); font-weight: 700; font-size: 1.125rem; color: var(--accent); }
    @media(min-width: 768px) { .item-total { text-align: right; } }

    .delete-btn { color: var(--text-muted); cursor: pointer; transition: color 0.2s; display: flex; justify-content: flex-end; }
    .delete-btn:hover { color: #ef4444; }

    .cart-footer { padding: 1.5rem 2rem; background: rgba(0,0,0,0.1); }
    .continue-shopping { display: inline-flex; align-items: center; gap: 0.5rem; font-weight: 600; color: var(--text-muted); font-size: 0.875rem; transition: color 0.2s; }
    .continue-shopping:hover { color: var(--accent); }

    /* Summary Sidebar */
    .summary-card { padding: 2rem; border-radius: var(--radius-lg); background: var(--bg-card); border: 1px solid var(--border-subtle); backdrop-filter: blur(10px); }
    .summary-title { font-family: var(--font-heading); font-size: 1.5rem; font-weight: 500; margin-bottom: 1.5rem; padding-bottom: 1rem; border-bottom: 1px solid var(--border-subtle); color: var(--text-heading); }
    .summary-rows { display: flex; flex-direction: column; gap: 1rem; }
    .summary-row { display: flex; justify-content: space-between; align-items: center; }
    .summary-row .label { color: var(--text-muted); font-size: 0.95rem; }
    .summary-row .value { font-weight: 600; color: var(--text-heading); }
    .text-muted { color: var(--text-muted) !important; font-weight: normal !important; font-size: 0.85rem !important; }
    .divider { height: 1px; background-color: var(--border-subtle); margin: 1.5rem 0; }
    .summary-row.total .label { color: var(--text-heading); font-size: 1.25rem; font-weight: 600; }
    .summary-row.total .value { color: var(--accent); font-size: 1.5rem; font-weight: 700; }

    /* Empty State */
    .empty-cart-state { text-align: center; padding: 6rem 1rem; max-width: 500px; margin: 0 auto; background: var(--bg-card); border: 1px solid var(--border-subtle); border-radius: var(--radius-lg); }
    .empty-icon-wrapper { width: 80px; height: 80px; background: rgba(200,169,110,0.1); border: 1px solid var(--border-gold); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 2rem auto; color: var(--accent); }
    .empty-icon-wrapper span { font-size: 2.5rem; }
    .empty-title { font-family: var(--font-heading); font-size: 2rem; font-weight: 500; margin-bottom: 1rem; color: var(--text-heading); }
    .empty-text { color: var(--text-muted); margin-bottom: 2.5rem; font-size: 1rem; line-height: 1.6; }

    @media (max-width: 767px) {
        .cart-item { text-align: left; }
        .item-quantity { margin-top: 1rem; }
        .item-total { margin-top: 0.5rem; }
        .item-actions { position: absolute; top: 1rem; right: 1rem; }
        .delete-btn { width: 2rem; height: 2rem; background: rgba(255,255,255,0.05); border-radius: 50%; align-items: center; justify-content: center; }
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
            headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': '{{ csrf_token() }}' },
            body: JSON.stringify({ item_id: itemId, quantity: newQty })
        }).then(r => r.json()).then(data => {
            if(data.success) {
                document.getElementById('total-' + itemId).innerText = '₹' + data.item_total;
                document.getElementById('cart-subtotal').innerText = '₹' + data.subtotal;
                document.getElementById('cart-total').innerText = '₹' + data.subtotal;
            }
        });
    }
</script>
@endsection
