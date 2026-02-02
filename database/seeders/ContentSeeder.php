<?php

namespace Database\Seeders;

use App\Models\HeroSection;
use App\Models\PhilosophyCard;
use App\Models\Product;
use App\Models\SiteSetting;
use App\Models\Testimonial;
use App\Models\TrustIndicator;
use App\Models\VideoStory;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class ContentSeeder extends Seeder
{
    public function run(): void
    {
        // Admin User
        User::updateOrCreate(
            ['email' => 'admin@mahantayurveda.com'],
            [
                'name' => 'Admin',
                'password' => Hash::make('password'),
            ]
        );

        // Site Settings
        SiteSetting::set('site_name', 'Mahant Ayurveda');
        SiteSetting::set('phone', '+91 9265341378');
        SiteSetting::set('email', 'mahantayurveda@gmail.com');
        SiteSetting::set('address', '123 Wellness Street, Near Royal Park, Rajkot, Gujarat - 360001');
        SiteSetting::set('clinic_name', 'Mahant Ayurveda Clinic');
        SiteSetting::set('clinic_hours', 'Daily: 9:00 AM - 8:00 PM');
        SiteSetting::set('footer_text', 'Bridging the gap between ancient wisdom and modern living. Bringing balance to your life through the power of Ayurveda.');

        // Hero Section
        HeroSection::create([
            'badge_text' => 'Est. 1985',
            'title' => 'Heal From Root<br/>No Side Effects',
            'subtitle' => 'Our mission is to bring pure, natural Ayurveda into everyday life. Every product is made by our Ayurvedic doctor with care, honesty, and 100% natural ingredients.',
            'button1_text' => 'Shop Wellness',
            'button1_url' => '#products',
            'button2_text' => 'Book Consultation',
            'button2_url' => '#contact',
            'is_active' => true,
        ]);

        // Philosophy Cards
        PhilosophyCard::create([
            'icon' => 'self_improvement',
            'title' => 'Balance (Dosha)',
            'description' => 'Harmonizing the body\'s natural energies—Vata, Pitta, and Kapha—to create a state of equilibrium and lasting health.',
            'order' => 1,
        ]);
        PhilosophyCard::create([
            'icon' => 'water_drop',
            'title' => 'Purity (Sattva)',
            'description' => 'We commit to using only the purest, non-toxic ingredients sourced directly from organic farms in Kerala.',
            'order' => 2,
        ]);
        PhilosophyCard::create([
            'icon' => 'menu_book',
            'title' => 'Wisdom (Veda)',
            'description' => 'Rooted in 5,000 years of ancient knowledge, validated by modern science for holistic well-being.',
            'order' => 3,
        ]);

        // Products
        Product::create([
            'name' => 'AYURVEDIC Chyawanprash 1 kg',
            'description' => 'Infused with Bhringraj, Amla, and Coconut milk for strength and shine.',
            'price' => 1499.00,
            'sale_price' => 999.00,
            'badge' => 'Best Seller',
            'rating' => 4.9,
            'is_active' => true,
        ]);
        Product::create([
            'name' => 'BHRINGRAJ AYURVEDIC HAIR OIL',
            'description' => 'Natural stress relief with Brahmi and Ashwagandha to center your thoughts.',
            'price' => 220.00,
            'sale_price' => 200.00,
            'rating' => 4.8,
            'is_active' => true,
        ]);
        Product::create([
            'name' => 'Mahant Ayurvedic Malam',
            'description' => 'Restore your inner fire with Ginger, Fennel, and Cumin blend.',
            'price' => 190.00,
            'sale_price' => 152.00,
            'badge' => 'New Arrival',
            'rating' => 5.0,
            'is_active' => true,
        ]);

        // Video Stories
        VideoStory::create([
            'label' => 'Our Story',
            'heading' => 'From Our Garden<br/>To Your Home',
            'text' => 'We believe that the most potent medicine comes directly from nature. Watch how we cultivate our herbs sustainably in the foothills of the Himalayas.',
            'button_text' => 'Read Our Full Story',
            'is_reversed' => false,
            'is_active' => true,
        ]);

        // Testimonials
        Testimonial::create([
            'name' => 'Harsh Patel',
            'location' => 'Rajkot',
            'treatment' => 'Basti Therapy',
            'quote' => 'I had severe back pain and digestion issues. After taking Basti therapy, I feel so light and relaxed.',
            'rating' => 5,
            'is_active' => true,
        ]);
        Testimonial::create([
            'name' => 'Jaydeep Parmar',
            'location' => 'Vadodara',
            'treatment' => 'Kidney Stone',
            'quote' => 'મને કિડનીના પથરીને કારણે દુખાવો થતો હતો. આયુર્વેદિક સારવારથી મને કોઈપણ ઓપરેશન વિના કુદરતી રીતે પથરીને દૂર કરવામાં મદદ મળી.',
            'rating' => 5,
            'is_active' => true,
        ]);

        // Trust Indicators
        TrustIndicator::create(['icon' => 'verified_user', 'text' => 'GMP Certified', 'order' => 1]);
        TrustIndicator::create(['icon' => 'cruelty_free', 'text' => 'Cruelty Free', 'order' => 2]);
        TrustIndicator::create(['icon' => 'eco', 'text' => '100% Natural', 'order' => 3]);
        TrustIndicator::create(['icon' => 'recycling', 'text' => 'Eco Packaging', 'order' => 4]);
    }
}
