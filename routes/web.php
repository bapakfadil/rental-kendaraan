<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\VehicleController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\CustomerController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Route untuk Dashboard dengan middleware auth dan verified
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Route untuk profil pengguna
Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Route untuk admin
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::resource('vehicles', VehicleController::class);
    Route::resource('customers', CustomerController::class);

    // Route untuk booking yang hanya bisa diakses oleh admin
    Route::get('bookings', [BookingController::class, 'index'])->name('bookings.index');
    Route::get('bookings/{id}/edit', [BookingController::class, 'edit'])->name('bookings.edit');
    Route::put('bookings/{id}', [BookingController::class, 'update'])->name('bookings.update');
    Route::delete('bookings/{id}', [BookingController::class, 'destroy'])->name('bookings.destroy');
    Route::get('bookings/calendar', [BookingController::class, 'calendar'])->name('bookings.calendar');
    Route::get('bookings/events', [BookingController::class, 'events'])->name('bookings.events');
    Route::put('bookings/{id}/upload-payment-proof', [BookingController::class, 'uploadPaymentProof'])->name('bookings.uploadPaymentProof');
});

// Route untuk customer dan admin
Route::middleware(['auth', 'role:customer,admin'])->group(function () {
    // Route yang bisa diakses oleh customer dan admin
    Route::resource('bookings', BookingController::class)->only(['show', 'create', 'store']);
    Route::get('bookings/{id}', [BookingController::class, 'show'])->name('bookings.show');
    Route::get('bookings/create', [BookingController::class, 'create'])->name('bookings.create');
    Route::post('bookings', [BookingController::class, 'store'])->name('bookings.store');

    // Route tambahan untuk customer meninjau dan mengelola booking mereka
    Route::get('customer/bookings', [BookingController::class, 'customerBookings'])->name('customer.bookings');
    Route::put('customer/bookings/{id}/cancel', [BookingController::class, 'cancelBooking'])->name('customer.bookings.cancel');
    Route::get('customer/bookings/{id}/upload-payment', [BookingController::class, 'uploadPayment'])->name('customer.bookings.uploadPayment');
    Route::put('customer/bookings/{id}/upload-payment', [BookingController::class, 'processPayment'])->name('customer.bookings.processPayment');
});

// Route untuk admin memverifikasi bukti transfer
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('admin/bookings/{id}/verify-payment', [BookingController::class, 'verifyPayment'])->name('admin.bookings.verifyPayment');
    Route::put('admin/bookings/{id}/confirm-payment', [BookingController::class, 'confirmPayment'])->name('admin.bookings.confirmPayment');
});


require __DIR__.'/auth.php';
