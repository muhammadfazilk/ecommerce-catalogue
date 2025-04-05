<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Electronics
        $electronics = Category::create(['name' => 'Electronics']);
        Category::create(['name' => 'Smartphones', 'parent_id' => $electronics->id]);
        Category::create(['name' => 'Accessories', 'parent_id' => $electronics->id]);

        // Clothing
        $clothing = Category::create(['name' => 'Clothing']);
        Category::create(['name' => "Men's", 'parent_id' => $clothing->id]);
        Category::create(['name' => "Women's", 'parent_id' => $clothing->id]);
    }
}
