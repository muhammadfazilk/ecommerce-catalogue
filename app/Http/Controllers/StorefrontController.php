<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class StorefrontController extends Controller
{
    public function index()
    {
        $products = Product::with('category')->paginate(10);
        return view('customer.store.index', compact('products'));
    }

    public function show(Product $product)
    {
        return view('customer.store.show', compact('product'));
    }
}
