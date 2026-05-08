<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Property>
 */
class PropertyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $types = ['house', 'villa', 'apartment', 'townhouse', 'land', 'office'];
        $type = $this->faker->randomElement($types);
        
        $cities = ['Jakarta', 'Bandung', 'Bogor', 'Tangerang', 'Bekasi', 'Bali', 'Surabaya'];
        $city = $this->faker->randomElement($cities);

        $titles = [
            'house' => ['Modern Minimalist House', 'Family Home with Garden', 'Luxury Residence', 'Cozy House'],
            'villa' => ['Tropical Pool Villa', 'Luxury Oceanview Villa', 'Private Retreat Villa', 'Sunset Villa'],
            'apartment' => ['Premium Highrise Apartment', 'City Center Loft', 'Studio Apartment', 'Penthouse Suite'],
            'townhouse' => ['Exclusive Townhouse', 'Urban Townhouse', 'Green Living Townhouse'],
            'land' => ['Prime Commercial Land', 'Residential Plot', 'Strategic Land'],
            'office' => ['Modern Office Space', 'Corporate Office Suite', 'Startup Hub Workspace']
        ];

        $title = $this->faker->randomElement($titles[$type]) . ' in ' . $city;
        
        $priceRanges = [
            'house' => [800000, 5000000],
            'villa' => [2000000, 15000000],
            'apartment' => [500000, 3000000],
            'townhouse' => [1000000, 4000000],
            'land' => [300000, 2000000],
            'office' => [1500000, 8000000],
        ];

        $price = $this->faker->numberBetween($priceRanges[$type][0], $priceRanges[$type][1]);

        $beds = in_array($type, ['land', 'office']) ? 0 : $this->faker->numberBetween(1, 6);
        $baths = in_array($type, ['land', 'office']) ? 0 : $this->faker->numberBetween(1, max(1, $beds));
        
        // Use external dummy images related to architecture/house
        $images = [
            'house' => [
                'https://images.unsplash.com/photo-1600596542815-ffad4c1539a9?w=800&q=80',
                'https://images.unsplash.com/photo-1512917774080-9991f1c4c750?w=800&q=80',
                'https://images.unsplash.com/photo-1564013799919-ab600027ffc6?w=800&q=80',
                'https://images.unsplash.com/photo-1580587771525-78b9dba3b914?w=800&q=80',
            ],
            'villa' => [
                'https://images.unsplash.com/photo-1582268611958-ebfd161ef9cf?w=800&q=80',
                'https://images.unsplash.com/photo-1600607686527-6fb886090705?w=800&q=80',
                'https://images.unsplash.com/photo-1600585154340-be6161a56a0c?w=800&q=80',
            ],
            'apartment' => [
                'https://images.unsplash.com/photo-1522708323590-d24dbb6b0267?w=800&q=80',
                'https://images.unsplash.com/photo-1502672260266-1c1de2424008?w=800&q=80',
                'https://images.unsplash.com/photo-1560448204-e02f11c3d0e2?w=800&q=80',
            ],
            'townhouse' => [
                'https://images.unsplash.com/photo-1512917774080-9991f1c4c750?w=800&q=80',
                'https://images.unsplash.com/photo-1580587771525-78b9dba3b914?w=800&q=80',
            ],
            'land' => [
                'https://images.unsplash.com/photo-1500382017468-9049fed747ef?w=800&q=80',
                'https://images.unsplash.com/photo-1500530855697-b586d89ba3ee?w=800&q=80',
            ],
            'office' => [
                'https://images.unsplash.com/photo-1497366216548-37526070297c?w=800&q=80',
                'https://images.unsplash.com/photo-1524758631624-e2822e304c36?w=800&q=80',
            ]
        ];

        return [
            'user_id' => User::where('role', User::ROLE_AGENT)->inRandomOrder()->first()->id ?? User::factory(),
            'title' => $title,
            'slug' => str()->slug($title) . '-' . $this->faker->unique()->numberBetween(1000, 9999),
            'price' => $price,
            'city' => $city,
            'address' => $this->faker->streetAddress() . ', ' . $this->faker->buildingNumber(),
            'bedrooms' => $beds,
            'bathrooms' => $baths,
            'area' => $this->faker->numberBetween(50, 1000),
            'type' => $type,
            'status' => $this->faker->randomElement(['sale', 'rent']),
            'description' => $this->faker->paragraphs(3, true),
            'image' => $this->faker->randomElement($images[$type]),
            'facilities' => $this->faker->randomElements(['Smart Home', 'Pool', 'Security', 'Parking', 'Gym', 'Balcony', 'Garden', 'AC'], $this->faker->numberBetween(2, 6)),
        ];
    }
}
