<?php

namespace Database\Seeders;

use App\Models\Document;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ComplianceDocumentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = Product::take(5)->get();

        foreach ($products as $index => $product) {
            Document::create([
                'product_id' => $product->id,
                'type' => $index < 3 ? 'Product Certification' : 'User Manual',
                'title' => 'Document ' . ($index + 1),
                'issue_date' => now()->subDays(rand(10, 100)),
                'file_path' => 'documents/sample.pdf',
            ]);
        }
    }
}
