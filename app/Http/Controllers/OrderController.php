<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Auth::user()->orders()->with('items.product')->latest()->get();
        return view('customer.orders.index', compact('orders'));
    }

    public function place()
    {
        $cart = Session::get('cart', []);
        if (empty($cart)) {
            return back()->with('error', 'Cart is empty!');
        }

        $total = collect($cart)->sum(fn($item) => $item['qty'] * $item['price']);

        $order = Order::create([
            'user_id' => Auth::id(),
            'total' => $total,
            'status' => 'pending',
        ]);

        foreach ($cart as $productId => $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $productId,
                'quantity' => $item['qty'],
                'price' => $item['price'],
            ]);
        }

        Session::forget('cart');

        return redirect()->route('orders.index')->with('success', 'Order placed!');
    }
}
