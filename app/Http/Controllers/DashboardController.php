<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use App\Models\Booking;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        if ($user->isAdmin()) {
            // Dapatkan data yang dibutuhkan untuk dashboard admin
            $totalVehicles = Vehicle::count();
            $bookingsThisMonth = Booking::whereMonth('created_at', date('m'))
                ->whereYear('created_at', date('Y'))
                ->count();
            $totalUsers = User::count();

            // Dapatkan pemesanan terbaru
            $recentBookings = Booking::with('user', 'vehicle')
                ->orderBy('created_at', 'desc')
                ->take(5)
                ->get();

            return view('dashboard.admin', compact('totalVehicles', 'bookingsThisMonth', 'totalUsers', 'recentBookings'));
        } else {
            // Tampilan dashboard untuk user biasa
            return view('dashboard.user');
        }
    }
}
