<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class StorefrontController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::query()->with('category');

        if ($request->filled('category')) {
            $query->where('category_id', $request->category);
        }

        $products = $query->paginate(8);
        $categories = Category::all();
        return view('customer.store.index', compact('products', 'categories'));
    }

    public function show(Product $product)
    {
        return view('customer.store.show', compact('product'));
    }
}
