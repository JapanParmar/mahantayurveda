<?php

namespace App\Http\Controllers;

use App\Models\HeroSection;
use App\Models\PhilosophyCard;
use App\Models\Product;
use App\Models\SiteSetting;
use App\Models\Testimonial;
use App\Models\TrustIndicator;
use App\Models\VideoStory;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index()
    {
        $data = [
            'hero' => HeroSection::first(),
            'philosophyCards' => PhilosophyCard::active()->get(),
            'products' => Product::active()->get(),
            'videoStories' => VideoStory::active()->get(),
            'testimonials' => Testimonial::active()->get(),
            'services' => TrustIndicator::active()->get(),
            'settings' => SiteSetting::all()->pluck('value', 'key'),
        ];

        return view('landing', $data);
    }
}
