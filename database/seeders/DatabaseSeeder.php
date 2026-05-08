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

        // Create exactly 60 random properties associated with any existing agent
        \App\Models\Property::factory(60)->create();
    }
}
