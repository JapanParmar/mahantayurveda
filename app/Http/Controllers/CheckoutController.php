<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Razorpay\Api\Api;
use Illuminate\Support\Str;

class CheckoutController extends Controller
{
    public function index()
    {
        $sessionId = Session::getId();
        $user = auth()->user();

        if ($user) {
            $cart = Cart::where('user_id', $user->id)->first();
        } else {
            $cart = Cart::where('session_id', $sessionId)->first();
        }

        if (!$cart || $cart->items->count() == 0) {
            return redirect()->route('cart.index')->with('error', 'Cart is empty');
        }

        return view('checkout.index', compact('cart'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'phone' => 'required',
            'name' => 'required',
            'address' => 'required',
            'city' => 'required',
            'state' => 'required',
            'zip' => 'required'
        ]);

        $sessionId = Session::getId();
        $user = auth()->user();

        if ($user) {
            $cart = Cart::where('user_id', $user->id)->first();
        } else {
            $cart = Cart::where('session_id', $sessionId)->first();
        }

        if (!$cart) return redirect()->route('cart.index');

        $items = $cart->items;
        $subtotal = $items->sum(function($item) {
             return $item->price * $item->quantity;
        });
        
        $shipping = $subtotal > 999 ? 0 : 90; // Simple shipping logic
        $total = $subtotal + $shipping;

        // Create Order
        $order = Order::create([
            'user_id' => $user ? $user->id : null,
            'guest_email' => $request->email,
            'guest_phone' => $request->phone,
            'guest_name' => $request->name,
            'order_number' => 'MA-' . strtoupper(Str::random(8)),
            'status' => 'pending',
            'payment_status' => 'pending',
            'subtotal' => $subtotal,
            'shipping_cost' => $shipping,
            'total' => $total,
            'shipping_address' => json_encode([
                'address' => $request->address,
                'city' => $request->city,
                'state' => $request->state,
                'zip' => $request->zip
            ])
        ]);

        // Create Order Items
        foreach ($items as $item) {
            $order->items()->create([
                'product_id' => $item->product_id,
                'product_name' => $item->product->name,
                'quantity' => $item->quantity,
                'price' => $item->price,
                'total' => $item->price * $item->quantity
            ]);
        }
        
        // Initiate Razorpay Order
        $api = new Api(env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));
        
        $razorpayOrder = $api->order->create([
            'receipt'         => $order->order_number,
            'amount'          => $total * 100, // Amount in paise
            'currency'        => 'INR'
        ]);

        return response()->json([
            'success' => true,
            'order_id' => $razorpayOrder['id'],
            'amount' => $razorpayOrder['amount'],
            'currency' => $razorpayOrder['currency'],
            'name' => 'Mahant Ayurveda',
            'description' => 'Payment for Order ' . $order->order_number,
            'prefill' => [
                'name' => $request->name,
                'email' => $request->email,
                'contact' => $request->phone
            ],
            'internal_order_id' => $order->id,
            'key' => env('RAZORPAY_KEY')
        ]);
    }

    public function verifyPayment(Request $request)
    {
        $signatureStatus = false;
        
        try {
            $api = new Api(env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));
            
            $attributes = [
                'razorpay_order_id' => $request->razorpay_order_id,
                'razorpay_payment_id' => $request->razorpay_payment_id,
                'razorpay_signature' => $request->razorpay_signature
            ];

            $api->utility->verifyPaymentSignature($attributes);
            $signatureStatus = true;

        } catch (\Exception $e) {
            $signatureStatus = false;
        }

        if ($signatureStatus) {
            $order = Order::find($request->internal_order_id);
            if($order) {
                $order->payment_status = 'paid';
                $order->status = 'processing';
                $order->save();
                
                Payment::create([
                    'order_id' => $order->id,
                    'razorpay_payment_id' => $request->razorpay_payment_id,
                    'razorpay_order_id' => $request->razorpay_order_id,
                    'razorpay_signature' => $request->razorpay_signature,
                    'amount' => $order->total,
                    'status' => 'captured'
                ]);

                // Clear Cart
                $sessionId = Session::getId();
                $user = auth()->user();
                if ($user) {
                    Cart::where('user_id', $user->id)->delete();
                } else {
                     Cart::where('session_id', $sessionId)->delete();
                }

                return response()->json(['success' => true]);
            }
        }
        
        return response()->json(['success' => false, 'message' => 'Payment verification failed']);
    }
}
