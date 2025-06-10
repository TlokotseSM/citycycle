<?php

namespace App\Http\Controllers;

use App\Models\Bicycle;
use App\Models\Hub;
use Illuminate\Http\Request;

class BicycleController extends Controller
{
    public function index()
    {
        $bicycles = Bicycle::with('hub')->get();
        return view('bicycles.index', compact('bicycles'));
    }

    public function forMaintenance()
    {
        $dueForInspection = Bicycle::where('next_inspection_date', '<=', now())
            ->orWhere('status', 'in_maintenance')
            ->with('hub')
            ->get();

        return view('bicycles.maintenance', compact('dueForInspection'));
    }
}
