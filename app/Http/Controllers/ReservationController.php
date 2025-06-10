<?php

namespace App\Http\Controllers;

use App\Models\Bicycle;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReservationController extends Controller
{
    public function store(Request $request, Bicycle $bicycle)
    {
        $request->validate([
            'start_time' => 'required|date|after:now',
            'end_time' => 'required|date|after:start_time',
        ]);

        $reservation = Reservation::create([
            'user_id' => Auth::id(),
            'bicycle_id' => $bicycle->id,
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
            'status' => 'pending'
        ]);

        $bicycle->update(['status' => 'reserved']);

        return redirect()->route('reservations.show', $reservation)
            ->with('success', 'Bicycle reserved successfully!');
    }

    public function show(Reservation $reservation)
    {
        return view('reservations.show', compact('reservation'));
    }
}
