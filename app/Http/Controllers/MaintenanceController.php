<?php

namespace App\Http\Controllers;

use App\Models\Bicycle;
use App\Models\MaintenanceLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MaintenanceController extends Controller
{
    public function updateStatus(Request $request, Bicycle $bicycle)
    {
        $request->validate([
            'status' => 'required|in:available,in_maintenance',
            'maintenance_notes' => 'nullable|string',
            'next_inspection_date' => 'nullable|date'
        ]);

        $bicycle->update([
            'status' => $request->status,
            'next_inspection_date' => $request->next_inspection_date ?? $bicycle->next_inspection_date
        ]);

        if ($request->maintenance_notes) {
            MaintenanceLog::create([
                'bicycle_id' => $bicycle->id,
                'staff_id' => Auth::id(),
                'maintenance_type' => $request->status === 'available' ? 'inspection' : 'repair',
                'description' => $request->maintenance_notes,
                'completed_at' => now(),
                'next_inspection_date' => $request->next_inspection_date
            ]);
        }

        return back()->with('success', 'Bicycle status updated!');
    }
}
