<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>Mahant Ayurveda — Premium Ayurvedic Care</title>
    <meta name="description" content="Embrace ancient wisdom with Mahant Ayurveda. Premium, authentic Ayurvedic products and holistic wellness treatments.">
    <link href="https://fonts.googleapis.com" rel="preconnect"/>
    <link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect"/>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400&family=Outfit:wght@200;300;400;500;600;700;800&display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>
    <link rel="stylesheet" href="css/landing.css">
</head>
<body>

<!-- Navigation -->
<nav class="navbar" id="mainNav">
    <div class="container">
        <div class="nav-container">
            <div class="logo">
                @if(isset($settings['logo']) && $settings['logo'])
                    <img src="{{ Storage::url($settings['logo']) }}" alt="{{ $settings['site_name'] ?? 'Mahant Ayurveda' }}">
                @else
                    <img src="{{ asset('images/logo.png') }}" alt="Logo">
                @endif
                <span class="logo-text">{{ $settings['site_name'] ?? 'Mahant Ayurveda' }}</span>
            </div>
            <div class="nav-links" id="navLinks">
                <a href="#">Shop</a>
                <a href="#philosophy">Rituals</a>
                <a href="#about">Wellness</a>
                <a href="#consult">About</a>
                <a href="{{ route('cart.index') }}">Cart</a>
            </div>
            <div class="nav-actions">
                <a href="{{ route('cart.index') }}" class="btn-icon" style="margin-right: 0.5rem;">
                    <span class="material-symbols-outlined">shopping_bag</span>
                </a>
                <a href="#consult" class="btn btn-outline" style="display: none;">Book Consult</a>
                <style>@media(min-width:768px){ .nav-actions .btn-outline { display: inline-flex !important; } }</style>
                <button class="mobile-menu-btn" id="mobileMenuBtn">
                    <span class="material-symbols-outlined">menu</span>
                </button>
            </div>
        </div>
    </div>
</nav>

<!-- Leaf Decorations -->
<div class="page-decorations">
    <img src="{{ asset('images/leaf1.png') }}" class="scatter-leaf leaf-type-1 pos-1" alt="">
    <img src="{{ asset('images/leaf1.png') }}" class="scatter-leaf leaf-type-1 pos-2" alt="">
    <img src="{{ asset('images/leaf1.png') }}" class="scatter-leaf leaf-type-1 pos-3" alt="">
    <img src="{{ asset('images/leaf1.png') }}" class="scatter-leaf leaf-type-1 pos-4" alt="">
    <img src="{{ asset('images/leaf2.png') }}" class="scatter-leaf leaf-type-2 pos-5" alt="">
    <img src="{{ asset('images/leaf2.png') }}" class="scatter-leaf leaf-type-2 pos-6" alt="">
    <img src="{{ asset('images/leaf2.png') }}" class="scatter-leaf leaf-type-2 pos-7" alt="">
    <img src="{{ asset('images/leaf2.png') }}" class="scatter-leaf leaf-type-2 pos-8" alt="">
    <img src="{{ asset('images/leaf3.png') }}" class="scatter-leaf leaf-type-3 pos-9" alt="">
    <img src="{{ asset('images/leaf3.png') }}" class="scatter-leaf leaf-type-3 pos-10" alt="">
    <img src="{{ asset('images/leaf3.png') }}" class="scatter-leaf leaf-type-3 pos-11" alt="">
    <img src="{{ asset('images/leaf3.png') }}" class="scatter-leaf leaf-type-3 pos-12" alt="">
</div>

<!-- Hero Section -->
@if($hero)
<section class="hero" id="hero">
    <div class="hero-bg">
        <div class="hero-overlay"></div>
        <div class="hero-image" style="background-image: url('{{ $hero->background_image ? Storage::url($hero->background_image) : 'https://lh3.googleusercontent.com/aida-public/AB6AXuBnTIEo-Nmb2cNaKGS9QQq8AQk7SB33ruKxoMq77exszJRSrfBZWnr1oN1dAuelZ0NdFnS0zeK0CktKaJtciYvn86CAO5bYmHSBZ8g116QcsqiaisebP7oJOSaHi64pzQhIB57YwQUomrk-npA7UjtxRuRg71f6vGUeyD0vW86kSQq3tr1vl5rQuvrYos8CdCBL-OOo6cx36YJeYX5rU6K4hf7IKQruxddgyz4IOSwTCp9xLxJHz1ppXdrCFw9d2n_Z_QC7_zNOZniP' }}');"></div>
    </div>
    <div class="container" style="width: 85%;">
        <div class="hero-content">
            @if($hero->badge_text)
            <span class="hero-badge">
                <span class="material-symbols-outlined" style="font-size: 0.875rem;">spa</span>
                {{ $hero->badge_text }}
            </span>
            @endif
            <h1 class="hero-title">{!! $hero->title !!}</h1>
            <p class="hero-subtitle">{{ $hero->subtitle }}</p>
            <div class="hero-actions">
                @if($hero->button1_text)
                <a href="{{ $hero->button1_url ?? route('products.index') }}" class="btn btn-primary">
                    {{ $hero->button1_text }}
                    <span class="material-symbols-outlined" style="font-size: 1.125rem;">arrow_forward</span>
                </a>
                @endif
                @if($hero->button2_text)
                <a href="{{ $hero->button2_url ?? '#consult' }}" class="btn btn-outline-light">
                    {{ $hero->button2_text }}
                </a>
                @endif
            </div>
        </div>
    </div>
</section>
@endif

<!-- Philosophy / Mission Section -->
<section class="section bg-white" id="philosophy">
    <div class="container">
        <div class="services-container">
            <div class="services-content">
                <div class="philosophy-header">
                    <span class="section-label">Our Philosophy</span>
                    <h2 class="section-title">Our Mission — <em>Your Impact</em></h2>
                    <p class="card-text" style="font-size: 1.0625rem; margin-bottom: 2rem;">
                        Ayurveda is more than just herbs; it is a philosophy of balance, purity, <br> and wisdom that guides us to better living.
                    </p>
                </div>
                <div class="services-grid">
                    @foreach($philosophyCards as $card)
                    <div class="service-item">
                        <div class="service-icon">
                            <span class="material-symbols-outlined">{{ $card->icon }}</span>
                            <h4 class="service-title">{{ $card->title }}</h4>
                        </div>
                    </div>
                    @endforeach
                </div>
                <img src="{{ asset('images/corner-img.png') }}" class="philosophy-corner-img" alt="">
            </div>
        </div>
    </div>
</section>

<!-- Product Collection -->
<section class="section bg-sand" id="products">
    <div class="container">
        <div class="section-header">
            <div>
                <span class="section-label">Curated Collection</span>
                <h2 class="section-title">Editorial <em>Collection</em></h2>
                <p class="section-text" style="max-width:400px;">Curated essentials for your daily ritual.</p>
            </div>
            <a class="view-all" href="{{ route('products.index') }}">
                View All Products <span class="material-symbols-outlined" style="font-size: 1rem;">arrow_forward</span>
            </a>
        </div>
        <div class="product-slider-container">
            <div class="product-slider">
                <div class="product-track">
                    @foreach($products as $product)
                    <div class="product-slide">
                        <a href="{{ route('products.show', $product->id) }}" style="text-decoration: none; color: inherit; display: block; height: 100%;">
                            <div class="product-card">
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
                                    <p class="product-desc">{{ $product->description }}</p>
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
                            </div>
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
            <button class="slider-btn product-prev-btn" aria-label="Previous"><span class="material-symbols-outlined">chevron_left</span></button>
            <button class="slider-btn product-next-btn" aria-label="Next"><span class="material-symbols-outlined">chevron_right</span></button>
            <div class="slider-dots product-slider-dots"></div>
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const track = document.querySelector('.product-track');
                const slides = document.querySelectorAll('.product-slide');
                const nextBtn = document.querySelector('.product-next-btn');
                const prevBtn = document.querySelector('.product-prev-btn');
                const dotsContainer = document.querySelector('.product-slider-dots');
                if (!track || slides.length === 0) return;
                let currentIndex = 0, slidesPerView = 3, autoPlayInterval;

                function updateSlidesPerView() {
                    slidesPerView = window.innerWidth < 768 ? 1 : window.innerWidth < 1024 ? 2 : 3;
                    updateSliderPosition(); createDots();
                }
                function createDots() {
                    dotsContainer.innerHTML = '';
                    if (slides.length <= slidesPerView) { dotsContainer.style.display='none'; if(nextBtn)nextBtn.style.display='none'; if(prevBtn)prevBtn.style.display='none'; return; }
                    dotsContainer.style.display='flex'; if(nextBtn)nextBtn.style.display='flex'; if(prevBtn)prevBtn.style.display='flex';
                    const n = slides.length - slidesPerView + 1;
                    for (let i=0;i<n;i++) { const d=document.createElement('div'); d.classList.add('slider-dot'); if(i===currentIndex)d.classList.add('active'); d.addEventListener('click',()=>{currentIndex=i;updateSliderPosition();resetAutoPlay();}); dotsContainer.appendChild(d); }
                }
                function updateDots() { document.querySelectorAll('.product-slider-dots .slider-dot').forEach((d,i)=>{d.classList.toggle('active',i===currentIndex);}); }
                function updateSliderPosition() { track.style.transform=`translateX(-${currentIndex*(100/slidesPerView)}%)`; updateDots(); }
                function nextSlide() { currentIndex = currentIndex < slides.length-slidesPerView ? currentIndex+1 : 0; updateSliderPosition(); }
                function prevSlide() { currentIndex = currentIndex > 0 ? currentIndex-1 : slides.length-slidesPerView; updateSliderPosition(); }
                if(nextBtn)nextBtn.addEventListener('click',()=>{nextSlide();resetAutoPlay();});
                if(prevBtn)prevBtn.addEventListener('click',()=>{prevSlide();resetAutoPlay();});
                function startAutoPlay(){autoPlayInterval=setInterval(nextSlide,4000);}
                function resetAutoPlay(){clearInterval(autoPlayInterval);startAutoPlay();}
                window.addEventListener('resize',updateSlidesPerView);
                updateSlidesPerView(); startAutoPlay();
            });
        </script>
    </div>
</section>

<!-- Video Stories -->
<section class="section" id="about">
    <div class="container gap-24">
        @foreach($videoStories as $story)
        <div class="story-block {{ $story->is_reversed ? 'reverse' : '' }}">
            <div class="story-content">
                <div class="story-label">
                    <span class="story-line"></span> {{ $story->label }}
                </div>
                <h2 class="story-heading">{!! $story->heading !!}</h2>
                <p class="story-text">{{ $story->text }}</p>
                <a href="{{ $story->button_url ?? '#' }}" class="link-btn">
                    {{ $story->button_text ?? 'Learn More' }} <span class="material-symbols-outlined" style="font-size: 1rem;">arrow_outward</span>
                </a>
            </div>
            <div class="video-wrapper">
                <div class="video-thumb" style="background-image: url('{{ $story->thumbnail ? Storage::url($story->thumbnail) : '' }}');"></div>
                <div class="play-overlay">
                    <div class="play-btn">
                        <span class="material-symbols-outlined" style="font-size: 2rem; color: #C8A96E;">play_arrow</span>
                    </div>
                </div>
                @if($story->video_url)
                    <iframe class="video-iframe" src="{{ $story->video_url }}" title="Video" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen style="display:none;position:absolute;top:0;left:0;width:100%;height:100%;"></iframe>
                @elseif($story->video_path)
                    <video class="video-player" style="display:none;position:absolute;top:0;left:0;width:100%;height:100%;object-fit:cover;" controls>
                        <source src="{{ Storage::url($story->video_path) }}" type="video/mp4">
                    </video>
                @endif
            </div>
        </div>
        @endforeach
    </div>
</section>

<!-- Testimonials -->
<section class="section bg-sand">
    <div class="container">
        <div style="text-align: center; margin-bottom: 3rem;">
            <span class="section-label" style="justify-content: center;">Testimonials</span>
            <h2 class="section-title" style="text-align: center;">Healing <em>Stories</em></h2>
        </div>
        <div class="testimonial-slider-container">
            <div class="testimonial-slider">
                <div class="testimonial-track">
                    @foreach($testimonials as $testimonial)
                    <div class="testimonial-slide">
                        <div class="testimonial-card">
                            <div class="rating" style="margin-bottom: 1rem;">
                                @for($i = 0; $i < $testimonial->rating; $i++)
                                <span class="material-symbols-outlined" style="font-size: 0.875rem; color: var(--accent);">star</span>
                                @endfor
                            </div>
                            <p class="quote">"{{ $testimonial->quote }}"</p>
                            <div class="user-profile">
                                @if($testimonial->avatar)
                                <div class="avatar" style="background-image: url('{{ Storage::url($testimonial->avatar) }}');"></div>
                                @else
                                <div class="avatar">{{ substr($testimonial->name, 0, 1) }}</div>
                                @endif
                                <div class="user-info">
                                    <p>{{ $testimonial->name }}{{ $testimonial->location ? ', ' . $testimonial->location : '' }}</p>
                                    @if($testimonial->treatment)
                                    <p>{{ $testimonial->treatment }}</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <button class="slider-btn prev-btn" aria-label="Previous"><span class="material-symbols-outlined">chevron_left</span></button>
            <button class="slider-btn next-btn" aria-label="Next"><span class="material-symbols-outlined">chevron_right</span></button>
            <div class="slider-dots"></div>
        </div>
    </div>
</section>

<!-- Testimonial Slider Script -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    const track = document.querySelector('.testimonial-track');
    const slides = document.querySelectorAll('.testimonial-slide');
    const nextBtn = document.querySelector('.next-btn');
    const prevBtn = document.querySelector('.prev-btn');
    const dotsContainer = document.querySelector('.slider-dots');
    if (!track || slides.length === 0) return;
    let currentIndex = 0, slidesPerView = 3, autoPlayInterval;

    function updateSPV() {
        slidesPerView = window.innerWidth < 768 ? 1 : window.innerWidth < 1024 ? 2 : 3;
        updatePos(); createDots();
    }
    function createDots() {
        dotsContainer.innerHTML = '';
        if (slides.length <= slidesPerView) return;
        const n = slides.length - slidesPerView + 1;
        for (let i=0;i<n;i++) { const d=document.createElement('div'); d.classList.add('slider-dot'); if(i===currentIndex)d.classList.add('active'); d.addEventListener('click',()=>{currentIndex=i;updatePos();resetAP();}); dotsContainer.appendChild(d); }
    }
    function updateDots() { document.querySelectorAll('.slider-dots .slider-dot').forEach((d,i)=>{d.classList.toggle('active',i===currentIndex);}); }
    function updatePos() { track.style.transform=`translateX(-${currentIndex*(100/slidesPerView)}%)`; updateDots(); }
    function next() { currentIndex = currentIndex < slides.length-slidesPerView ? currentIndex+1 : 0; updatePos(); }
    function prev() { currentIndex = currentIndex > 0 ? currentIndex-1 : slides.length-slidesPerView; updatePos(); }
    nextBtn.addEventListener('click',()=>{next();resetAP();});
    prevBtn.addEventListener('click',()=>{prev();resetAP();});
    function startAP(){autoPlayInterval=setInterval(next,4000);}
    function resetAP(){clearInterval(autoPlayInterval);startAP();}
    window.addEventListener('resize',updateSPV);
    updateSPV(); startAP();
});
</script>

<!-- Consultation Section -->
<section class="section bg-primary-light-alpha" id="consult">
    <div class="container">
        <div class="consult-container">
            <div style="flex: 1;">
                <span class="hero-badge" style="margin-bottom: 1.5rem; display: inline-flex;">
                    <span class="material-symbols-outlined" style="font-size: 0.875rem;">health_and_safety</span>
                    Holistic Care
                </span>
                <h2 class="section-title">Book Your <em>Doctor's Visit</em></h2>
                <p class="section-text" style="margin-bottom: 2rem;">
                    Unsure about your Dosha? Book a 1-on-1 virtual consultation with our certified Vaidyas to get a personalized wellness plan.
                </p>
                <ul class="check-list">
                    <li><span class="material-symbols-outlined">check_circle</span> 45-minute in-depth analysis</li>
                    <li><span class="material-symbols-outlined">check_circle</span> Personalized diet chart</li>
                    <li><span class="material-symbols-outlined">check_circle</span> Follow-up support</li>
                </ul>
            </div>
            <div class="consult-form-card">
                @if(session('success'))
                <script>document.addEventListener('DOMContentLoaded',()=>alert("{{ session('success') }}"));</script>
                @endif
                @if($errors->any())
                <script>document.addEventListener('DOMContentLoaded',()=>{let m="Booking Failed:\n";@foreach($errors->all() as $error)m+="- {{ $error }}\n";@endforeach alert(m);});</script>
                @endif
                <form action="{{ route('book.appointment') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label class="form-label" for="name">Full Name</label>
                        <input class="form-input" id="name" name="name" value="{{ old('name') }}" placeholder="Enter your name" type="text" required/>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="phone">Phone Number</label>
                        <input class="form-input" id="phone" name="phone" value="{{ old('phone') }}" placeholder="Enter phone number" type="tel" pattern="[0-9]{10}" maxlength="10" title="Enter exactly 10 digits" oninput="this.value=this.value.replace(/[^0-9]/g,'').slice(0,10)" required/>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="concern">State</label>
                        <select class="form-input" id="concern" name="state" required>
                            <option value="">Select State</option>
                            <option value="Andhra Pradesh">Andhra Pradesh</option><option value="Arunachal Pradesh">Arunachal Pradesh</option><option value="Assam">Assam</option><option value="Bihar">Bihar</option><option value="Chhattisgarh">Chhattisgarh</option><option value="Goa">Goa</option><option value="Gujarat">Gujarat</option><option value="Haryana">Haryana</option><option value="Himachal Pradesh">Himachal Pradesh</option><option value="Jammu and Kashmir">Jammu and Kashmir</option><option value="Jharkhand">Jharkhand</option><option value="Karnataka">Karnataka</option><option value="Kerala">Kerala</option><option value="Madhya Pradesh">Madhya Pradesh</option><option value="Maharashtra">Maharashtra</option><option value="Manipur">Manipur</option><option value="Meghalaya">Meghalaya</option><option value="Mizoram">Mizoram</option><option value="Nagaland">Nagaland</option><option value="Odisha">Odisha</option><option value="Punjab">Punjab</option><option value="Rajasthan">Rajasthan</option><option value="Sikkim">Sikkim</option><option value="Tamil Nadu">Tamil Nadu</option><option value="Telangana">Telangana</option><option value="Tripura">Tripura</option><option value="Uttar Pradesh">Uttar Pradesh</option><option value="Uttarakhand">Uttarakhand</option><option value="West Bengal">West Bengal</option>
                        </select>
                    </div>
                    <div class="form-group" style="display: flex; gap: 1rem;">
                        <div style="flex: 1;">
                            <label class="form-label" for="district">District</label>
                            <input class="form-input" id="district" name="district" value="{{ old('district') }}" placeholder="District" type="text" required>
                        </div>
                        <div style="flex: 1;">
                            <label class="form-label" for="city">City</label>
                            <input class="form-input" id="city" name="city" value="{{ old('city') }}" placeholder="City" type="text" required>
                        </div>
                    </div>
                    <button class="btn btn-primary" type="submit" style="width: 100%; margin-top: 0.5rem;">
                        Request Appointment
                        <span class="material-symbols-outlined" style="font-size: 1rem;">arrow_forward</span>
                    </button>
                    <p style="font-size: 0.7rem; text-align: center; color: var(--text-muted); margin-top: 1rem;">We respect your privacy. Your information is safe with us.</p>
                </form>
            </div>
        </div>
    </div>
</section>

<!-- Trust Indicators -->
<section class="features">
    <div class="container">
        <div class="features-grid">
            @foreach($services as $service)
            <div class="feature">
                <span class="material-symbols-outlined">{{ $service->icon }}</span>
                <span>{{ $service->text }}</span>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Map Section -->
<section class="section" id="location">
    <div class="container">
        <div style="text-align: center; margin-bottom: 3rem;">
            <span class="section-label" style="justify-content: center;">Our Location</span>
            <h2 class="section-title" style="text-align: center;">Visit Our <em>Clinic</em></h2>
            <p class="section-text" style="margin: 0 auto;">Experience authentic ayurveda at our center.</p>
        </div>
        @if(isset($settings['map_embed_url']) && $settings['map_embed_url'])
        <div class="map-container" style="border-radius: var(--radius-lg); overflow: hidden; height: 400px; width: 100%;">
            <iframe src="{{ $settings['map_embed_url'] }}" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
        @endif
        <div style="text-align: center; margin-top: 2rem;">
            <h4 style="font-family: var(--font-heading); font-size: 1.5rem; font-weight: 500; color: var(--text-heading);">{{ $settings['clinic_name'] ?? 'Mahant Ayurveda Clinic' }}</h4>
            <p style="color: var(--text-muted); margin-top: 0.5rem;">{{ $settings['address'] ?? '123 Wellness Street, Rajkot, Gujarat' }}</p>
            <p style="color: var(--text-muted); margin-top: 0.5rem;">{{ $settings['clinic_hours'] ?? 'Daily: 9:00 AM - 8:00 PM' }}</p>
        </div>
    </div>
</section>

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
                    <li><a href="#about">Our Story</a></li>
                    <li><a href="{{ route('products.index') }}">All Products</a></li>
                    <li><a href="#philosophy">The Philosophy</a></li>
                    <li><a href="#consult">Consult a Doctor</a></li>
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

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Mobile Menu
    const menuBtn = document.getElementById('mobileMenuBtn');
    const navLinks = document.getElementById('navLinks');
    if(menuBtn && navLinks) {
        menuBtn.addEventListener('click', () => {
            navLinks.classList.toggle('active');
            menuBtn.querySelector('.material-symbols-outlined').textContent = navLinks.classList.contains('active') ? 'close' : 'menu';
        });
    }

    // Navbar Scroll
    const navbar = document.getElementById('mainNav');
    if (navbar) {
        window.addEventListener('scroll', () => navbar.classList.toggle('scrolled', window.scrollY > 30));
        if (window.scrollY > 30) navbar.classList.add('scrolled');
    }

    // Awwwards Style GSAP Animations
    if (typeof gsap !== 'undefined' && typeof ScrollTrigger !== 'undefined' && typeof SplitType !== 'undefined') {
        gsap.registerPlugin(ScrollTrigger);

        // 1. Split Text Animation for Headings
        const splitHeadings = new SplitType('.section-title, .hero-title, .story-heading', { types: 'lines, words' });
        
        document.querySelectorAll('.section-title, .hero-title, .story-heading').forEach(heading => {
            const words = heading.querySelectorAll('.word');
            gsap.from(words, {
                scrollTrigger: {
                    trigger: heading,
                    start: "top 85%",
                },
                y: 40,
                opacity: 0,
                duration: 1,
                stagger: 0.05,
                ease: "power3.out"
            });
        });

        // 2. Parallax Leaves with GSAP instead of CSS
        document.querySelectorAll('.scatter-leaf').forEach((leaf, i) => {
            gsap.to(leaf, {
                yPercent: (i % 2 === 0) ? -50 : 50,
                rotation: (i % 2 === 0) ? 20 : -20,
                ease: "none",
                scrollTrigger: {
                    trigger: "body",
                    start: "top top",
                    end: "bottom bottom",
                    scrub: 1.5
                }
            });
        });

        // 3. Staggered reveal for Cards/Elements
        const cardsArrays = [
            document.querySelectorAll('.service-item'),
            document.querySelectorAll('.product-slide'),
            document.querySelectorAll('.feature'),
            document.querySelectorAll('.testimonial-slide')
        ];

        cardsArrays.forEach(cards => {
            if(cards.length > 0) {
                gsap.from(cards, {
                    scrollTrigger: {
                        trigger: cards[0].parentElement,
                        start: "top 85%"
                    },
                    y: 50,
                    opacity: 0,
                    duration: 0.8,
                    stagger: 0.1,
                    ease: "power2.out"
                });
            }
        });

        // 4. Parallax Image Reveals
        document.querySelectorAll('.video-wrapper, .map-container, .product-image').forEach(container => {
            gsap.from(container, {
                scrollTrigger: {
                    trigger: container,
                    start: "top 90%"
                },
                scale: 0.95,
                opacity: 0,
                duration: 1.2,
                ease: "expo.out"
            });
        });

    } else {
        // Fallback if GSAP fails to load
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('reveal-visible');
                    observer.unobserve(entry.target);
                }
            });
        }, { threshold: 0.08 });

        document.querySelectorAll('.hero-content, .section-title, .product-card, .story-block, .testimonial-card, .consult-container, .service-item, .map-container').forEach(el => {
            el.classList.add('reveal-up');
            observer.observe(el);
        });
    }

    // Video Play
    document.querySelectorAll('.play-overlay').forEach(btn => {
        btn.addEventListener('click', function() {
            const wrapper = this.parentElement;
            const iframe = wrapper.querySelector('.video-iframe');
            const video = wrapper.querySelector('.video-player');
            const thumb = wrapper.querySelector('.video-thumb');
            if(thumb) thumb.style.display='none';
            this.style.display='none';
            if(iframe) {
                iframe.style.display='block';
                let src=iframe.src;
                if(src.includes('youtube.com/watch')){const id=new URL(src).searchParams.get('v');if(id)src=`https://www.youtube.com/embed/${id}`;}
                else if(src.includes('youtu.be/')){src=`https://www.youtube.com/embed/${src.split('youtu.be/')[1].split('?')[0]}`;}
                if(src.includes('vimeo.com/')&&!src.includes('/video/')){src=`https://player.vimeo.com/video/${src.split('vimeo.com/')[1].split('?')[0]}`;}
                iframe.src=src+(src.includes('?')?'&':'?')+'autoplay=1';
            } else if(video) { video.style.display='block'; video.play().catch(console.error); }
        });
    });
});
</script>
</body>
</html>