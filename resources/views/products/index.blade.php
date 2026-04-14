@extends('layouts.app')

@section('title', 'Shop All')

@section('content')
<section class="section" style="padding-top: 2rem;">
    <div class="container">
        <div style="text-align: center; margin-bottom: 4rem;">
            <span class="section-label" style="justify-content: center;">Our Products</span>
            <h1 class="section-title" style="text-align: center;">Our <em>Collection</em></h1>
            <p class="section-text" style="margin: 0 auto;">Purity and potency in every drop.</p>
        </div>

        <div class="grid-3">
            @forelse($products as $product)
            <div class="product-card fade-in">
                <a href="{{ route('products.show', $product->id) }}" style="text-decoration: none; color: inherit; display: block;">
                    <div class="product-image-wrapper">
                        <div class="product-image" style="background-image: url('{{ $product->image ? Storage::url($product->image) : asset('images/placeholder.png') }}');"></div>
                        @if($product->badge)
                        <div class="badge">{{ $product->badge }}</div>
                        @endif
                    </div>
                    <div class="product-details">
                        <div class="product-header">
                            <h3 class="product-title">{{ $product->name }}</h3>
                            @if($product->rating)
                            <div class="rating">
                                <span class="material-symbols-outlined" style="font-size: 0.875rem;">star</span> {{ $product->rating }}
                            </div>
                            @endif
                        </div>
                        <p class="product-desc">{{ Str::limit($product->description, 80) }}</p>
                        <div class="product-footer">
                            <div class="price-wrapper">
                                @if($product->is_on_sale)
                                    <span class="price-original">₹{{ $product->price }}</span>
                                    <span class="price-sale">₹{{ $product->sale_price }}</span>
                                    <span class="price-discount">{{ $product->discount_percentage }}% OFF</span>
                                @else
                                    <span class="price-sale">₹{{ $product->price }}</span>
                                @endif
                            </div>
                            <button class="btn-icon">
                                <span class="material-symbols-outlined" style="font-size: 1.125rem;">add_shopping_cart</span>
                            </button>
                        </div>
                    </div>
                </a>
            </div>
            @empty
            <div style="grid-column: 1 / -1; text-align: center; padding: 4rem;">
                <p style="color: var(--text-muted);">No products found. Please come back later.</p>
            </div>
            @endforelse
        </div>
    </div>
</section>
@endsection
