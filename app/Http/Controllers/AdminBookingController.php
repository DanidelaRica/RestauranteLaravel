<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Booking;

class AdminBookingController extends Controller
{
    public function index() {
        return view('admin.bookings')->with('bookings', Booking::all());
    }
}
