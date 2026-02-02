<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Testimonial;
use App\Models\VideoStory;
use App\Models\PhilosophyCard;
use App\Models\HeroSection;
use App\Models\TrustIndicator;
use App\Models\Booking;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'products' => Product::count(),
            'testimonials' => Testimonial::count(),
            'video_stories' => VideoStory::count(),
            'philosophy_cards' => PhilosophyCard::count(),
            'trust_indicators' => TrustIndicator::count(),
            'bookings' => Booking::count(),
        ];

        return view('admin.dashboard', compact('stats'));
    }
}
