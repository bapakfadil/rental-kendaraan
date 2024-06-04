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

Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::resource('vehicles', VehicleController::class);
    Route::resource('customers', CustomerController::class);
    Route::get('bookings', [BookingController::class, 'index'])->name('bookings.index');
    Route::get('bookings/{id}/edit', [BookingController::class, 'edit'])->name('bookings.edit');
    Route::put('bookings/{id}', [BookingController::class, 'update'])->name('bookings.update');
    Route::delete('bookings/{id}', [BookingController::class, 'destroy'])->name('bookings.destroy');
    Route::get('bookings/calendar', [BookingController::class, 'calendar'])->name('bookings.calendar');
    Route::get('bookings/events', [BookingController::class, 'events'])->name('bookings.events');
    Route::put('bookings/{id}/upload-payment-proof', [BookingController::class, 'uploadPaymentProof'])->name('bookings.uploadPaymentProof');
});

Route::middleware(['auth', 'role:user,admin'])->group(function () {
    Route::resource('bookings', BookingController::class)->except(['index', 'edit', 'update', 'destroy']);
});

require __DIR__.'/auth.php';
