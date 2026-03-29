@extends('layouts.app')

@section('title', 'Checkout')

@section('content')
<section class="section bg-white">
    <div class="container">
        <h1 class="section-title" style="margin-bottom: 2rem;">Checkout</h1>

        <div class="checkout-layout">
            <!-- Left: Shipping Form -->
            <div class="checkout-form-container">
                <h3 class="checkout-subtitle">Shipping Details</h3>
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
                    <h3 class="summary-title">Your Order</h3>
                    
                    <div class="summary-items">
                        @foreach($cart->items as $item)
                        <div class="summary-item" id="summary-item-{{ $item->id }}">
                            <img src="{{ $item->product->image ? Storage::url($item->product->image) : asset('images/placeholder.png') }}" alt="" class="summary-img">
                            <div class="summary-info">
                                <p class="summary-name">{{ $item->product->name }}</p>
                                <div class="qty-controls">
                                    <button type="button" class="qty-btn" onclick="updateQty({{ $item->id }}, -1)">-</button>
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
                        <span id="checkout-shipping">
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

                    <button type="button" id="pay-btn" class="btn btn-primary btn-block" style="margin-top: 1.5rem; justify-content: center;">
                        Pay Now
                    </button>
                    <p style="text-align: center; margin-top: 1rem; font-size: 0.875rem; color: #6b7280;">Secure payment via Razorpay</p>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
    .checkout-layout {
        display: grid;
        grid-template-columns: 1fr;
        gap: 1.5rem;
    }
    @media(min-width: 992px) {
        .checkout-layout {
            grid-template-columns: 1.2fr 0.8fr;
            gap: 3rem;
        }
    }

    .checkout-subtitle {
        font-size: 1.125rem;
        font-weight: 600;
        margin-bottom: 1rem;
        color: var(--text-heading);
    }

    .form-group {
        margin-bottom: 1rem;
    }

    .form-group-row {
        display: grid;
        grid-template-columns: 1fr;
        gap: 1rem;
    }
    @media(min-width: 768px) {
        .form-group-row {
            grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
        }
    }

    .form-label {
        display: block;
        margin-bottom: 0.35rem;
        font-weight: 500;
        color: var(--text-heading);
        font-size: 0.875rem;
    }

    .form-input {
        width: 100%;
        padding: 0.625rem;
        border: 1px solid #d1d5db;
        border-radius: 0.375rem;
        font-family: inherit;
        font-size: 0.9rem;
    }
    
    .form-input:focus {
        outline: none;
        border-color: var(--primary);
        box-shadow: 0 0 0 2px rgba(21, 128, 61, 0.1);
    }

    .summary-card {
        background: #f9fafb;
        padding: 1.25rem;
        border-radius: 0.75rem;
        position: sticky;
        top: 100px;
        border: 1px solid #e5e7eb;
    }

    .summary-title {
        font-size: 1.125rem;
        font-weight: 700;
        margin-bottom: 1rem;
    }

    .summary-item {
        display: flex;
        align-items: flex-start;
        gap: 0.75rem;
        margin-bottom: 1rem;
        border-bottom: 1px solid #f3f4f6;
        padding-bottom: 0.75rem;
    }

    .summary-img {
        width: 50px;
        height: 50px;
        object-fit: cover;
        border-radius: 0.25rem;
        background: #e5e7eb;
    }

    .summary-info {
        flex: 1;
    }

    .summary-name {
        font-weight: 600;
        font-size: 0.85rem;
        color: var(--text-heading);
        margin-bottom: 0.25rem;
    }

    .qty-controls {
        display: flex;
        align-items: center;
        gap: 0.25rem;
        margin-bottom: 0.25rem;
    }
    
    .qty-btn {
        width: 20px;
        height: 20px;
        border-radius: 4px;
        border: 1px solid #d1d5db;
        background: white;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 12px;
        color: #4b5563;
    }
    .qty-btn:hover { background: #f3f4f6; }
    
    .qty-input {
        width: 24px;
        text-align: center;
        border: none;
        background: transparent;
        font-size: 0.8rem;
        font-weight: 600;
    }
    
    .remove-link {
        font-size: 0.7rem;
        color: #ef4444;
        text-decoration: underline;
        cursor: pointer;
    }

    .summary-price {
        font-weight: 700;
        font-size: 0.875rem;
    }
    
    .divider { height: 1px; background: #e5e7eb; margin: 0.75rem 0; }
    
    .summary-row {
        display: flex;
        justify-content: space-between;
        margin-bottom: 0.5rem;
        color: var(--text-body);
        font-size: 0.875rem;
    }
    
    .summary-row.total {
        font-weight: 700;
        font-size: 1.125rem;
        color: var(--text-heading);
    }
    
    .btn-block { width: 100%; display: flex; }
    
    /* Section Title override for this page */
    .section-title {
        font-size: 1.75rem;
        margin-bottom: 1.5rem !important;
    }
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
                document.getElementById('checkout-subtotal').innerText = '₹' + data.subtotal;
                
                document.getElementById('checkout-shipping').innerText = '₹' + data.shipping;
                document.getElementById('checkout-total').innerText = '₹' + data.total;
            }
        })
        .catch(console.error);
    }

    document.getElementById('pay-btn').addEventListener('click', function(e) {
        e.preventDefault();
        
        const form = document.getElementById('checkout-form');
        if(!form.checkValidity()) {
            form.reportValidity();
            return;
        }

        const formData = new FormData(form);
        const data = {};
        formData.forEach((value, key) => data[key] = value);

        // Disable button
        const btn = document.getElementById('pay-btn');
        btn.disabled = true;
        btn.innerText = 'Processing...';

        fetch('{{ route("checkout.store") }}', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify(data)
        })
        .then(response => response.json())
        .then(data => {
            if(data.success) {
                var options = {
                    "key": data.key,
                    "amount": data.amount,
                    "currency": data.currency,
                    "name": data.name,
                    "description": data.description,
                    "image": "{{ asset('images/logo.png') }}",
                    "order_id": data.order_id,
                    "handler": function (response){
                        verifyPayment(response, data.internal_order_id);
                    },
                    "prefill": {
                        "name": data.prefill.name,
                        "email": data.prefill.email,
                        "contact": data.prefill.contact
                    },
                    "theme": {
                        "color": "#15803d"
                    }
                };
                var rzp1 = new Razorpay(options);
                rzp1.on('payment.failed', function (response){
                    alert("Payment Failed: " + response.error.description);
                    btn.disabled = false;
                    btn.innerText = 'Pay Now';
                });
                rzp1.open();
            } else {
                alert('Error creating order');
                btn.disabled = false;
                btn.innerText = 'Pay Now';
            }
        })
        .catch(error => {
            console.error('Error:', error);
            btn.disabled = false;
            btn.innerText = 'Pay Now';
        });
    });

    function verifyPayment(response, internalOrderId) {
        fetch('{{ route("checkout.verify") }}', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({
                razorpay_payment_id: response.razorpay_payment_id,
                razorpay_order_id: response.razorpay_order_id,
                razorpay_signature: response.razorpay_signature,
                internal_order_id: internalOrderId
            })
        })
        .then(res => res.json())
        .then(data => {
            if(data.success) {
                alert('Payment Successful!');
                window.location.href = "{{ url('/') }}";
            } else {
                alert('Payment Verification Failed');
            }
        });
    }
</script>
@endsection
