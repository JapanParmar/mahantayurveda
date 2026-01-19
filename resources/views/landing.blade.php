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
                <img src="{{ asset('images/logo.png') }}" alt="Logo">
                <span class="logo-text">Mahant Ayurveda</span>
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
                <button class="btn btn-primary" style="display: none;">
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

<!-- Hero Section -->
<section class="hero">
    <!-- Background Image with Overlay -->
    <div class="hero-bg">
        <div class="hero-overlay"></div>
        <div class="hero-image" style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuBnTIEo-Nmb2cNaKGS9QZq8AQk7SB33ruKxoMq77exszJRSrfBZWnr1oN1dAuelZ0NdFnS0zeK0CktKaJtciYvn86CAO5bYmHSBZ8g116QcsqiaisebP7oJOSaHi64pzQhIB57YwQUomrk-npA7UjtxRuRg71f6vGUeyD0vW86kSQq3tr1vl5rQuvrYos8CdCBL-OOo6cx36YJeYX5rU6K4hf7IKQruxddgyz4IOSwTCp9xLxJHz1ppXdrCFw9d2n_Z_QC7_zNOZniP');">
        </div>
    </div>
    <div class="container">
        <div class="hero-content">
            <span class="hero-badge">Est. 1985</span>
            <h1 class="hero-title">
                Heal From Root<br/>No Side Effects
            </h1>
            <p class="hero-subtitle">
                Our mission is to bring pure, natural Ayurveda into everyday life.
                Every product is made by our Ayurvedic doctor with care, honesty, and 100% natural ingredients — so you get wellness the way nature meant it.
            </p>
            <div class="hero-actions">
                <button class="btn btn-primary">
                    Shop Wellness
                    <span class="material-symbols-outlined" style="font-size: 1.25rem;">shopping_bag</span>
                </button>
                <button class="btn btn-secondary">
                    Book Consultation
                    <span class="material-symbols-outlined" style="font-size: 1.25rem;">calendar_month</span>
                </button>
            </div>
        </div>
    </div>
</section>

<!-- Philosophy Section -->
<section class="section bg-off-white" id="philosophy">
    <div class="container">
        <div class="philosophy-header">
            <span class="subtitle">Our Philosophy</span>
            <h3 class="section-title">Our Mission - Your Impact</h3>
            <p class="card-text" style="font-size: 1.125rem;">
                Ayurveda is more than just herbs; it is a philosophy of balance, purity, and wisdom that guides us to better living.
            </p>
        </div>
        <div class="grid-3">
            <!-- Card 1 -->
            <div class="card group">
                <div class="icon-wrapper">
                    <span class="material-symbols-outlined" style="font-size: 1.875rem;">self_improvement</span>
                </div>
                <h4 class="card-title">Balance (Dosha)</h4>
                <p class="card-text">
                    Harmonizing the body's natural energies—Vata, Pitta, and Kapha—to create a state of equilibrium and lasting health.
                </p>
            </div>
            <!-- Card 2 -->
            <div class="card group">
                <div class="icon-wrapper">
                    <span class="material-symbols-outlined" style="font-size: 1.875rem;">water_drop</span>
                </div>
                <h4 class="card-title">Purity (Sattva)</h4>
                <p class="card-text">
                    We commit to using only the purest, non-toxic ingredients sourced directly from organic farms in Kerala.
                </p>
            </div>
            <!-- Card 3 -->
            <div class="card group">
                <div class="icon-wrapper">
                    <span class="material-symbols-outlined" style="font-size: 1.875rem;">menu_book</span>
                </div>
                <h4 class="card-title">Wisdom (Veda)</h4>
                <p class="card-text">
                    Rooted in 5,000 years of ancient knowledge, validated by modern science for holistic well-being.
                </p>
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
            <!-- Product 1 -->
            <div class="product-card">
                <div class="product-image-wrapper">
                    <div class="product-image" style="background-image: url('{{ asset('images/products/product1.png') }}');">
                    </div>
                    <div class="badge">Best Seller</div>
                </div>
                <div class="product-details">
                    <div class="product-header">
                        <h3 class="product-title">AYURVEDIC Chyawanprash 1 kg</h3>
                        <div class="rating">
                            <span class="material-symbols-outlined" style="font-size: 1rem;">star</span> 4.9
                        </div>
                    </div>
                    <p class="product-desc">Infused with Bhringraj, Amla, and Coconut milk for strength and shine.</p>
                    <div class="product-footer">
                        <div class="price-wrapper">
                            <span class="price-original">₹1,499.00</span>
                            <span class="price-sale">₹999.00</span>
                            <span class="price-discount">33% OFF</span>
                        </div>
                        <button class="btn-icon">
                            <span class="material-symbols-outlined">add_shopping_cart</span>
                        </button>
                    </div>
                </div>
            </div>
            <!-- Product 2 -->
            <div class="product-card">
                <div class="product-image-wrapper">
                    <div class="product-image" style="background-image: url('{{ asset('images/products/product2.png') }}');">
                    </div>
                </div>
                <div class="product-details">
                    <div class="product-header">
                        <h3 class="product-title">BHRINGRAJ AYURVEDIC HAIR OIL</h3>
                        <div class="rating">
                            <span class="material-symbols-outlined" style="font-size: 1rem;">star</span> 4.8
                        </div>
                    </div>
                    <p class="product-desc">Natural stress relief with Brahmi and Ashwagandha to center your thoughts.</p>
                    <div class="product-footer">
                        <div class="price-wrapper">
                            <span class="price-original">₹220.00</span>
                            <span class="price-sale">₹200.00</span>
                            <span class="price-discount">9% OFF</span>
                        </div>
                        <button class="btn-icon">
                            <span class="material-symbols-outlined">add_shopping_cart</span>
                        </button>
                    </div>
                </div>
            </div>
            <!-- Product 3 -->
            <div class="product-card">
                <div class="product-image-wrapper">
                    <div class="product-image" style="background-image: url('{{ asset('images/products/product3.png') }}');">
                    </div>
                    <div class="badge">New Arrival</div>
                </div>
                <div class="product-details">
                    <div class="product-header">
                        <h3 class="product-title">Mahant Ayurvedic Malam</h3>
                        <div class="rating">
                            <span class="material-symbols-outlined" style="font-size: 1rem;">star</span> 5.0
                        </div>
                    </div>
                    <p class="product-desc">Restore your inner fire with Ginger, Fennel, and Cumin blend.</p>
                    <div class="product-footer">
                        <div class="price-wrapper">
                            <span class="price-original">₹190.00</span>
                            <span class="price-sale">₹152.00</span>
                            <span class="price-discount">20% OFF</span>
                        </div>
                        <button class="btn-icon">
                            <span class="material-symbols-outlined">add_shopping_cart</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div style="margin-top: 2rem; text-align: center;" class="md:hidden">
            <button class="btn" style="width: 100%; border: 1px solid #e5e7eb; color: var(--text-main);">
                View All Products
            </button>
            <style>@media(max-width:767px){ .md\:hidden { display: block; } @media(min-width:768px){ .md\:hidden { display: none; } } }</style>
        </div>
    </div>
</section>

<!-- Video Stories Section -->
<section class="section" id="about">
    <div class="container gap-24">
        <!-- Video Block 1 -->
        <div class="story-block">
            <div class="story-content">
                <div class="story-label">
                    <span class="story-line"></span> Our Story
                </div>
                <h2 class="story-heading">
                    From Our Garden<br/>To Your Home
                </h2>
                <p class="story-text">
                    We believe that the most potent medicine comes directly from nature. Watch how we cultivate our herbs sustainably in the foothills of the Himalayas, ensuring that every drop of oil and every tablet is charged with nature's vitality.
                </p>
                <button class="link-btn">
                    Read Our Full Story <span class="material-symbols-outlined" style="font-size: 1rem;">arrow_outward</span>
                </button>
            </div>
            <div class="video-wrapper">
                <div class="video-thumb" style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuAvyzVgmUGqDMZ5pZMwlD0x1bs3-JV4xCVa9_g7e93PE9uiZchpnv2hNUTTSgk7oaahIF8wh0bY2Rr9VZ-Yn0SgNez7gmCWwGHXyrYD02vW5fDzrclCYgjgTCGN-k2VVY4KQv-k_NtCjn_IuCqZd7mdt6amY0y6gw_709M_4iCG-mMUvktP9Plw32PGQi94J23epWQvAYwsI2Q9L9l8YIDOBuYAQakfJ3xgwRBSuEnrN3K6XDmmKE8yqmWQjjwbD4Ox3A5qiFWv71cO');">
                </div>
                <div class="play-overlay">
                    <div class="play-btn">
                        <span class="material-symbols-outlined" style="font-size: 2.25rem; color: white;">play_arrow</span>
                    </div>
                </div>
            </div>
        </div>
        <!-- Video Block 2 -->
        <div class="story-block reverse">
            <div class="story-content">
                <div class="story-label">
                    <span class="story-line"></span> Rituals
                </div>
                <h2 class="story-heading">
                    The Art of Abhyanga<br/>(Self-Massage)
                </h2>
                <p class="story-text">
                    Daily self-massage is an act of self-love that calms the nervous system and improves circulation. Learn the proper technique from our Ayurvedic experts to get the most out of your Vitality Hair & Body oils.
                </p>
                <button class="link-btn">
                    View All Guides <span class="material-symbols-outlined" style="font-size: 1rem;">arrow_outward</span>
                </button>
            </div>
            <div class="video-wrapper">
                <div class="video-thumb" style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuCMhh-4fx9kQxA06rpHmB-u2gbd3JpA-yIPlLPB9W7ZPJM7BwjjribPeVkj7AtnkIyw8CZyLfzB7FWnooTiM8ZJP-JzII9zokAtKrhsCfLrg3Phrx391Czk04TFCf02IovjtWZXlHZSjtOvuViIO7RVMeZ92649rkM6z0TvqawpFbEA0F-l3MB21eB21UePxq5PEi1CzxldfC4uLT0IRqFOEbLnp_f_RV1edBt-R_PLMsjjfnDwyGMNf1WQGu13A9PHv1vOEKjgBH2J');">
                </div>
                <div class="play-overlay">
                    <div class="play-btn">
                        <span class="material-symbols-outlined" style="font-size: 2.25rem; color: white;">play_arrow</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Testimonials -->
<section class="section bg-sand">
    <div class="container">
        <h2 class="section-title" style="text-align: center;">
            Healing Stories
        </h2>
        <div class="grid-3">
            <!-- Testimonial 1 -->
            <div class="testimonial-card">
                <div class="rating" style="margin-bottom: 1rem;">
                    <span class="material-symbols-outlined" style="font-size: 1rem;">star</span>
                    <span class="material-symbols-outlined" style="font-size: 1rem;">star</span>
                    <span class="material-symbols-outlined" style="font-size: 1rem;">star</span>
                    <span class="material-symbols-outlined" style="font-size: 1rem;">star</span>
                    <span class="material-symbols-outlined" style="font-size: 1rem;">star</span>
                </div>
                <p class="quote">
                    "I had severe back pain and digestion issues. After taking Basti therapy, I feel so light and relaxed. It really works from inside. Thank you for such genuine care!"
                </p>
                <div class="user-profile">
                    <div class="avatar" style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuCE-zZJRMBYAEGwe_llCFOCt-D6U39aKhUyu226pghtcCvkBhpLGsbjULq6k1BRjPlte7E_8rXLxmwnbJlE6apg651Hc-3yWZ7UxHJZgKKHEviwIqE7ixPewSsMzKm061MdP2VSCFi94zcaHjFd2QwFW3ReLChsF1BiVMqfSow_IulDbsmu4oLLM_ab9KwvM3cXw-k5LbjWjw15pNGI7Y1l7hSj19sn-mkZ1khkUIw-gzraJEJyG3oKHVVFfXIU6CIiXlzOxDAc1Tac');"></div>
                    <div class="user-info">
                        <p>Harsh Patel, Rajkot</p>
                        <p>Basti Therapy</p>
                    </div>
                </div>
            </div>
            <!-- Testimonial 2 -->
            <div class="testimonial-card">
                <div class="rating" style="margin-bottom: 1rem;">
                    <span class="material-symbols-outlined" style="font-size: 1rem;">star</span>
                    <span class="material-symbols-outlined" style="font-size: 1rem;">star</span>
                    <span class="material-symbols-outlined" style="font-size: 1rem;">star</span>
                    <span class="material-symbols-outlined" style="font-size: 1rem;">star</span>
                    <span class="material-symbols-outlined" style="font-size: 1rem;">star</span>
                </div>
                <p class="quote">
                    "મને કિડનીના પથરીને કારણે દુખાવો થતો હતો. આયુર્વેદિક સારવારથી મને કોઈપણ ઓપરેશન વિના કુદરતી રીતે પથરીને દૂર કરવામાં મદદ મળી. ડૉક્ટર અને આયુર્વેદનો ખૂબ ખૂબ આભાર."
                </p>
                <div class="user-profile">
                    <div class="avatar" style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuAC6Qrg93rkp2K48aWpcv4An7fv-RLZz4ZXPL38ZGYnB0DclmrAZ8dlWz9sUD0ntx3Zlszam1EI12_3DVdYvp-4zWmh2c8Xt4NxrVfHMlTeue85VKaEMsazl58CPY0ykUMcrPY3hAzkJZPeRFXgIozUFHb6rajcZCLZqqO0Y-S_Io_SrfkygzVfa1wQWRstReeLkOP-nQXObH6LsBDGYwg7J9Xl7HxCnA7KfnHzO4M7bEkL4TLRle4YpxDEUQrYYLF1Otr8S694liTm');"></div>
                    <div class="user-info">
                        <p>Jaydeep Parmar, Vadodara</p>
                        <p>Kidney Stone Treatment</p>
                    </div>
                </div>
            </div>
            <!-- Testimonial 3 -->
            <div class="testimonial-card" style="display: none;">
                <div class="rating" style="margin-bottom: 1rem;">
                    <span class="material-symbols-outlined" style="font-size: 1rem;">star</span>
                    <span class="material-symbols-outlined" style="font-size: 1rem;">star</span>
                    <span class="material-symbols-outlined" style="font-size: 1rem;">star</span>
                    <span class="material-symbols-outlined" style="font-size: 1rem;">star</span>
                    <span class="material-symbols-outlined" style="font-size: 1rem;">star_half</span>
                </div>
                <p class="quote">
                    "My knee pain made it hard to walk. After regular oil massage and therapy, the pain is almost gone. I can move freely again. Truly natural healing!"
                </p>
                <div class="user-profile">
                    <div class="avatar" style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuDVa3gDcrthfd7gZuJ57Nzvd6FMTp-Sibh4EFwyCRHm_NBMXBrEcfBlHrr8YyIKiB7y9EPLx_FoGGglkUOVwRPRRkPsApwjLo0lHc7qBzD7SASSPSsmJv3OWBFCqObvYIIykBGNVSs1UoGNt50zme0dtlh0ESUMXMvHI1KAMRe4MMP9E4V5tryhFf2bB-kyY2O8wNIvgiz9wtvJKHzF1BYGiJam2Y815IcSx6b6PMLYEEsPXX7RQSvS5N7mn-4VQ-q39G1xpoUz6nqK');"></div>
                    <div class="user-info">
                        <p>Mehul Chauhan, Surat</p>
                        <p>Knee Pain Treatment</p>
                    </div>
                </div>
            </div>
            <style>@media(min-width:1024px){ .testimonial-card[style*="display: none"] { display: block !important; } }</style>
        </div>
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
                <form>
                    <div class="form-group">
                        <label class="form-label" for="name">Full Name</label>
                        <input class="form-input" id="name" placeholder="Enter your name" type="text"/>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="phone">Phone Number</label>
                        <input class="form-input" id="phone" placeholder="Enter your phone number" type="number"/>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="concern">State</label>
                        <select class="form-input" id="concern">
                            <option>Select State</option>
                            <option>Andhra Pradesh</option>
                            <option>Arunachal Pradesh</option>
                            <option>Assam</option>
                            <option>Bihar</option>
                            <option>Chhattisgarh</option>
                            <option>Goa</option>
                            <option>Gujarat</option>
                            <option>Haryana</option>
                            <option>Himachal Pradesh</option>
                            <option>Jammu and Kashmir</option>
                            <option>Jharkhand</option>
                            <option>Karnataka</option>
                            <option>Kerala</option>
                            <option>Madhya Pradesh</option>
                            <option>Maharashtra</option>
                            <option>Manipur</option>
                            <option>Meghalaya</option>
                            <option>Mizoram</option>
                            <option>Nagaland</option>
                            <option>Odisha</option>
                            <option>Punjab</option>
                            <option>Rajasthan</option>
                            <option>Sikkim</option>
                            <option>Tamil Nadu</option>
                            <option>Telangana</option>
                            <option>Tripura</option>
                            <option>Uttar Pradesh</option>
                            <option>Uttarakhand</option>
                            <option>West Bengal</option>
                        </select>
                    </div>
                    <!-- district and city -->
                    <div class="form-group">
                        <label class="form-label" for="district">District</label>
                        <input class="form-input" id="district" placeholder="Enter your district" type="text"/>
                        <label class="form-label" for="city">City</label>
                        <input class="form-input" id="city" placeholder="Enter your city" type="text"/>
                    </div>


                    <button class="btn btn-primary" type="button" style="width: 100%;">
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
      <div class="feature">
        <span class="material-symbols-outlined text-primary">verified_user</span>
        <span>GMP Certified</span>
      </div>
      <div class="feature">
        <span class="material-symbols-outlined text-primary">cruelty_free</span>
        <span>Cruelty Free</span>
      </div>
      <div class="feature">
        <span class="material-symbols-outlined text-primary">eco</span>
        <span>100% Natural</span>
      </div>
      <div class="feature">
        <span class="material-symbols-outlined text-primary">recycling</span>
        <span>Eco Packaging</span>
      </div>
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
        <div class="map-container" style="border-radius: 1rem; overflow: hidden; box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1); height: 400px; width: 100%;">
            <iframe 
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d118147.68202062486!2d70.73889449339906!3d22.27363076864619!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3959c98ac71cdf0f%3A0x76dd15cfbe93ad3b!2sRajkot%2C%20Gujarat!5e0!3m2!1sen!2sin!4v1705680000000!5m2!1sen!2sin" 
                width="100%" 
                height="100%" 
                style="border:0;" 
                allowfullscreen="" 
                loading="lazy" 
                referrerpolicy="no-referrer-when-downgrade">
            </iframe>
        </div>
        <div style="text-align: center; margin-top: 2rem;">
            <h4 style="font-size: 1.25rem; font-weight: 600; color: var(--text-heading);">Mahant Ayurveda Clinic</h4>
            <p style="color: var(--text-body); margin-top: 0.5rem;">123 Wellness Street, Near Royal Park, Rajkot, Gujarat - 360001</p>
            <p style="color: var(--text-body); margin-top: 0.5rem;">Daily: 9:00 AM - 8:00 PM</p>
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
                    Bridging the gap between ancient wisdom and modern living. Bringing balance to your life through the power of Ayurveda.
                </p>
                <div class="social-links">
                    <a class="social-icon" href="#"><span style="font-size: 0.75rem; font-weight: 700;">IG</span></a>
                    <a class="social-icon" href="#"><span style="font-size: 0.75rem; font-weight: 700;">FB</span></a>
                    <a class="social-icon" href="#"><span style="font-size: 0.75rem; font-weight: 700;">YT</span></a>
                </div>
            </div>
            <div class="footer-section">
                



                <h4>Contact Us</h4>
                <ul class="footer-links">
                    <li>9265341378</li>
                    <li>mahantayurveda@gmail.com</li>
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