<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::with('category')->latest()->paginate(10);
        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::with('parent')->whereNotNull('parent_id')->get();
        $categoryGroups = [
            2 => 'electronics', // Smartphones
            3 => 'electronics', // Accessories
            5 => 'clothing',    // Men's
            6 => 'clothing',    // Women's
        ];

        return view('admin.products.create', compact('categories', 'categoryGroups'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        $data = $request->validated();

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('products', 'public');
        }

        $attributes = $request->input('attributes', []);
        $data['attributes'] = !empty($attributes) ? json_encode($attributes) : null;

        Product::create($data);

        return redirect()->route('products.index')->with('success', 'Product created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $attributes = json_decode($product->attributes, true);
        $selectedColor = $attributes['color'] ?? null;
        $selectedSize = $attributes['size'] ?? null;
        $categories = Category::with('parent')->whereNotNull('parent_id')->get();
        $categoryGroups = [
            2 => 'electronics', // Smartphones
            3 => 'electronics', // Accessories
            5 => 'clothing',    // Men's
            6 => 'clothing',    // Women's
        ];
        return view('admin.products.edit', compact('product', 'selectedColor', 'selectedSize', 'categories', 'categoryGroups'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreProductRequest $request, Product $product)
    {
        $data = $request->validated();

        if ($request->hasFile('image')) {
            if ($product->image) {
                Storage::disk('public')->delete($product->image);
            }
            $data['image'] = $request->file('image')->store('products', 'public');
        }
        $data['attributes'] = json_encode($request->input('attributes', []));
        $product->update($data);

        return redirect()->route('products.index')->with('success', 'Product updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        if ($product->image) {
            Storage::disk('public')->delete($product->image);
        }

        $product->delete();
        return redirect()->route('products.index')->with('success', 'Product deleted successfully.');
    }
}
