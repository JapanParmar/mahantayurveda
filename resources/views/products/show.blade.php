@extends('layouts.app')

@section('title', $product->name)

@section('content')
<div class="product-page-container bg-white">
    <div class="container" style="padding-top: 2rem; padding-bottom: 4rem;">
        
        <!-- Breadcrumb -->
        <nav class="breadcrumb">
            <a href="{{ url('/') }}">Home</a>
            <span>/</span>
            <a href="{{ route('products.index') }}">Shop</a>
            <span>/</span>
            <span class="current">{{ $product->name }}</span>
        </nav>

        <div class="product-detail-grid">
            <!-- Left: Gallery (Industry Standard: Thumbnails Left, Main Content Right) -->
            <div class="product-gallery-container">
                <div class="gallery-wrapper">
                    <!-- Thumbnails Strip (Left Side) -->
                    @if($product->images->count() > 0)
                    <div class="thumbnails-strip">
                        <!-- Main Image Thumbnail -->
                        <div class="thumbnail active" onmouseover="changeImage('{{ $product->image ? Storage::url($product->image) : asset('images/placeholder.png') }}', this)">
                            <img src="{{ $product->image ? Storage::url($product->image) : asset('images/placeholder.png') }}" alt="{{ $product->name }}">
                        </div>
                        <!-- Gallery Images -->
                        @foreach($product->images as $img)
                        <div class="thumbnail" onmouseover="changeImage('{{ Storage::url($img->image_path) }}', this)">
                            <img src="{{ Storage::url($img->image_path) }}" alt="{{ $product->name }}">
                        </div>
                        @endforeach
                    </div>
                    @endif

                    <!-- Main Image Area -->
                    <div class="main-image-area">
                        <img src="{{ $product->image ? Storage::url($product->image) : asset('images/placeholder.png') }}" alt="{{ $product->name }}" id="mainImage">
                    </div>
                </div>
            </div>

            <!-- Right: Info -->
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

                <div class="detail-description">
                    <p>{{ $product->description }}</p>
                </div>

                <!-- Quantity & Actions -->
                <div class="purchase-actions">
                    <div class="quantity-selector">
                        <button type="button" onclick="decrementQty()">-</button>
                        <input type="number" id="quantity" value="1" min="1" readonly>
                        <button type="button" onclick="incrementQty()">+</button>
                    </div>
                    
                    <button class="btn btn-primary btn-lg" onclick="addToCart({{ $product->id }})">
                        Add to Cart
                    </button>
                </div>

                <!-- Trust Badges -->
                <div class="trust-features">
                    <div class="trust-item">
                        <span class="material-symbols-outlined">verified</span>
                        <span>100% Authentic</span>
                    </div>
                    <div class="trust-item">
                        <span class="material-symbols-outlined">local_shipping</span>
                        <span>Free Shipping > ₹999</span>
                    </div>
                    <div class="trust-item">
                        <span class="material-symbols-outlined">security</span>
                        <span>Secure Payment</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Related Products -->
@if($relatedProducts->count() > 0)
<section class="section bg-light">
    <div class="container">
        <h3 class="section-title">You May Also Like</h3>
        <div class="grid-4">
            @foreach($relatedProducts as $related)
            <div class="product-card">
                <a href="{{ route('products.show', $related->id) }}">
                    <div class="product-image-wrapper">
                         <div class="product-image" style="background-image: url('{{ $related->image ? Storage::url($related->image) : asset('images/placeholder.png') }}');"></div>
                    </div>
                    <div class="product-details">
                        <h4 class="product-title">{{ $related->name }}</h4>
                        <div class="price-wrapper">
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
    /* Breadcrumb */
    .breadcrumb {
        margin-bottom: 1.5rem;
        font-size: 0.8rem;
        color: #6b7280;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }
    .breadcrumb a { color: inherit; text-decoration: none; transition: color 0.2s; }
    .breadcrumb a:hover { color: var(--primary); }
    .breadcrumb .current { color: var(--text-heading); font-weight: 500; }

    /* Product Grid */
    .product-detail-grid {
        display: grid;
        grid-template-columns: 1fr;
        gap: 2rem;
        align-items: start;
    }
    
    @media(min-width: 992px) {
        .product-detail-grid {
            grid-template-columns: 1.5fr 1fr;
            gap: 3rem;
        }
    }

    /* Gallery - Industry Standard */
    .gallery-wrapper {
        display: flex;
        flex-direction: column-reverse;
        gap: 0.75rem;
    }

    @media(min-width: 768px) {
        .gallery-wrapper {
            flex-direction: row;
            gap: 1rem;
            max-height: 500px;
        }
    }

    /* Thumbnails Strip */
    .thumbnails-strip {
        display: flex;
        gap: 0.5rem;
        overflow-x: auto;
        padding-bottom: 0.5rem;
    }

    @media(min-width: 768px) {
        .thumbnails-strip {
            flex-direction: column;
            width: 70px;
            flex-shrink: 0;
            overflow-y: auto;
            overflow-x: hidden;
            padding-right: 0.25rem;
            padding-bottom: 0;
        }
        
        .thumbnails-strip::-webkit-scrollbar {
            width: 3px;
        }
        .thumbnails-strip::-webkit-scrollbar-thumb {
            background-color: #e5e7eb;
            border-radius: 4px;
        }
    }

    .thumbnail {
        width: 60px;
        height: 60px;
        border-radius: 0.375rem;
        overflow: hidden;
        border: 2px solid transparent;
        cursor: pointer;
        opacity: 0.6;
        transition: all 0.2s ease;
        flex-shrink: 0;
    }
    
    @media(min-width: 768px) {
        .thumbnail { width: 100%; height: auto; aspect-ratio: 1/1; }
    }
    
    .thumbnail img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
    
    .thumbnail:hover, .thumbnail.active {
        opacity: 1;
        border-color: var(--primary);
    }

    /* Main Image Area */
    .main-image-area {
        flex: 1;
        background-color: #f8f8f8;
        border-radius: 0.75rem;
        overflow: hidden;
        aspect-ratio: 1/1;
        display: flex;
        align-items: center;
        justify-content: center;
        border: 1px solid #f1f1f1;
        position: relative;
    }

    .main-image-area img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: opacity 0.3s ease;
    }
    
    /* Product Info */
    .detail-badge {
        display: inline-block;
        background-color: #e6f4ea;
        color: #1a7f37;
        padding: 0.25rem 0.625rem;
        border-radius: 9999px;
        font-size: 0.7rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.05em;
        margin-bottom: 0.75rem;
    }

    .detail-title {
        font-family: 'Manrope', sans-serif;
        font-size: 1.75rem;
        font-weight: 800;
        color: var(--text-heading);
        margin-bottom: 0.5rem;
        line-height: 1.2;
    }

    .rating-stars {
        display: flex;
        align-items: center;
        gap: 0.2rem;
        color: #fbbf24;
        margin-bottom: 1rem;
    }
    
    .rating-stars .filled { font-variation-settings: 'FILL' 1; font-size: 1rem; }
    .rating-count { color: #6b7280; font-size: 0.8rem; margin-left: 0.5rem; font-weight: 500; }

    .detail-price {
        display: flex;
        align-items: baseline;
        gap: 0.75rem;
        margin-bottom: 1.25rem;
        font-family: 'Manrope', sans-serif;
    }

    .current-price { font-size: 1.5rem; font-weight: 800; color: var(--primary); }
    .original-price { font-size: 1rem; text-decoration: line-through; color: #9ca3af; font-weight: 500; }
    .discount-label { 
        color: #dc2626; font-weight: 700; background: #fee2e2; 
        padding: 0.2rem 0.4rem; border-radius: 0.25rem; font-size: 0.75rem; 
    }

    .detail-description {
        color: var(--text-body);
        font-size: 0.95rem;
        line-height: 1.6;
        margin-bottom: 1.5rem;
    }

    /* Actions */
    .purchase-actions {
        display: flex;
        /* flex-direction: column; */
        gap: 0.75rem;
        background: #f8fafc;
        padding: 1.25rem;
        border-radius: 0.75rem;
        border: 1px solid #e2e8f0;
    }
    @media(min-width: 640px) { .purchase-actions { flex-direction: row; } }

    .quantity-selector {
        display: flex;
        align-items: center;
        background: white;
        border: 1px solid #d1d5db;
        border-radius: 0.375rem;
        height: 3rem;
    }
    .quantity-selector button {
        width: 2.5rem; height: 100%; border: none; background: transparent; 
        font-size: 1.125rem; color: #374151; transition: bg 0.2s; cursor: pointer;
    }
    .quantity-selector button:hover { background: #f3f4f6; }
    .quantity-selector input {
        width: 2.5rem; height: 100%; border: none; text-align: center; 
        font-size: 1rem; font-weight: 600; background: transparent;
    }
    
    .btn-lg {
        flex: 1; padding: 0 1.5rem; height: 3rem; font-size: 1rem; 
        display: flex; align-items: center; justify-content: center;
    }

    /* Trust Badges */
    .trust-features {
        margin-top: 1.5rem;
        padding-top: 1rem;
        border-top: 1px solid #e5e7eb;
        display: grid;
        grid-template-columns: repeat(1, 1fr);
        gap: 0.75rem;
    }
    @media(min-width: 640px) { .trust-features { grid-template-columns: repeat(3, 1fr); } }
    
    .trust-item {
        display: flex; align-items: center; gap: 0.5rem; 
        font-size: 0.8rem; color: #4b5563; font-weight: 500;
    }
    .trust-item span.material-symbols-outlined { color: var(--primary); font-size: 1.25rem; }
    
    /* Related Products */
    .section-title { font-size: 1.5rem; font-weight: 800; margin-bottom: 1.5rem; }
    .bg-light { background-color: #f9fafb; }
    
    .grid-4 { display: grid; grid-template-columns: repeat(2, 1fr); gap: 1.25rem; }
    @media(min-width: 1024px) { .grid-4 { grid-template-columns: repeat(4, 1fr); } }
    
    .product-card a { text-decoration: none; color: inherit; }
    .product-title { font-size: 0.95rem; margin-top: 0.75rem; margin-bottom: 0.25rem; font-weight: 600; }
    .price-sale { font-weight: 700; color: var(--primary); font-size: 0.95rem; }
</style>
@endsection

@section('scripts')
<script>
    function incrementQty() {
        const input = document.getElementById('quantity');
        input.value = parseInt(input.value) + 1;
    }

    function decrementQty() {
        const input = document.getElementById('quantity');
        if (parseInt(input.value) > 1) {
            input.value = parseInt(input.value) - 1;
        }
    }

    function changeImage(src, thumbnail) {
        const mainImage = document.getElementById('mainImage');
        // Simple fade effect
        mainImage.style.opacity = '0.8';
        setTimeout(() => {
            mainImage.src = src;
            mainImage.style.opacity = '1';
        }, 100);
        
        // Remove active class from all thumbnails
        document.querySelectorAll('.thumbnail').forEach(t => t.classList.remove('active'));
        // Add active class to clicked/hovered
        thumbnail.classList.add('active');
    }

    function addToCart(productId) {
        const quantity = document.getElementById('quantity').value;
        const btn = document.querySelector('.btn-primary');
        const originalText = btn.innerHTML;
        
        btn.innerHTML = 'Adding...';
        btn.disabled = true;

        fetch('{{ route("cart.add") }}', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({
                product_id: productId,
                quantity: quantity
            })
        })
        .then(response => response.json())
        .then(data => {
            if(data.success) {
                btn.innerHTML = 'Added!';
                btn.style.backgroundColor = '#059669'; // Success green
                setTimeout(() => {
                    btn.innerHTML = originalText;
                    btn.style.backgroundColor = ''; // Reset
                    btn.disabled = false;
                }, 2000);
            } else {
                alert('Error adding to cart');
                btn.innerHTML = originalText;
                btn.disabled = false;
            }
        })
        .catch(error => {
            console.error('Error:', error);
            btn.innerHTML = originalText;
            btn.disabled = false;
        });
    }
</script>
@endsection
