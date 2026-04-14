@extends('layouts.app')

@section('title', $product->name)

@section('content')
<div style="padding-top: 2rem; padding-bottom: 4rem;">
    <div class="container">
        <!-- Breadcrumb -->
        <nav class="breadcrumb">
            <a href="{{ url('/') }}">Home</a>
            <span style="color: var(--text-muted);">/</span>
            <a href="{{ route('products.index') }}">Shop</a>
            <span style="color: var(--text-muted);">/</span>
            <span class="current">{{ $product->name }}</span>
        </nav>

        <div class="product-detail-grid">
            <!-- Gallery -->
            <div class="product-gallery-container">
                <div class="gallery-wrapper">
                    @if($product->images->count() > 0)
                    <div class="thumbnails-strip">
                        <div class="thumbnail active" onmouseover="changeImage('{{ $product->image ? Storage::url($product->image) : asset('images/placeholder.png') }}', this)">
                            <img src="{{ $product->image ? Storage::url($product->image) : asset('images/placeholder.png') }}" alt="{{ $product->name }}">
                        </div>
                        @foreach($product->images as $img)
                        <div class="thumbnail" onmouseover="changeImage('{{ Storage::url($img->image_path) }}', this)">
                            <img src="{{ Storage::url($img->image_path) }}" alt="{{ $product->name }}">
                        </div>
                        @endforeach
                    </div>
                    @endif
                    <div class="main-image-area">
                        <img src="{{ $product->image ? Storage::url($product->image) : asset('images/placeholder.png') }}" alt="{{ $product->name }}" id="mainImage">
                    </div>
                </div>
            </div>

            <!-- Product Info -->
            <div class="product-info-panel">
                @if($product->badge)
                <span class="detail-badge">{{ $product->badge }}</span>
                @endif
                <h1 class="detail-title">{{ $product->name }}</h1>
                <div class="detail-rating">
                    @if($product->rating)
                    <div class="rating-stars">
                        @for($i = 0; $i < floor($product->rating); $i++)
                        <span class="material-symbols-outlined filled">star</span>
                        @endfor
                        @if($product->rating - floor($product->rating) >= 0.5)
                        <span class="material-symbols-outlined filled">star_half</span>
                        @endif
                        <span class="rating-count">({{ $product->rating }} Rating)</span>
                    </div>
                    @endif
                </div>
                <div class="detail-price">
                    @if($product->is_on_sale)
                        <span class="current-price">₹{{ $product->sale_price }}</span>
                        <span class="original-price">₹{{ $product->price }}</span>
                        <span class="discount-label">{{ $product->discount_percentage }}% OFF</span>
                    @else
                        <span class="current-price">₹{{ $product->price }}</span>
                    @endif
                </div>
                <div class="detail-description"><p>{{ $product->description }}</p></div>
                <div class="purchase-actions">
                    <div class="quantity-selector">
                        <button type="button" onclick="decrementQty()">−</button>
                        <input type="number" id="quantity" value="1" min="1" readonly>
                        <button type="button" onclick="incrementQty()">+</button>
                    </div>
                    <button class="btn btn-primary btn-lg" onclick="addToCart({{ $product->id }})">Add to Cart</button>
                </div>
                <div class="trust-features">
                    <div class="trust-item"><span class="material-symbols-outlined">verified</span><span>100% Authentic</span></div>
                    <div class="trust-item"><span class="material-symbols-outlined">local_shipping</span><span>Free Shipping > ₹999</span></div>
                    <div class="trust-item"><span class="material-symbols-outlined">security</span><span>Secure Payment</span></div>
                </div>
            </div>
        </div>
    </div>
</div>

@if($relatedProducts->count() > 0)
<section class="section">
    <div class="container">
        <h3 class="section-title">You May <em>Also Like</em></h3>
        <div class="grid-4">
            @foreach($relatedProducts as $related)
            <div class="product-card">
                <a href="{{ route('products.show', $related->id) }}" style="text-decoration:none;color:inherit;">
                    <div class="product-image-wrapper">
                        <div class="product-image" style="background-image: url('{{ $related->image ? Storage::url($related->image) : asset('images/placeholder.png') }}');"></div>
                    </div>
                    <div class="product-details">
                        <h4 class="product-title">{{ $related->name }}</h4>
                        <div class="price-wrapper" style="margin-top:0.5rem;">
                            @if($related->is_on_sale)
                                <span class="price-sale">₹{{ $related->sale_price }}</span>
                            @else
                                <span class="price-sale">₹{{ $related->price }}</span>
                            @endif
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif
@endsection

@section('styles')
<style>
    .breadcrumb { margin-bottom:1.5rem;font-size:0.8rem;color:var(--text-muted);display:flex;align-items:center;gap:0.5rem; }
    .breadcrumb a { color:var(--text-muted);transition:color 0.2s; }
    .breadcrumb a:hover { color:var(--accent); }
    .breadcrumb .current { color:var(--text-heading);font-weight:500; }
    .product-detail-grid { display:grid;grid-template-columns:1fr;gap:2rem;align-items:start; }
    @media(min-width:992px) { .product-detail-grid { grid-template-columns:1.5fr 1fr;gap:3rem; } }
    .gallery-wrapper { display:flex;flex-direction:column-reverse;gap:0.75rem; }
    @media(min-width:768px) { .gallery-wrapper { flex-direction:row;gap:1rem;max-height:500px; } }
    .thumbnails-strip { display:flex;gap:0.5rem;overflow-x:auto;padding-bottom:0.5rem; }
    @media(min-width:768px) { .thumbnails-strip { flex-direction:column;width:70px;flex-shrink:0;overflow-y:auto;overflow-x:hidden;padding-right:0.25rem;padding-bottom:0; } .thumbnails-strip::-webkit-scrollbar{width:3px;} .thumbnails-strip::-webkit-scrollbar-thumb{background:var(--border-gold);border-radius:4px;} }
    .thumbnail { width:60px;height:60px;border-radius:var(--radius-sm);overflow:hidden;border:2px solid transparent;cursor:pointer;opacity:0.5;transition:all 0.3s;flex-shrink:0; }
    @media(min-width:768px) { .thumbnail { width:100%;height:auto;aspect-ratio:1/1; } }
    .thumbnail img { width:100%;height:100%;object-fit:cover; }
    .thumbnail:hover,.thumbnail.active { opacity:1;border-color:var(--accent); }
    .main-image-area { flex:1;background:rgba(0,0,0,0.2);border-radius:var(--radius-lg);overflow:hidden;aspect-ratio:1/1;display:flex;align-items:center;justify-content:center;border:1px solid var(--border-subtle); }
    .main-image-area img { width:100%;height:100%;object-fit:cover;transition:opacity 0.3s; }
    .detail-badge { display:inline-block;background:rgba(200,169,110,0.15);color:var(--accent);padding:0.3rem 0.75rem;border-radius:var(--radius-sm);font-size:0.7rem;font-weight:700;text-transform:uppercase;letter-spacing:0.1em;margin-bottom:0.75rem;border:1px solid var(--border-gold); }
    .detail-title { font-family:var(--font-heading);font-size:2rem;font-weight:400;color:var(--text-heading);margin-bottom:0.5rem;line-height:1.2; }
    .rating-stars { display:flex;align-items:center;gap:0.15rem;color:var(--accent);margin-bottom:1rem; }
    .rating-stars .filled { font-variation-settings:'FILL' 1;font-size:1rem; }
    .rating-count { color:var(--text-muted);font-size:0.8rem;margin-left:0.5rem;font-weight:500; }
    .detail-price { display:flex;align-items:baseline;gap:0.75rem;margin-bottom:1.25rem; }
    .current-price { font-size:1.75rem;font-weight:700;color:var(--accent);font-family:var(--font-body); }
    .original-price { font-size:1rem;text-decoration:line-through;color:var(--text-muted); }
    .discount-label { color:var(--accent);font-weight:700;background:rgba(200,169,110,0.12);padding:0.2rem 0.5rem;border-radius:var(--radius-sm);font-size:0.75rem; }
    .detail-description { color:var(--text-body);font-size:0.95rem;line-height:1.7;margin-bottom:1.5rem; }
    .purchase-actions { display:flex;gap:0.75rem;background:var(--bg-card);padding:1.25rem;border-radius:var(--radius-md);border:1px solid var(--border-subtle); }
    @media(min-width:640px) { .purchase-actions { flex-direction:row; } }
    .quantity-selector { display:flex;align-items:center;background:rgba(255,255,255,0.04);border:1px solid var(--border-subtle);border-radius:var(--radius-sm);height:3rem; }
    .quantity-selector button { width:2.5rem;height:100%;border:none;background:transparent;font-size:1.125rem;color:var(--text-heading);cursor:pointer;transition:background 0.2s; }
    .quantity-selector button:hover { background:rgba(200,169,110,0.1); }
    .quantity-selector input { width:2.5rem;height:100%;border:none;text-align:center;font-size:1rem;font-weight:600;background:transparent;color:var(--text-heading); }
    .btn-lg { flex:1;padding:0 1.5rem;height:3rem;font-size:1rem;display:flex;align-items:center;justify-content:center; }
    .trust-features { margin-top:1.5rem;padding-top:1rem;border-top:1px solid var(--border-subtle);display:grid;grid-template-columns:1fr;gap:0.75rem; }
    @media(min-width:640px) { .trust-features { grid-template-columns:repeat(3,1fr); } }
    .trust-item { display:flex;align-items:center;gap:0.5rem;font-size:0.8rem;color:var(--text-body);font-weight:500; }
    .trust-item .material-symbols-outlined { color:var(--accent);font-size:1.25rem; }
</style>
@endsection

@section('scripts')
<script>
    function incrementQty(){document.getElementById('quantity').value=parseInt(document.getElementById('quantity').value)+1;}
    function decrementQty(){const i=document.getElementById('quantity');if(parseInt(i.value)>1)i.value=parseInt(i.value)-1;}
    function changeImage(src,thumb){const m=document.getElementById('mainImage');m.style.opacity='0.6';setTimeout(()=>{m.src=src;m.style.opacity='1';},150);document.querySelectorAll('.thumbnail').forEach(t=>t.classList.remove('active'));thumb.classList.add('active');}
    function addToCart(id){
        const qty=document.getElementById('quantity').value;const btn=document.querySelector('.btn-lg');const orig=btn.innerHTML;
        btn.innerHTML='Adding...';btn.disabled=true;
        fetch('{{ route("cart.add") }}',{method:'POST',headers:{'Content-Type':'application/json','X-CSRF-TOKEN':'{{ csrf_token() }}'},body:JSON.stringify({product_id:id,quantity:qty})})
        .then(r=>r.json()).then(d=>{if(d.success){btn.innerHTML='Added ✓';setTimeout(()=>{btn.innerHTML=orig;btn.disabled=false;},2000);}else{alert('Error');btn.innerHTML=orig;btn.disabled=false;}})
        .catch(()=>{btn.innerHTML=orig;btn.disabled=false;});
    }
</script>
@endsection
