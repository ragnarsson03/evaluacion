<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HotelReservation extends Model
{
    protected $fillable = [
        'name',
        'email',
        'phone',
        'check_in',
        'check_out',
        'room_type',
        'guests',
        'special_requests',
        'status'
    ];

    protected $casts = [
        'check_in' => 'date',
        'check_out' => 'date'
    ];
}
