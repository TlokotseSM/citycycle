<?php

namespace Database\Factories;

use App\Models\Hub;
use Illuminate\Database\Eloquent\Factories\Factory;

class BicycleFactory extends Factory
{
    public function definition()
    {
        return [
            'hub_id' => Hub::factory(),
            'identifier' => 'CC-' . fake()->unique()->numberBetween(1000, 9999),
            'status' => fake()->randomElement(['available', 'available', 'available', 'in_maintenance']),
            'last_inspection_date' => fake()->dateTimeBetween('-1 year', '-1 month'),
            'next_inspection_date' => fake()->dateTimeBetween('+1 month', '+1 year'),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
