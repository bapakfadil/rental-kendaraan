<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    public function create()
    {
        $vehicles = Vehicle::all();
        return view('bookings.create', compact('vehicles'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'full_name' => 'required|string|max:255',
            'nik' => 'required|string|max:16',
            'address' => 'required|string',
            'ktp_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'vehicle_id' => 'required|exists:vehicles,id',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

        // Cek ketersediaan kendaraan
        $isAvailable = $this->checkAvailability($request->vehicle_id, $request->start_date, $request->end_date);

        if (!$isAvailable) {
            return redirect()->back()->withErrors(['error' => 'Kendaraan tidak tersedia pada tanggal yang dipilih.']);
        }

        if ($request->hasFile('ktp_image')) {
            $image = $request->file('ktp_image');
            $ktpImageName = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/uploads');
            $image->move($destinationPath, $ktpImageName);
        }

        $booking = new Booking();
        $booking->user_id = Auth::id();
        $booking->vehicle_id = $request->vehicle_id;
        $booking->start_date = $request->start_date;
        $booking->end_date = $request->end_date;
        $booking->status = 'pending';
        $booking->full_name = $request->full_name;
        $booking->nik = $request->nik;
        $booking->address = $request->address;
        $booking->ktp_image = $ktpImageName ?? null;
        $booking->save();

        return redirect()->route('customer.bookings')->with('success', 'Booking berhasil dibuat.');
    }

    private function checkAvailability($vehicleId, $startDate, $endDate)
    {
        $conflictingBookings = Booking::where('vehicle_id', $vehicleId)
            ->where(function ($query) use ($startDate, $endDate) {
                $query->whereBetween('start_date', [$startDate, $endDate])
                    ->orWhereBetween('end_date', [$startDate, $endDate])
                    ->orWhere(function ($query) use ($startDate, $endDate) {
                        $query->where('start_date', '<=', $startDate)
                            ->where('end_date', '>=', $endDate);
                    });
            })
            ->where('status', '!=', 'cancelled')
            ->exists();

        return !$conflictingBookings;
    }

    public function customerBookings()
    {
        $bookings = Booking::where('user_id', Auth::id())->get();
        return view('bookings.customer.index', compact('bookings'));
    }

    public function show($id)
    {
        $booking = Booking::findOrFail($id);
        return view('bookings.show', compact('booking'));
    }

    public function uploadPayment($id)
    {
        $booking = Booking::findOrFail($id);
        if ($booking->user_id != Auth::id()) {
            return redirect()->route('customer.bookings')->with('error', 'Anda tidak memiliki izin untuk mengunggah pembayaran untuk booking ini.');
        }
        return view('bookings.customer.upload_payment', compact('booking'));
    }

    public function cancelBooking($id)
    {
        $booking = Booking::findOrFail($id);
        if ($booking->user_id != Auth::id()) {
            return redirect()->route('customer.bookings')->with('error', 'Anda tidak memiliki izin untuk membatalkan booking ini.');
        }
        $booking->status = 'cancelled';
        $booking->save();

        return redirect()->route('customer.bookings')->with('success', 'Booking berhasil dibatalkan.');
    }

    // Menampilkan halaman verifikasi pembayaran untuk admin
    public function verifyPayment($id)
    {
        $booking = Booking::findOrFail($id);
        return view('bookings.admin.verify_payment', compact('booking'));
    }

    // Mengonfirmasi pembayaran dan mengubah status booking
    public function confirmPayment(Request $request, $id)
    {
        $booking = Booking::findOrFail($id);
        $booking->status = 'confirmed';
        $booking->save();

        return redirect()->route('bookings.index')->with('success', 'Pembayaran berhasil dikonfirmasi.');
    }

    // Menolak pembayaran dan mengubah status booking
    public function rejectPayment(Request $request, $id)
    {
        $booking = Booking::findOrFail($id);
        $booking->status = 'payment_rejected';
        $booking->save();

        return redirect()->route('bookings.index')->with('success', 'Pembayaran ditolak. Customer diminta mengunggah ulang bukti pembayaran.');
    }

    public function processPayment(Request $request, $id)
    {
        $validated = $request->validate([
            'payment_proof' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $booking = Booking::findOrFail($id);
        if ($booking->user_id != Auth::id()) {
            return redirect()->route('customer.bookings')->with('error', 'Anda tidak memiliki izin untuk mengunggah pembayaran untuk booking ini.');
        }

        if ($request->hasFile('payment_proof')) {
            $image = $request->file('payment_proof');
            $name = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/uploads');
            $image->move($destinationPath, $name);
            $booking->payment_proof = $name;
            $booking->status = 'payment_pending'; // Pastikan status adalah string yang valid
            $booking->save();
        }

        return redirect()->route('customer.bookings')->with('success', 'Bukti pembayaran berhasil diunggah.');
    }

    public function index()
    {
        $bookings = Booking::all();
        return view('bookings.admin.index', compact('bookings'));
    }
}
