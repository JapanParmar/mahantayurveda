<!DOCTYPE html>
<html class="light" lang="en">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>{{ $settings['site_name'] ?? 'Mahant Ayurveda' }} - @yield('title', 'Holistic Wellness')</title>
    <link href="https://fonts.googleapis.com" rel="preconnect"/>
    <link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect"/>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@200..800&display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>
    <!-- <link rel="stylesheet" href="{{ asset('css/landing.css') }}"> -->
    <link rel="stylesheet" href="/css/landing.css">
    @yield('styles')
    <style>
        /* Scoped styles for inner pages if needed */
        .page-content {
            padding-top: 80px; /* Space for fixed navbar */
            min-height: 60vh;
        }
    </style>
</head>
<body>

<!-- Navigation -->
<nav class="navbar scanned-nav scrolled">
    <div class="container">
        <div class="nav-container">
            <!-- Logo -->
            <div class="logo">
                <a href="{{ url('/') }}" style="display: flex; align-items: center; text-decoration: none; color: inherit;">
                    @if(isset($settings['logo']) && $settings['logo'])
                        <img src="{{ Storage::url($settings['logo']) }}" alt="{{ $settings['site_name'] ?? 'Mahant Ayurveda' }}">
                    @else
                        <img src="{{ asset('images/logo.png') }}" alt="Logo">
                    @endif
                    <span class="logo-text">{{ $settings['site_name'] ?? 'Mahant Ayurveda' }}</span>
                </a>
            </div>
            <!-- Desktop Menu -->
            <div class="nav-links">
                <a href="{{ url('/') }}">Home</a>
                <a href="{{ url('/') }}#consult">Treatments</a>
                <a href="{{ route('products.index') }}">Shop</a>
                <a href="{{ url('/') }}#about">About</a>
                <a href="{{ url('/') }}#consult">Contact</a>
            </div>
            <!-- CTA -->
            <div class="nav-actions">
                <!-- Cart Icon -->
                <a href="{{ route('cart.index') }}" class="btn-icon" style="color: var(--text-heading); margin-right: 1rem; position: relative;">
                    <span class="material-symbols-outlined">shopping_bag</span>
                    <!-- <span class="badge" style="position: absolute; top: -5px; right: -5px; background: var(--primary); color: white; border-radius: 50%; width: 18px; height: 18px; font-size: 10px; display: flex; align-items: center; justify-content: center;">0</span> -->
                </a>

                <button class="btn btn-primary" style="display: none;" onclick="window.location.href='{{ url('/') }}#consult'">
                    Book Now
                </button>
                <style>@media(min-width:768px){ .nav-actions button { display: inline-flex !important; } }</style>
                <!-- Mobile Menu Button -->
                <button class="mobile-menu-btn">
                    <span class="material-symbols-outlined">menu</span>
                </button>
            </div>
        </div>
    </div>
</nav>

<div class="page-content">
    @yield('content')
</div>

<!-- Footer -->
<footer>
    <div class="container">
        <div class="footer-grid">
            <div class="footer-section">
                <div class="logo" style="margin-bottom: 1.5rem;">
                    <img src="{{ asset('images/logo.png') }}" alt="Logo" style="height: 40px; margin-right: 10px;">
                    <span class="logo-text">Mahant Ayurveda</span>
                </div>
                <p style="color: #9ca3af; font-size: 0.875rem; line-height: 1.6; margin-bottom: 1.5rem;">
                    {{ $settings['footer_text'] ?? 'Bridging the gap between ancient wisdom and modern living. Bringing balance to your life through the power of Ayurveda.' }}
                </p>
                <div class="social-links">
                    @if(isset($settings['instagram_url']) && $settings['instagram_url'])
                    <a class="social-icon" href="{{ $settings['instagram_url'] }}" target="_blank"><span style="font-size: 0.75rem; font-weight: 700;">IG</span></a>
                    @endif
                    @if(isset($settings['facebook_url']) && $settings['facebook_url'])
                    <a class="social-icon" href="{{ $settings['facebook_url'] }}" target="_blank"><span style="font-size: 0.75rem; font-weight: 700;">FB</span></a>
                    @endif
                    @if(isset($settings['youtube_url']) && $settings['youtube_url'])
                    <a class="social-icon" href="{{ $settings['youtube_url'] }}" target="_blank"><span style="font-size: 0.75rem; font-weight: 700;">YT</span></a>
                    @endif
                </div>
            </div>
            <div class="footer-section">
                <h4>Contact Us</h4>
                <ul class="footer-links">
                    <li>{{ $settings['phone'] ?? '+91 9265341378' }}</li>
                    <li>{{ $settings['email'] ?? 'mahantayurveda@gmail.com' }}</li>
                </ul>
            </div>
            <div class="footer-section">
                <h4>Company</h4>
                <ul class="footer-links">
                    <li><a href="{{ url('/') }}#about">Our Story</a></li>
                    <li><a href="{{ route('products.index') }}">All Products</a></li>
                    <li><a href="{{ url('/') }}#philosophy">The Philosophy</a></li>
                    <li><a href="{{ url('/') }}#consult">Consult a Doctor</a></li>
                    <li><a href="{{ url('/') }}#consult">Contact Us</a></li>
                </ul>
            </div>
            <div class="footer-section">
                <h4>Stay Balanced</h4>
                <p style="color: #9ca3af; font-size: 0.875rem; margin-bottom: 1rem;">Subscribe for wellness tips and exclusive offers.</p>
                <div class="newsletter-form">
                    <input class="newsletter-input" placeholder="Your email" type="email"/>
                    <button class="btn btn-primary" style="padding: 0.5rem 1rem;">Join</button>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <p>© 2026 JP Tech. All rights reserved.</p>
            <div style="display: flex; gap: 1.5rem;">
                <a href="#">Privacy Policy</a>
                <a href="#">Terms of Service</a>
            </div>
        </div>
    </div>
</footer>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Mobile Menu
        const menuBtn = document.querySelector('.mobile-menu-btn');
        const navLinks = document.querySelector('.nav-links');
        
        if(menuBtn && navLinks) {
            menuBtn.addEventListener('click', () => {
                navLinks.classList.toggle('active');
                const icon = menuBtn.querySelector('.material-symbols-outlined');
                if(icon) {
                    icon.textContent = navLinks.classList.contains('active') ? 'close' : 'menu';
                }
            });
        }

        // Navbar Scroll Effect
        // const navbar = document.querySelector('.navbar');
        // if (navbar) {
        //     window.addEventListener('scroll', () => {
        //         if (window.scrollY > 20) {
        //             navbar.classList.add('scrolled');
        //         } else {
        //             navbar.classList.remove('scrolled');
        //         }
        //     });
        //     if (window.scrollY > 20) {
        //         navbar.classList.add('scrolled');
        //     }
        // }
    });
</script>
@yield('scripts')
</body>
</html>
