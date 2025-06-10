<?php

namespace Database\Seeders;

use App\Models\Bicycle;
use App\Models\Hub;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class CityCycleSeeder extends Seeder
{
    public function run()
    {
        // Create hubs
        $hubs = [
            ['name' => 'Central Station', 'location' => 'Amsterdam Centraal', 'capacity' => 50],
            ['name' => 'Zuid Station', 'location' => 'Amsterdam Zuid', 'capacity' => 40],
            ['name' => 'Amstel Station', 'location' => 'Amstel Station', 'capacity' => 35],
            ['name' => 'Sloterdijk Station', 'location' => 'Sloterdijk', 'capacity' => 30],
        ];

        foreach ($hubs as $hub) {
            Hub::create($hub);
        }

        // Create bicycles
        $hubs = Hub::all();
        foreach ($hubs as $hub) {
            for ($i = 1; $i <= $hub->capacity; $i++) {
                $status = rand(0, 10) > 1 ? 'available' : 'in_maintenance';

                Bicycle::create([
                    'hub_id' => $hub->id,
                    'identifier' => 'CC-' . $hub->id . '-' . str_pad($i, 3, '0', STR_PAD_LEFT),
                    'status' => $status,
                    'last_inspection_date' => now()->subDays(rand(0, 90)),
                    'next_inspection_date' => now()->addDays(rand(30, 180)),
                ]);
            }
        }

        // Create a test user
        User::create([
            'name' => 'Test User',
            'email' => 'user@citycycle.test',
            'password' => Hash::make('password'),
        ]);

        // Create a maintenance staff
        User::create([
            'name' => 'Maintenance Staff',
            'email' => 'staff@citycycle.test',
            'password' => Hash::make('password'),
        ]);
    }
}
