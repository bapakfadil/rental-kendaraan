<?php

// BookingController.php
namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Vehicle;
use App\Notifications\BookingStatusChanged;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    public function index()
    {
        $bookings = Booking::with('vehicle', 'user')->get();
        return view('bookings.index', compact('bookings'));
    }

    public function create()
    {
        $vehicles = Vehicle::all();
        return view('bookings.create', compact('vehicles'));
    }

    public function store(Request $request)
    {
        $booking = new Booking();
        $booking->user_id = Auth::id();
        $booking->vehicle_id = $request->vehicle_id;
        $booking->start_date = $request->start_date;
        $booking->end_date = $request->end_date;
        $booking->status = 'new';
        $booking->save();

        return redirect()->route('bookings.index');
    }

    public function show($id)
    {
        $booking = Booking::with('vehicle', 'user')->findOrFail($id);
        return view('bookings.show', compact('booking'));
    }

    public function edit($id)
    {
        $booking = Booking::findOrFail($id);
        $vehicles = Vehicle::all();
        return view('bookings.edit', compact('booking', 'vehicles'));
    }

    public function update(Request $request, $id)
    {
        $booking = Booking::findOrFail($id);
        $booking->update($request->all());
        $booking->vehicle_id = $request->vehicle_id;
        $booking->start_date = $request->start_date;
        $booking->end_date = $request->end_date;
        $booking->status = $request->status;
        $booking->save();


        $booking->user->notify(new BookingStatusChanged($booking));

        return redirect()->route('bookings.index');
    }

    public function destroy($id)
    {
        $booking = Booking::findOrFail($id);
        $booking->delete();
        return redirect()->route('bookings.index');
    }

    public function calendar()
    {
        return view('bookings.calendar');
    }

    public function events()
    {
        $bookings = Booking::select('start_date as start', 'end_date as end', 'status')
                        ->get();
        return response()->json($bookings);
    }

    public function uploadPaymentProof(Request $request, $id)
    {
        $request->validate([
            'payment_proof' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $booking = Booking::findOrFail($id);

        if ($request->hasFile('payment_proof')) {
            $file = $request->file('payment_proof');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('payment_proofs'), $filename);
            $booking->payment_proof = $filename;
            $booking->status = 'confirmed';
            $booking->save();
        }

        return redirect()->route('bookings.show', $id);
    }

}
