<?php

namespace App\Http\Controllers;

use App\Models\HotelReservation;

class DashboardController extends Controller
{
    public function index()
    {
        $reservations = HotelReservation::orderBy('created_at', 'desc')->get();
        return view('dashboard', compact('reservations'));
    }
}