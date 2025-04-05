<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $customers = User::role('customer')->get();
        $products = Product::all();

        foreach (range(1, 10) as $i) {
            $customer = $customers->random();
            $status = $i <= 5 ? 'completed' : 'pending';
            $itemsCount = rand(1, 3);
            $selectedProducts = $products->random($itemsCount);

            $order = Order::create([
                'user_id' => $customer->id,
                'total' => 0,
                'status' => $status,
            ]);

            $total = 0;
            foreach ($selectedProducts as $product) {
                $qty = rand(1, 3);
                $price = $product->price;
                $total += $price * $qty;

                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $product->id,
                    'quantity' => $qty,
                    'price' => $price,
                ]);
            }

            $order->update(['total' => $total]);
        }
    }
}
