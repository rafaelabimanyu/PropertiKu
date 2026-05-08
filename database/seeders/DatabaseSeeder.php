<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Property;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Admin
        $admin = User::factory()->create([
            'name' => 'Admin PropertiKu',
            'email' => 'admin@propertiku.com',
            'role' => User::ROLE_ADMIN,
        ]);

        // Agent
        $agent = User::factory()->create([
            'name' => 'Agent Abi',
            'email' => 'agent@propertiku.com',
            'role' => User::ROLE_AGENT,
        ]);

        // Buyer
        User::factory()->create([
            'name' => 'Buyer John',
            'email' => 'buyer@propertiku.com',
            'role' => User::ROLE_BUYER,
        ]);

        // Sample Properties
        Property::create([
            'user_id' => $agent->id,
            'title' => 'Modern Minimalist Villa in Bali',
            'slug' => 'modern-minimalist-villa-in-bali',
            'price' => 1250000.00,
            'city' => 'Bali',
            'address' => 'Jl. Sunset Road No. 123, Seminyak',
            'bedrooms' => 4,
            'bathrooms' => 3,
            'area' => 250.50,
            'status' => 'sale',
            'description' => 'Beautiful villa with private pool and stunning sunset views.',
        ]);

        Property::create([
            'user_id' => $agent->id,
            'title' => 'Luxury Apartment in Jakarta CBD',
            'slug' => 'luxury-apartment-in-jakarta-cbd',
            'price' => 5500.00,
            'city' => 'Jakarta',
            'address' => 'Sudirman Central Business District',
            'bedrooms' => 2,
            'bathrooms' => 2,
            'area' => 120.00,
            'status' => 'rent',
            'description' => 'High-end apartment with full city view and premium facilities.',
        ]);
    }
}
