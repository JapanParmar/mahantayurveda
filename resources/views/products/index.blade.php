@extends('layouts.app')

@section('title', 'Shop All')

@section('content')
<section class="section bg-sand">
    <div class="container">
        <div class="section-header" style="text-align: center; justify-content: center; margin-bottom: 4rem;">
            <div>
                <h1 class="section-title">Our Collection</h1>
                <p class="card-text">Purity and potency in every drop.</p>
            </div>
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
                                <span class="material-symbols-outlined" style="font-size: 1rem;">star</span> {{ $product->rating }}
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
                                <span class="material-symbols-outlined">add_shopping_cart</span>
                            </button>
                        </div>
                    </div>
                </a>
            </div>
            @empty
            <div style="grid-column: 1 / -1; text-align: center; padding: 4rem;">
                <p>No products found. Please come back later.</p>
            </div>
            @endforelse
        </div>
    </div>
</section>

<style>
    .grid-3 {
        display: grid;
        grid-template-columns: repeat(1, 1fr);
        gap: 2rem;
    }
    @media(min-width: 768px) {
        .grid-3 {
            grid-template-columns: repeat(2, 1fr);
        }
    }
    @media(min-width: 1024px) {
        .grid-3 {
            grid-template-columns: repeat(3, 1fr);
        }
    }
</style>
@endsection
