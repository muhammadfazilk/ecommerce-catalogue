<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RolesAndUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = Role::firstOrCreate(['name' => 'admin']);
        $manager = Role::firstOrCreate(['name' => 'product_manager']);
        $customer = Role::firstOrCreate(['name' => 'customer']);

        // Admin
        $adminUser = User::firstOrCreate([
            'email' => 'admin@example.com',
        ], [
            'name' => 'Admin',
            'password' => bcrypt('12345678')
        ]);
        $adminUser->assignRole($admin);

        // Product Manager
        $managerUser = User::firstOrCreate([
            'email' => 'manager@example.com',
        ], [
            'name' => 'Product Manager',
            'password' => bcrypt('12345678')
        ]);
        $managerUser->assignRole($manager);

        // Customers
        for ($i = 1; $i <= 5; $i++) {
            $customerUser = User::firstOrCreate([
                'email' => "customer{$i}@example.com",
            ], [
                'name' => "Customer {$i}",
                'password' => bcrypt('12345678')
            ]);
            $customerUser->assignRole($customer);
        }
    }
}
