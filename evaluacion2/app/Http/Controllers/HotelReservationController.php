<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HotelReservation;

class HotelReservationController extends Controller
{
    public function index()
    {
        $reservations = HotelReservation::all();
        return view('hotel.index', compact('reservations'));
    }

    public function show()
    {
        return view('hotel.form');
    }

    public function reserve(Request $request)
    {
        $validated = $request->validate([
            'check_in' => 'required|date|after:today',
            'check_out' => 'required|date|after:check_in',
            'room_type' => 'required|string',
            'guests' => 'required|integer|min:1|max:4',
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|string|max:20',
            'special_requests' => 'nullable|string'
        ]);

        HotelReservation::create($validated);
        
        return back()->with('success', 'Reserva realizada exitosamente.');
    }

    public function edit($id)
    {
        $reservation = HotelReservation::findOrFail($id);
        return view('hotel.edit', compact('reservation'));
    }

    public function update(Request $request, $id)
    {
        $reservation = HotelReservation::findOrFail($id);
        $validated = $request->validate([
            'check_in' => 'required|date',
            'check_out' => 'required|date|after:check_in',
            'room_type' => 'required|string',
            'guests' => 'required|integer|min:1|max:4',
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|string|max:20',
            'special_requests' => 'nullable|string',
            'status' => 'required|in:pendiente,confirmada'
        ]);

        $reservation->update($validated);
        return redirect()->route('hotel.reservations')->with('success', 'Reserva actualizada exitosamente.');
    }

    public function destroy($id)
    {
        $reservation = HotelReservation::findOrFail($id);
        $reservation->delete();
        return redirect()->route('hotel.reservations')->with('success', 'Reserva eliminada exitosamente.');
    }
}
