<?php

namespace Database\Factories;

use App\Models\Bicycle;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class MaintenanceLogFactory extends Factory
{
    public function definition()
    {
        return [
            'bicycle_id' => Bicycle::factory(),
            'staff_id' => User::factory(),
            'maintenance_type' => $this->faker->randomElement(['inspection', 'repair', 'routine']),
            'description' => $this->faker->sentence,
            'completed_at' => $this->faker->dateTimeBetween('-1 month', 'now'),
            'next_inspection_date' => $this->faker->dateTimeBetween('now', '+1 year'),
        ];
    }
}
