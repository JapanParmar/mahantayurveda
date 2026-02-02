<?php

namespace App\Http\Controllers;

use App\Mail\NewBookingAlert;
use App\Models\Booking;
use App\Models\SiteSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class BookingController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|numeric|digits_between:1,10',
            'state' => 'required|string',
            'district' => 'required|string',
            'city' => 'required|string',
        ]);

        $booking = Booking::create($validated);

        // Get admin email from settings or default
        $adminEmail = SiteSetting::where('key', 'email')->value('value') ?? 'admin@mahantayurveda.com';

        try {
            Mail::to($adminEmail)->send(new NewBookingAlert($booking));
        } catch (\Exception $e) {
            // Log error but don't fail the request if email fails
            \Log::error('Failed to send booking email: ' . $e->getMessage());
        }

        return back()->with('success', 'Your appointment request has been sent successfully! We will contact you soon.');
    }
}
