<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\VehicleController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\CustomerController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('vehicles', VehicleController::class);
    Route::resource('bookings', BookingController::class);
    Route::resource('customers', CustomerController::class);
});

require __DIR__.'/auth.php';

Route::get('bookings/calendar', [BookingController::class, 'calendar'])->name('bookings.calendar');
Route::get('bookings/events', [BookingController::class, 'events'])->name('bookings.events');

Route::put('bookings/{id}/upload-payment-proof', [BookingController::class, 'uploadPaymentProof'])->name('bookings.uploadPaymentProof');
