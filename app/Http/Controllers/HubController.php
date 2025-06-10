<?php

namespace App\Http\Controllers;

use App\Models\Hub;
use Illuminate\Http\Request;

class HubController extends Controller
{
    public function index()
    {
        $hubs = Hub::withCount(['bicycles as available_bikes_count' => function($query) {
            $query->where('status', 'available');
        }])->get();

        return view('hubs.index', compact('hubs'));
    }

    public function show(Hub $hub)
    {
        $availableBicycles = $hub->bicycles()->where('status', 'available')->get();
        return view('hubs.show', compact('hub', 'availableBicycles'));
    }
}
