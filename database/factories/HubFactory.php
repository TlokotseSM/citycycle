<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class HubFactory extends Factory
{
    public function definition()
    {
        return [
            'name' => fake()->unique()->randomElement([
                'Central Station',
                'Zuid Station',
                'Amstel Station',
                'Sloterdijk Station'
            ]),
            'location' => fake()->address(),
            'capacity' => fake()->numberBetween(30, 50),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
