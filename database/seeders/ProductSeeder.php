<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $smartphones = Category::where('name', 'Smartphones')->first();
        $accessories = Category::where('name', 'Accessories')->first();
        $mens = Category::where('name', "Men's")->first();
        $womens = Category::where('name', "Women's")->first();

        // Smartphones
        Product::create([
            'name' => 'Smartphone X1',
            'price' => 899,
            'stock' => 50,
            'category_id' => $smartphones->id,
            'image' => 'products/smartphone.jpg',
            'attributes' => json_encode(['color' => 'Black', 'size' => '128GB']),
        ]);

        Product::create([
            'name' => 'Smartphone Y2',
            'price' => 1099,
            'stock' => 30,
            'category_id' => $smartphones->id,
            'image' => 'products/smartphone.jpg',
            'attributes' => json_encode(['color' => 'Blue', 'size' => '256GB']),
        ]);

        Product::create([
            'name' => 'Smartphone Z3',
            'price' => 799,
            'stock' => 70,
            'category_id' => $smartphones->id,
            'image' => 'products/smartphone.jpg',
            'attributes' => json_encode(['color' => 'White', 'size' => '128GB']),
        ]);

        // Accessories
        Product::create([
            'name' => 'Phone Case',
            'price' => 19.99,
            'stock' => 200,
            'category_id' => $accessories->id,
            'image' => 'products/accessories.jpg',
            'attributes' => json_encode(['color' => 'Red']),
        ]);

        Product::create([
            'name' => 'Screen Protector',
            'price' => 12.49,
            'stock' => 150,
            'category_id' => $accessories->id,
            'image' => 'products/accessories.jpg',
            'attributes' => json_encode(['color' => 'Transparent']),
        ]);

        Product::create([
            'name' => 'Wireless Charger',
            'price' => 39.00,
            'stock' => 100,
            'category_id' => $accessories->id,
            'image' => 'products/accessories.jpg',
            'attributes' => json_encode(['color' => 'Black']),
        ]);

        // Clothing--Mens
        Product::create([
            'name' => "Men's T-Shirt",
            'price' => 35.00,
            'stock' => 100,
            'category_id' => $mens->id,
            'image' => 'products/mens-clothing.jpg',
            'attributes' => json_encode(['color' => 'Blue', 'size' => 'M']),
        ]);

        Product::create([
            'name' => "Men's Jeans",
            'price' => 55.00,
            'stock' => 80,
            'category_id' => $mens->id,
            'image' => 'products/mens-clothing.jpg',
            'attributes' => json_encode(['color' => 'Black', 'size' => 'L']),
        ]);

        // Clothing--Womens
        Product::create([
            'name' => "Women's Summer Dress",
            'price' => 49.99,
            'stock' => 90,
            'category_id' => $womens->id,
            'image' => 'products/womens-clothing.jpg',
            'attributes' => json_encode(['color' => 'Red', 'size' => 'M']),
        ]);

        Product::create([
            'name' => "Women's Denim Jacket",
            'price' => 89.00,
            'stock' => 70,
            'category_id' => $womens->id,
            'image' => 'products/womens-clothing.jpg',
            'attributes' => json_encode(['color' => 'Blue', 'size' => 'L']),
        ]);
    }
}
