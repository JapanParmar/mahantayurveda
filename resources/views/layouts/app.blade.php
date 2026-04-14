<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>{{ $settings['site_name'] ?? 'Mahant Ayurveda' }} — @yield('title', 'Holistic Wellness')</title>
    <meta name="description" content="Premium Ayurvedic products and holistic wellness by Mahant Ayurveda.">
    <link href="https://fonts.googleapis.com" rel="preconnect"/>
    <link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect"/>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400&family=Outfit:wght@200;300;400;500;600;700;800&display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>
    <link rel="stylesheet" href="/css/landing.css">
    @yield('styles')
</head>
<body>

<!-- Custom Cursor -->
<div class="custom-cursor"></div>
<div class="custom-cursor-follower"></div>

<!-- Navigation -->
<nav class="navbar scanned-nav scrolled">
    <div class="container">
        <div class="nav-container">
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
            <div class="nav-links" id="navLinks">
                <a href="{{ url('/') }}">Home</a>
                <a href="{{ url('/') }}#philosophy">Rituals</a>
                <a href="{{ route('products.index') }}">Shop</a>
                <a href="{{ url('/') }}#about">About</a>
                <a href="{{ url('/') }}#consult">Contact</a>
            </div>
            <div class="nav-actions">
                <a href="{{ route('cart.index') }}" class="btn-icon" style="margin-right: 0.5rem;">
                    <span class="material-symbols-outlined">shopping_bag</span>
                </a>
                <a href="{{ url('/') }}#consult" class="btn btn-outline" style="display: none;">Book Consult</a>
                <style>@media(min-width:768px){ .nav-actions .btn-outline { display: inline-flex !important; } }</style>
                <button class="mobile-menu-btn" id="mobileMenuBtn">
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
                <p style="color: var(--text-muted); font-size: 0.875rem; line-height: 1.7; margin-bottom: 1.5rem;">
                    {{ $settings['footer_text'] ?? 'Bridging the gap between ancient wisdom and modern living.' }}
                </p>
                <div class="social-links">
                    @if(isset($settings['instagram_url']) && $settings['instagram_url'])
                    <a class="social-icon" href="{{ $settings['instagram_url'] }}" target="_blank"><span style="font-size: 0.7rem; font-weight: 700;">IG</span></a>
                    @endif
                    @if(isset($settings['facebook_url']) && $settings['facebook_url'])
                    <a class="social-icon" href="{{ $settings['facebook_url'] }}" target="_blank"><span style="font-size: 0.7rem; font-weight: 700;">FB</span></a>
                    @endif
                    @if(isset($settings['youtube_url']) && $settings['youtube_url'])
                    <a class="social-icon" href="{{ $settings['youtube_url'] }}" target="_blank"><span style="font-size: 0.7rem; font-weight: 700;">YT</span></a>
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
                </ul>
            </div>
            <div class="footer-section">
                <h4>Stay Balanced</h4>
                <p style="color: var(--text-muted); font-size: 0.875rem; margin-bottom: 1rem;">Subscribe for wellness tips and exclusive offers.</p>
                <div class="newsletter-form">
                    <input class="newsletter-input" placeholder="Your email" type="email"/>
                    <button class="btn btn-primary" style="padding: 0.625rem 1.25rem;">Join</button>
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

<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js"></script>
<script src="https://cdn.jsdelivr.net/gh/studio-freight/lenis@1.0.29/bundled/lenis.min.js"></script>
<script src="https://unpkg.com/split-type"></script>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // 1. Mobile Menu
    const menuBtn = document.getElementById('mobileMenuBtn');
    const navLinks = document.getElementById('navLinks');
    if(menuBtn && navLinks) {
        menuBtn.addEventListener('click', () => {
            navLinks.classList.toggle('active');
            menuBtn.querySelector('.material-symbols-outlined').textContent = navLinks.classList.contains('active') ? 'close' : 'menu';
        });
    }

    // 2. Custom Cursor (only on desktop)
    const cursor = document.querySelector('.custom-cursor');
    const follower = document.querySelector('.custom-cursor-follower');
    if (window.innerWidth > 768 && cursor && follower) {
        let posX = 0, posY = 0, mouseX = 0, mouseY = 0;
        
        gsap.to({}, 0.016, {
            repeat: -1,
            onRepeat: function() {
                posX += (mouseX - posX) / 9;
                posY += (mouseY - posY) / 9;
                gsap.set(follower, { css: { left: posX, top: posY }});
                gsap.set(cursor, { css: { left: mouseX, top: mouseY }});
            }
        });

        document.addEventListener('mousemove', function(e) {
            mouseX = e.clientX;
            mouseY = e.clientY;
        });

        const hoverElements = document.querySelectorAll('a, button, .slider-btn, .thumbnail, .play-overlay');
        hoverElements.forEach(el => {
            el.addEventListener('mouseenter', () => {
                cursor.classList.add('hover');
                follower.classList.add('hover');
                if(el.classList.contains('play-overlay')) {
                    cursor.innerHTML = '<span style="color:var(--color-forest);font-size:10px;text-align:center;display:block;line-height:60px;font-weight:bold;">PLAY</span>';
                }
            });
            el.addEventListener('mouseleave', () => {
                cursor.classList.remove('hover');
                follower.classList.remove('hover');
                cursor.innerHTML = '';
            });
        });
    }

    // 3. Lenis Smooth Scroll
    if (typeof Lenis !== 'undefined') {
        const lenis = new Lenis({
            duration: 1.2,
            easing: (t) => Math.min(1, 1.001 - Math.pow(2, -10 * t)),
            smooth: true,
        });

        function raf(time) {
            lenis.raf(time);
            requestAnimationFrame(raf);
        }
        requestAnimationFrame(raf);
        
        // Sync Lenis with GSAP ScrollTrigger
        lenis.on('scroll', ScrollTrigger.update);
        gsap.ticker.add((time)=>{
          lenis.raf(time * 1000)
        });
        gsap.ticker.lagSmoothing(0);
    }
});
</script>
@yield('scripts')
</body>
</html>
