<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function add(Product $product)
    {
        $cart = Session::get('cart', []);
        $cart[$product->id] = [
            'name' => $product->name,
            'price' => $product->price,
            'qty' => ($cart[$product->id]['qty'] ?? 0) + 1,
        ];
        Session::put('cart', $cart);

        return back()->with('success', 'Added to cart');
    }

    public function view()
    {
        $cart = session()->get('cart', []);
        $productIds = array_keys($cart);
        $products = Product::whereIn('id', $productIds)->get();
        return view('customer.store.cart', compact('cart', 'products'));
    }

    public function remove(Product $product)
    {
        $cart = Session::get('cart', []);
        unset($cart[$product->id]);
        Session::put('cart', $cart);

        return back()->with('success', 'Removed from cart');
    }
}
