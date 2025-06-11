<?php

namespace Database\Factories;

use App\Models\Bicycle;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ReservationFactory extends Factory
{
    public function definition()
    {
        return [
            'user_id' => User::factory(),
            'bicycle_id' => Bicycle::factory(),
            'start_time' => fake()->dateTimeBetween('now', '+1 week'),
            'end_time' => fake()->dateTimeBetween('+1 week', '+2 weeks'),
            'status' => fake()->randomElement(['pending', 'active', 'completed']),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
