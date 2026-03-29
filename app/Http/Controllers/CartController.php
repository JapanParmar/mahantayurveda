<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    private function getCart()
    {
        $sessionId = Session::getId();
        $user = auth()->user();

        if ($user) {
            $cart = Cart::firstOrCreate(['user_id' => $user->id]);
        } else {
            $cart = Cart::firstOrCreate(['session_id' => $sessionId]);
        }
        return $cart;
    }

    public function index()
    {
        $cart = $this->getCart();
        $items = $cart->items()->with('product')->get();
        $subtotal = $items->sum(function($item) {
            return $item->price * $item->quantity;
        });

        return view('cart.index', compact('items', 'subtotal'));
    }

    public function add(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1'
        ]);

        $product = Product::findOrFail($request->product_id);
        $cart = $this->getCart();

        $price = $product->is_on_sale ? $product->sale_price : $product->price;

        $cartItem = $cart->items()->where('product_id', $product->id)->first();

        if ($cartItem) {
            $cartItem->quantity += $request->quantity;
            $cartItem->save();
        } else {
            $cart->items()->create([
                'product_id' => $product->id,
                'quantity' => $request->quantity,
                'price' => $price
            ]);
        }

        return response()->json(['success' => true, 'message' => 'Product added to cart', 'cart_count' => $cart->items()->count()]);
    }

    public function update(Request $request)
    {
         $request->validate([
            'item_id' => 'required|exists:cart_items,id',
            'quantity' => 'required|integer|min:1'
        ]);

        $cartItem = CartItem::findOrFail($request->item_id);
        $cartItem->quantity = $request->quantity;
        $cartItem->save();
        
        // Recalculate totals
        $cart = $cartItem->cart;
        $items = $cart->items;
        $subtotal = $items->sum(function($item) {
             return $item->price * $item->quantity;
        });

        $shipping = $subtotal > env('FREE_SHIPPING_THRESHOLD') ? 0 : env('SHIPPING_CHARGE'); // Simple shipping logic
        $total = $subtotal + $shipping;
        return response()->json([
            'success' => true, 
            'subtotal' => $subtotal,
            'item_total' => $cartItem->price * $cartItem->quantity,
            'shipping' => $shipping,
            'total' => $total
        ]);
    }

    public function remove($id)
    {
        CartItem::destroy($id);
        return back()->with('success', 'Item removed from cart');
    }
}
