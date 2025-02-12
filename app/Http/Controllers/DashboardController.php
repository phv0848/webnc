<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Booking;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $bookings = $user->bookings; // Quan hệ đã được định nghĩa trong model User

        return view('dashboard', compact('user', 'bookings'));
    }
}
