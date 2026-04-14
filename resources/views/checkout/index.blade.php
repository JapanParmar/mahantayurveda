@extends('layouts.app')

@section('title', 'Checkout')

@section('content')
<section class="section" style="padding-top: 2rem;">
    <div class="container">
        <div style="text-align: center; margin-bottom: 3rem;">
            <span class="section-label" style="justify-content: center;">Secure Checkout</span>
            <h1 class="section-title">Complete Your <em>Order</em></h1>
        </div>

        <div class="checkout-layout">
            <!-- Left: Shipping Form -->
            <div class="checkout-form-container">
                <h3 class="checkout-subtitle" style="font-family: var(--font-heading); font-size: 1.5rem; margin-bottom: 1.5rem; color: var(--text-heading);">Shipping Details</h3>
                <form id="checkout-form">
                    @csrf
                    <div class="form-group-row">
                        <div class="form-group">
                            <label class="form-label">Email Address</label>
                            <input type="email" name="email" class="form-input" required>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Phone Number</label>
                            <input type="tel" name="phone" class="form-input" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Full Name</label>
                        <input type="text" name="name" class="form-input" required>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Address</label>
                        <input type="text" name="address" class="form-input" placeholder="Street address" required>
                    </div>

                    <div class="form-group-row">
                        <div class="form-group">
                            <label class="form-label">City</label>
                            <input type="text" name="city" class="form-input" required>
                        </div>
                        <div class="form-group">
                            <label class="form-label">State</label>
                            <select name="state" class="form-input" required>
                                <option value="">Select State</option>
                                <option value="Andhra Pradesh">Andhra Pradesh</option>
                                <option value="Gujarat">Gujarat</option>
                                <option value="Maharashtra">Maharashtra</option>
                                <option value="Karnataka">Karnataka</option>
                                <option value="Tamil Nadu">Tamil Nadu</option>
                                <option value="Delhi">Delhi</option>
                                <!-- Add more states as needed -->
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="form-label">ZIP Code</label>
                            <input type="text" name="zip" class="form-input" required>
                        </div>
                    </div>
                </form>
            </div>

            <!-- Right: Order Summary -->
            <div class="checkout-summary">
                <div class="summary-card">
                    <h3 class="summary-title" style="font-family: var(--font-heading); font-size: 1.5rem; margin-bottom: 1.5rem; color: var(--text-heading); border-bottom: 1px solid var(--border-subtle); padding-bottom: 1rem;">Your Order</h3>
                    
                    <div class="summary-items">
                        @foreach($cart->items as $item)
                        <div class="summary-item" id="summary-item-{{ $item->id }}">
                            <img src="{{ $item->product->image ? Storage::url($item->product->image) : asset('images/placeholder.png') }}" alt="" class="summary-img">
                            <div class="summary-info">
                                <p class="summary-name">{{ $item->product->name }}</p>
                                <div class="qty-controls">
                                    <button type="button" class="qty-btn" onclick="updateQty({{ $item->id }}, -1)">−</button>
                                    <input type="text" class="qty-input" id="qty-{{ $item->id }}" value="{{ $item->quantity }}" readonly>
                                    <button type="button" class="qty-btn" onclick="updateQty({{ $item->id }}, 1)">+</button>
                                </div>
                                <a href="{{ route('cart.remove', $item->id) }}" class="remove-link">Remove</a>
                            </div>
                            <p class="summary-price" id="total-{{ $item->id }}">₹{{ $item->price * $item->quantity }}</p>
                        </div>
                        @endforeach
                    </div>

                    <div class="divider"></div>
                    
                    <div class="summary-row">
                        <span>Subtotal</span>
                        <span id="checkout-subtotal">₹{{ $cart->items->sum(function($item) { return $item->price * $item->quantity; }) }}</span>
                    </div>
                    <div class="summary-row">
                        <span>Shipping</span>
                        <span id="checkout-shipping" style="color: var(--accent);">
                            @php
                                $subtotal = $cart->items->sum(function($item) { return $item->price * $item->quantity; });
                                $shipping = $subtotal > env('FREE_SHIPPING_THRESHOLD') ? 0 : env('SHIPPING_CHARGE');
                            @endphp
                            ₹{{ $shipping }}
                        </span>
                    </div>
                    <div class="divider"></div>
                    <div class="summary-row total">
                        <span>Total to Pay</span>
                        <span id="checkout-total">
                            @php
                                $total = $subtotal + $shipping;
                            @endphp
                            ₹{{ $total }}
                        </span>
                    </div>

                    <button type="button" id="pay-btn" class="btn btn-primary" style="width: 100%; justify-content: center; margin-top: 1.5rem; padding: 1rem;">
                        Pay Now
                    </button>
                    <p style="text-align: center; margin-top: 1rem; font-size: 0.75rem; color: var(--text-muted); display: flex; align-items: center; justify-content: center; gap: 0.25rem;">
                        <span class="material-symbols-outlined" style="font-size: 1rem;">lock</span> Secure payment via Razorpay
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

@section('styles')
<style>
    .checkout-layout { display: grid; grid-template-columns: 1fr; gap: 2rem; }
    @media(min-width: 992px) { .checkout-layout { grid-template-columns: 1.3fr 0.7fr; gap: 3rem; } }

    .checkout-form-container { background: var(--bg-card); padding: 2rem; border-radius: var(--radius-lg); border: 1px solid var(--border-subtle); }
    
    .form-group-row { display: grid; grid-template-columns: 1fr; gap: 1rem; }
    @media(min-width: 768px) { .form-group-row { grid-template-columns: repeat(auto-fit, minmax(150px, 1fr)); } }

    .summary-card { background: var(--bg-card); padding: 2rem; border-radius: var(--radius-lg); position: sticky; top: 100px; border: 1px solid var(--border-subtle); backdrop-filter: blur(10px); }
    
    .summary-item { display: flex; align-items: flex-start; gap: 1rem; margin-bottom: 1.25rem; border-bottom: 1px solid rgba(255,255,255,0.05); padding-bottom: 1rem; }
    .summary-img { width: 60px; height: 60px; object-fit: cover; border-radius: var(--radius-sm); background: rgba(0,0,0,0.2); border: 1px solid var(--border-subtle); }
    .summary-info { flex: 1; }
    .summary-name { font-weight: 500; font-size: 0.95rem; color: var(--text-heading); margin-bottom: 0.35rem; }
    
    .qty-controls { display: flex; align-items: center; gap: 0.25rem; margin-bottom: 0.35rem; }
    .qty-btn { width: 22px; height: 22px; border-radius: 4px; border: 1px solid var(--border-subtle); background: rgba(255,255,255,0.03); color: var(--text-heading); cursor: pointer; display: flex; align-items: center; justify-content: center; font-size: 14px; }
    .qty-btn:hover { background: rgba(200,169,110,0.1); color: var(--accent); }
    .qty-input { width: 24px; text-align: center; border: none; background: transparent; color: var(--text-heading); font-size: 0.85rem; font-weight: 600; }
    
    .remove-link { font-size: 0.75rem; color: #ef4444; cursor: pointer; display: inline-block; transition: color 0.2s; }
    .remove-link:hover { color: #f87171; text-decoration: underline; }

    .summary-price { font-weight: 700; font-size: 0.95rem; color: var(--accent); }
    
    .divider { height: 1px; background: var(--border-subtle); margin: 1rem 0; }
    .summary-row { display: flex; justify-content: space-between; margin-bottom: 0.75rem; color: var(--text-muted); font-size: 0.95rem; }
    .summary-row.total { font-weight: 600; font-size: 1.25rem; color: var(--text-heading); margin-top: 0.5rem; }
    #checkout-total { color: var(--accent); font-weight: 700; font-size: 1.5rem; }
</style>
@endsection

@section('scripts')
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
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
                document.getElementById('checkout-subtotal').innerText = '₹' + data.subtotal;
                document.getElementById('checkout-shipping').innerText = '₹' + data.shipping;
                document.getElementById('checkout-total').innerText = '₹' + data.total;
            }
        });
    }

    document.getElementById('pay-btn').addEventListener('click', function(e) {
        e.preventDefault();
        const form = document.getElementById('checkout-form');
        if(!form.checkValidity()) { form.reportValidity(); return; }
        
        const data = {};
        new FormData(form).forEach((value, key) => data[key] = value);

        const btn = document.getElementById('pay-btn');
        btn.disabled = true; btn.innerText = 'Processing...';

        fetch('{{ route("checkout.store") }}', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': '{{ csrf_token() }}' },
            body: JSON.stringify(data)
        }).then(r => r.json()).then(data => {
            if(data.success) {
                var options = {
                    "key": data.key, "amount": data.amount, "currency": data.currency,
                    "name": data.name, "description": data.description, "image": "{{ asset('images/logo.png') }}",
                    "order_id": data.order_id,
                    "handler": function (response){ verifyPayment(response, data.internal_order_id); },
                    "prefill": { "name": data.prefill.name, "email": data.prefill.email, "contact": data.prefill.contact },
                    "theme": { "color": "#1A3A1A" }
                };
                var rzp1 = new Razorpay(options);
                rzp1.on('payment.failed', function (response){
                    alert("Payment Failed: " + response.error.description);
                    btn.disabled = false; btn.innerText = 'Pay Now';
                });
                rzp1.open();
            } else { alert('Error creating order'); btn.disabled = false; btn.innerText = 'Pay Now'; }
        }).catch(() => { btn.disabled = false; btn.innerText = 'Pay Now'; });
    });

    function verifyPayment(response, internalOrderId) {
        fetch('{{ route("checkout.verify") }}', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': '{{ csrf_token() }}' },
            body: JSON.stringify({
                razorpay_payment_id: response.razorpay_payment_id,
                razorpay_order_id: response.razorpay_order_id,
                razorpay_signature: response.razorpay_signature,
                internal_order_id: internalOrderId
            })
        }).then(r => r.json()).then(data => {
            if(data.success) { alert('Payment Successful!'); window.location.href = "{{ url('/') }}"; }
            else { alert('Payment Verification Failed'); }
        });
    }
</script>
@endsection
