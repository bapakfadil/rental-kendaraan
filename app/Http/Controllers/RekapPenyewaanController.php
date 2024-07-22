<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use Carbon\Carbon;

class RekapPenyewaanController extends Controller
{
    public function index()
    {
        return view('rekap-penyewaan.index');
    }

    public function show(Request $request)
    {
        $request->validate([
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

        $startDate = Carbon::parse($request->start_date);
        $endDate = Carbon::parse($request->end_date);

        $bookings = Booking::whereBetween('start_date', [$startDate, $endDate])
                            ->orWhereBetween('end_date', [$startDate, $endDate])
                            ->with('vehicle')
                            ->get()
                            ->map(function ($booking) {
                                $booking->start_date = Carbon::parse($booking->start_date);
                                $booking->end_date = Carbon::parse($booking->end_date);
                                return $booking;
                            });

        $totalIncome = $bookings->sum('total_price');

        return view('rekap-penyewaan.show', compact('bookings', 'totalIncome', 'startDate', 'endDate'));
    }
}
