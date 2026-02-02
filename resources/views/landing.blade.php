<!DOCTYPE html>
<html class="light" lang="en">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>Mahant Ayurveda - Holistic Wellness</title>
    <link href="https://fonts.googleapis.com" rel="preconnect"/>
    <link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect"/>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@200..800&display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>
    <!-- <link rel="stylesheet" href="{{ asset('css/landing.css') }}"> -->
    <link rel="stylesheet" href="css/landing.css">
</head>
<body>
<!-- Navigation -->
<nav class="navbar">
    <div class="container">
        <div class="nav-container">
            <!-- Logo -->
            <div class="logo">
                @if(isset($settings['logo']) && $settings['logo'])
                    <img src="{{ Storage::url($settings['logo']) }}" alt="{{ $settings['site_name'] ?? 'Mahant Ayurveda' }}">
                @else
                    <img src="{{ asset('images/logo.png') }}" alt="Logo">
                @endif
                <span class="logo-text">{{ $settings['site_name'] ?? 'Mahant Ayurveda' }}</span>
            </div>
            <!-- Desktop Menu -->
            <div class="nav-links">
                <a href="#">Home</a>
                <a href="#consult">Treatments</a>
                <a href="#products">Shop</a>
                <a href="#about">About</a>
                <a href="#consult">Contact</a>
            </div>
            <!-- CTA -->
            <div class="nav-actions">
                 <a href="{{ route('cart.index') }}" class="btn-icon" style="color: var(--text-heading); margin-right: 1rem;">
                    <span class="material-symbols-outlined">shopping_bag</span>
                </a>
                <!-- <button class="btn btn-primary" style="display: none;">
                    Book Now
                </button> -->
                <style>@media(min-width:768px){ .nav-actions button { display: inline-flex !important; } }</style>
                <!-- Mobile Menu Button -->
                <button class="mobile-menu-btn">
                    <span class="material-symbols-outlined">menu</span>
                </button>
            </div>
        </div>
    </div>
</nav>
 <!-- Full Page Scatter Decorations -->
    <div class="page-decorations">
        <!-- Hemp Leaves -->
        <img src="{{ asset('images/leaf1.png') }}" class="scatter-leaf leaf-type-1 pos-1" alt="">
        <img src="{{ asset('images/leaf1.png') }}" class="scatter-leaf leaf-type-1 pos-2" alt="">
        <img src="{{ asset('images/leaf1.png') }}" class="scatter-leaf leaf-type-1 pos-3" alt="">
        <img src="{{ asset('images/leaf1.png') }}" class="scatter-leaf leaf-type-1 pos-4" alt="">
        
        <!-- Tulsi Leaves -->
        <img src="{{ asset('images/leaf2.png') }}" class="scatter-leaf leaf-type-2 pos-5" alt="">
        <img src="{{ asset('images/leaf2.png') }}" class="scatter-leaf leaf-type-2 pos-6" alt="">
        <img src="{{ asset('images/leaf2.png') }}" class="scatter-leaf leaf-type-2 pos-7" alt="">
        <img src="{{ asset('images/leaf2.png') }}" class="scatter-leaf leaf-type-2 pos-8" alt="">

        <!-- Neem Leaves -->
        <img src="{{ asset('images/leaf3.png') }}" class="scatter-leaf leaf-type-3 pos-9" alt="">
        <img src="{{ asset('images/leaf3.png') }}" class="scatter-leaf leaf-type-3 pos-10" alt="">
        <img src="{{ asset('images/leaf3.png') }}" class="scatter-leaf leaf-type-3 pos-11" alt="">
        <img src="{{ asset('images/leaf3.png') }}" class="scatter-leaf leaf-type-3 pos-12" alt="">
    </div>
<!-- Hero Section -->
@if($hero)
<section class="hero">
    <!-- Background Image with Overlay -->
    <div class="hero-bg">
        <div class="hero-overlay"></div>
        <div class="hero-image" style="background-image: url('{{ $hero->background_image ? Storage::url($hero->background_image) : 'https://lh3.googleusercontent.com/aida-public/AB6AXuBnTIEo-Nmb2cNaKGS9QZq8AQk7SB33ruKxoMq77exszJRSrfBZWnr1oN1dAuelZ0NdFnS0zeK0CktKaJtciYvn86CAO5bYmHSBZ8g116QcsqiaisebP7oJOSaHi64pzQhIB57YwQUomrk-npA7UjtxRuRg71f6vGUeyD0vW86kSQq3tr1vl5rQuvrYos8CdCBL-OOo6cx36YJeYX5rU6K4hf7IKQruxddgyz4IOSwTCp9xLxJHz1ppXdrCFw9d2n_Z_QC7_zNOZniP' }}');">
        </div>
    </div>
    
    <div class="container" style="width: 80%;">
        <div class="hero-content">
            @if($hero->badge_text)
            <span class="hero-badge">{{ $hero->badge_text }}</span>
            @endif
            <h1 class="hero-title">
                {!! $hero->title !!}
            </h1>
            <p class="hero-subtitle">
                {{ $hero->subtitle }}
            </p>
            <div class="hero-actions">
                @if($hero->button1_text)
                <a href="{{ $hero->button1_url ?? '#' }}" class="btn btn-outline-light">
                    {{ $hero->button1_text }}
                </a>
                @endif
                @if($hero->button2_text)
                <a href="{{ $hero->button2_url ?? '#' }}" class="btn btn-secondary">
                    {{ $hero->button2_text }}
                    <span class="material-symbols-outlined" style="font-size: 1.25rem;">calendar_month</span>
                </a>
                @endif
            </div>
        </div>
    </div>
</section>
@endif

<!-- Philosophy Section -->
<section class="section bg-white" id="philosophy">
    <div class="container">
        <div class="services-container">
            <!-- Left Side: Content -->
            <div class="services-content">
                <div class="philosophy-header">
                    <!-- <span class="subtitle">Our Philosophy</span> -->
                    <h3 class="section-title">Our Mission - Your Impact</h3>
                    <p class="card-text" style="font-size: 1.125rem; font-weight: bold; margin-bottom: 2rem;">
                        Ayurveda is more than just herbs; it is a philosophy of balance, purity, <br> and wisdom that guides us to better living.
                    </p>
                </div>
                <div class="services-grid">
                    @foreach($philosophyCards as $card)
                    <!-- Service Item -->
                    <div class="service-item">
                        <div class="service-icon">
                            <!-- Using the image/icon from card -->
                             <span class="material-symbols-outlined">{{ $card->icon }}</span>
                            <h4 class="service-title">{{ $card->title }}</h4>
                        </div>
                        <div class="service-info">
                            <!-- Optional: Show description if needed, or just title as per reference -->
                            <!-- <p class="service-desc">{{ $card->description }}</p> -->
                        </div>
                    </div>
                    @endforeach
                </div>
                <img src="{{ asset('images/corner-img.png') }}" class="philosophy-corner-img" alt="">
            </div>
        </div>
    </div>
</section>

<!-- Product Showcase (Editorial Style) -->
<section class="section bg-sand" id="products">
    <div class="container">
        <div class="section-header">
            <div>
                <h2 class="section-title">Editorial Collection</h2>
                <p class="card-text">Curated essentials for your daily ritual.</p>
            </div>
            <a class="view-all" href="#">
                View All Products <span class="material-symbols-outlined" style="font-size: 1.25rem;">arrow_forward</span>
            </a>
        </div>
        <div class="grid-3">
            @foreach($products as $product)
            <!-- Product -->
            <div class="product-card">
                <div class="product-image-wrapper">
                    <div class="product-image" style="background-image: url('{{ $product->image ? Storage::url($product->image) : asset('images/placeholder.png') }}');">
                    </div>
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
                            <span class="material-symbols-outlined">add_shopping_cart</span>
                        </button>
                    </div>
                </div>
            </div>
            @endforeach
</div>
        <!-- <div style="margin-top: 2rem; text-align: center;" class="md:hidden">
            <button class="btn" style="width: 100%; border: 1px solid #e5e7eb; color: var(--text-main);">
                View All Products
            </button>
            <style>@media(max-width:767px){ .md\:hidden { display: block; } @media(min-width:768px){ .md\:hidden { display: none; } } }</style>
        </div> -->
    </div>
</section>

<!-- Video Stories Section -->
<section class="section" id="about">
    <div class="container gap-24">
        @foreach($videoStories as $story)
        <!-- Video Block -->
        <div class="story-block {{ $story->is_reversed ? 'reverse' : '' }}">
            <div class="story-content">
                <div class="story-label">
                    <span class="story-line"></span> {{ $story->label }}
                </div>
                <h2 class="story-heading">
                    {!! $story->heading !!}
                </h2>
                <p class="story-text">
                    {{ $story->text }}
                </p>
                <a href="{{ $story->button_url ?? '#' }}" class="link-btn">
                    {{ $story->button_text ?? 'Learn More' }} <span class="material-symbols-outlined" style="font-size: 1rem;">arrow_outward</span>
                </a>
            </div>
            <div class="video-wrapper">
                <div class="video-thumb" style="background-image: url('{{ $story->thumbnail ? Storage::url($story->thumbnail) : '' }}');">
                </div>
                <div class="play-overlay">
                    <div class="play-btn">
                        <span class="material-symbols-outlined" style="font-size: 2.25rem; color: white;">play_arrow</span>
                    </div>
                </div>
                @if($story->video_url)
                <iframe class="video-iframe" src="{{ $story->video_url }}" title="Video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen style="display: none; position: absolute; top:0; left:0; width: 100%; height: 100%;"></iframe>
                @endif
            </div>
        </div>
        @endforeach
    </div>
</section>

<!-- Testimonials -->
<section class="section bg-sand">
    <div class="container">
        <h2 class="section-title" style="text-align: center;">
            Healing Stories
        </h2>
        <div class="testimonial-slider-container">
            <div class="testimonial-slider">
                <div class="testimonial-track">
                    @foreach($testimonials as $testimonial)
                    <!-- Testimonial Slide -->
                    <div class="testimonial-slide">
                        <div class="testimonial-card">
                            <div class="rating" style="margin-bottom: 1rem;">
                                @for($i = 0; $i < $testimonial->rating; $i++)
                                <span class="material-symbols-outlined" style="font-size: 1rem;">star</span>
                                @endfor
                            </div>
                            <p class="quote">
                                "{{ $testimonial->quote }}"
                            </p>
                            <div class="user-profile">
                                @if($testimonial->avatar)
                                <div class="avatar" style="background-image: url('{{ Storage::url($testimonial->avatar) }}');"></div>
                                @else
                                <div class="avatar bg-green-100 flex items-center justify-center font-bold text-green-700">
                                    {{ substr($testimonial->name, 0, 1) }}
                                </div>
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
            
            <!-- Navigation Buttons -->
            <button class="slider-btn prev-btn" aria-label="Previous slide">
                <span class="material-symbols-outlined">chevron_left</span>
            </button>
            <button class="slider-btn next-btn" aria-label="Next slide">
                <span class="material-symbols-outlined">chevron_right</span>
            </button>
            
            <!-- Pagination Dots -->
            <div class="slider-dots"></div>
        </div>
    </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const track = document.querySelector('.testimonial-track');
        const slides = document.querySelectorAll('.testimonial-slide');
        const nextBtn = document.querySelector('.next-btn');
        const prevBtn = document.querySelector('.prev-btn');
        const dotsContainer = document.querySelector('.slider-dots');
        
        if (!track || slides.length === 0) return;

        let currentIndex = 0;
        let slidesPerView = 3;
        let autoPlayInterval;

        // Determine slides per view based on window width
        function updateSlidesPerView() {
            if (window.innerWidth < 768) {
                slidesPerView = 1;
            } else if (window.innerWidth < 1024) {
                slidesPerView = 2;
            } else {
                slidesPerView = 3;
            }
            updateSliderPosition();
            createDots();
        }

        // Create pagination dots
        function createDots() {
            dotsContainer.innerHTML = '';
            const totalDots = Math.ceil(slides.length / slidesPerView); // Logic depends on scroll behavior, simplifying to 1 dot per group or 1 per slide?
            // Common carousel UI: 1 dot per slide or 1 dot per "page". 
            // Let's go with 1 dot per slide for smoother tracking, or limit it if too many.
            // For simplicity and standard UX with "3 visible", let's make dots correspond to the starting index of the view.
            
            const maxIndex = slides.length - slidesPerView;
            // Only need dots if we have more slides than view
             if (slides.length <= slidesPerView) return;

            // Simplify: Just dots for every possible start position? Or pages?
            // Let's do pages for dots to reduce clutter, or just simple index tracking.
            // Let's do one dot per slide for infinite feel logic, but here let's stick to valid indices.
            
            const numberOfDots = slides.length - slidesPerView + 1; // Number of valid starting positions

            for (let i = 0; i < numberOfDots; i++) {
                const dot = document.createElement('div');
                dot.classList.add('slider-dot');
                if (i === currentIndex) dot.classList.add('active');
                dot.addEventListener('click', () => {
                    currentIndex = i;
                    updateSliderPosition();
                    resetAutoPlay();
                });
                dotsContainer.appendChild(dot);
            }
        }

        function updateDots() {
            const dots = document.querySelectorAll('.slider-dot');
            dots.forEach((dot, index) => {
                if (index === currentIndex) {
                    dot.classList.add('active');
                } else {
                    dot.classList.remove('active');
                }
            });
        }

        function updateSliderPosition() {
            const slideWidth = 100 / slidesPerView;
            const translateX = -(currentIndex * slideWidth);
            // track.style.transform = `translateX(${translateX}%)`; // Move by percentage of track width? No.
            // Percentage of slide width logic:
            // If track is flex, and inputs are % width.
            // Move track by - (100 / slidesPerView * currentIndex)%
            track.style.transform = `translateX(-${currentIndex * (100 / slidesPerView)}%)`;
            updateDots();
        }

        function nextSlide() {
            if (currentIndex < slides.length - slidesPerView) {
                currentIndex++;
            } else {
                currentIndex = 0; // Loop back
            }
            updateSliderPosition();
        }

        function prevSlide() {
            if (currentIndex > 0) {
                currentIndex--;
            } else {
                currentIndex = slides.length - slidesPerView; // Loop to end
            }
            updateSliderPosition();
        }

        nextBtn.addEventListener('click', () => {
            nextSlide();
            resetAutoPlay();
        });

        prevBtn.addEventListener('click', () => {
            prevSlide();
            resetAutoPlay();
        });

        function startAutoPlay() {
            autoPlayInterval = setInterval(nextSlide,3000);
        }

        function resetAutoPlay() {
            clearInterval(autoPlayInterval);
            startAutoPlay();
        }

        window.addEventListener('resize', updateSlidesPerView);
        
        // Initial setup
        updateSlidesPerView();
        startAutoPlay();
    });
</script>
    </div>
</section>

<!-- Consultation Section -->
<section class="section bg-primary-light-alpha" id="consult">
    <div class="container">
        <div class="consult-container">
            <div style="flex: 1;">
                <span class="hero-badge" style="background-color: var(--white); color: var(--primary); border: 1px solid rgba(20, 184, 20, 0.2); margin-bottom: 1rem; display: inline-block;">Holistic Care</span>
                <h2 class="section-title">
                    Book Your Doctor's <br/>Visit Now
                </h2>
                <p class="card-text" style="font-size: 1.125rem; margin-bottom: 2rem;">
                    Unsure about your Dosha? Book a 1-on-1 virtual consultation with our certified Vaidyas (Ayurvedic Doctors) to get a personalized wellness plan including diet, lifestyle, and herbal recommendations.
                </p>
                <ul class="check-list">
                    <li>
                        <span class="material-symbols-outlined text-primary">check_circle</span> 45-minute in-depth analysis
                    </li>
                    <li>
                        <span class="material-symbols-outlined text-primary">check_circle</span> Personalized diet chart
                    </li>
                    <li>
                        <span class="material-symbols-outlined text-primary">check_circle</span> Follow-up support
                    </li>
                </ul>
            </div>
            <div class="consult-form-card">
                @if(session('success'))
                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        alert("{{ session('success') }}");
                    });
                </script>
                @endif
                
                @if($errors->any())
                <script>
                     document.addEventListener('DOMContentLoaded', function() {
                        let errorMsg = "Booking Failed:\n";
                        @foreach ($errors->all() as $error)
                            errorMsg += "- {{ $error }}\n";
                        @endforeach
                        alert(errorMsg);
                    });
                </script>
                @endif

                <form action="{{ route('book.appointment') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label class="form-label" for="name">Full Name</label>
                        <input class="form-input" id="name" name="name" value="{{ old('name') }}" placeholder="Enter your name" type="text" required/>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="phone">Phone Number</label>
                        <input class="form-input" id="phone" name="phone" value="{{ old('phone') }}" placeholder="Enter your phone number" type="tel" pattern="[0-9]{10}" maxlength="10" title="Please enter exactly 10 digits" oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 10)" required/>
                        <span style="font-size: 0.75rem; color: #6b7280;">Max 10 digits</span>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="concern">State</label>
                        <select class="form-input" id="concern" name="state" required>
                            <option value="">Select State</option>
                            <option value="Andhra Pradesh">Andhra Pradesh</option>
                            <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                            <option value="Assam">Assam</option>
                            <option value="Bihar">Bihar</option>
                            <option value="Chhattisgarh">Chhattisgarh</option>
                            <option value="Goa">Goa</option>
                            <option value="Gujarat">Gujarat</option>
                            <option value="Haryana">Haryana</option>
                            <option value="Himachal Pradesh">Himachal Pradesh</option>
                            <option value="Jammu and Kashmir">Jammu and Kashmir</option>
                            <option value="Jharkhand">Jharkhand</option>
                            <option value="Karnataka">Karnataka</option>
                            <option value="Kerala">Kerala</option>
                            <option value="Madhya Pradesh">Madhya Pradesh</option>
                            <option value="Maharashtra">Maharashtra</option>
                            <option value="Manipur">Manipur</option>
                            <option value="Meghalaya">Meghalaya</option>
                            <option value="Mizoram">Mizoram</option>
                            <option value="Nagaland">Nagaland</option>
                            <option value="Odisha">Odisha</option>
                            <option value="Punjab">Punjab</option>
                            <option value="Rajasthan">Rajasthan</option>
                            <option value="Sikkim">Sikkim</option>
                            <option value="Tamil Nadu">Tamil Nadu</option>
                            <option value="Telangana">Telangana</option>
                            <option value="Tripura">Tripura</option>
                            <option value="Uttar Pradesh">Uttar Pradesh</option>
                            <option value="Uttarakhand">Uttarakhand</option>
                            <option value="West Bengal">West Bengal</option>
                        </select>
                    </div>
                    <!-- district and city -->
                    <div class="form-group" style="display: flex; gap: 1rem;">
                        <div style="flex: 1;">
                            <label class="form-label" for="district">District</label>
                            <input class="form-input" id="district" name="district" value="{{ old('district') }}" placeholder="Enter your district" type="text" required>
                        </div>

                        <div style="flex: 1;">
                            <label class="form-label" for="city">City</label>
                            <input class="form-input" id="city" name="city" value="{{ old('city') }}" placeholder="Enter your city" type="text" required>
                        </div>
                    </div>



                    <button class="btn btn-primary" type="submit" style="width: 100%;">
                        Request Appointment
                    </button>
                    <p style="font-size: 0.75rem; text-align: center; color: #6b7280; margin-top: 1rem;">We respect your privacy. Your information is safe with us.</p>
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
        <span class="material-symbols-outlined text-primary">{{ $service->icon }}</span>
        <span>{{ $service->text }}</span>
      </div>
      @endforeach
    </div>
  </div>
</section>


<!-- Map Section -->
<section class="section" id="location">
    <div class="container">
        <div class="section-header" style="text-align: center; justify-content: center; margin-bottom: 2rem;">
            <div>
                <h2 class="section-title">Visit Our Clinic</h2>
                <p class="card-text">Experience authentic ayurveda at our center.</p>
            </div>
        </div>
        @if(isset($settings['map_embed_url']) && $settings['map_embed_url'])
        <div class="map-container" style="border-radius: 1rem; overflow: hidden; box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1); height: 400px; width: 100%;">
            <iframe 
                src="{{ $settings['map_embed_url'] }}" 
                width="100%" 
                height="100%" 
                style="border:0;" 
                allowfullscreen="" 
                loading="lazy" 
                referrerpolicy="no-referrer-when-downgrade">
            </iframe>
        </div>
        @endif
        <div style="text-align: center; margin-top: 2rem;">
            <h4 style="font-size: 1.25rem; font-weight: 600; color: var(--text-heading);">{{ $settings['clinic_name'] ?? 'Mahant Ayurveda Clinic' }}</h4>
            <p style="color: var(--text-body); margin-top: 0.5rem;">{{ $settings['address'] ?? '123 Wellness Street, Rajkot, Gujarat' }}</p>
            <p style="color: var(--text-body); margin-top: 0.5rem;">{{ $settings['clinic_hours'] ?? 'Daily: 9:00 AM - 8:00 PM' }}</p>
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
                    <li><a href="#about">Our Story</a></li>
                    <li><a href="#products">All Products</a></li>
                    <li><a href="#philosophy">The Philosophy</a></li>
                    <li><a href="#consult">Consult a Doctor</a></li>
                    <li><a href="#consult">Contact Us</a></li>
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
        const navbar = document.querySelector('.navbar');
        if (navbar) {
            window.addEventListener('scroll', () => {
                if (window.scrollY > 20) {
                    navbar.classList.add('scrolled');
                } else {
                    navbar.classList.remove('scrolled');
                }
            });
            // Initial check
            if (window.scrollY > 20) {
                navbar.classList.add('scrolled');
            }
        }

        // Scroll Reveal
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('reveal-visible');
                    observer.unobserve(entry.target); // Only animate once
                }
            });
        }, { threshold: 0.1 });

        const revealElements = document.querySelectorAll('.hero-content, .section-title, .card, .product-card, .story-block, .testimonial-card, .consult-container');
        revealElements.forEach((el) => {
            el.classList.add('reveal-up');
            observer.observe(el);
        });
    });
</script>
</body>
</html>