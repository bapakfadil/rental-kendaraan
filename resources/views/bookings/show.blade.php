@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detail Pemesanan</h1>
    <p><strong>Kendaraan:</strong> {{ $booking->vehicle->brand }} - {{ $booking->vehicle->model }}</p>
    <p><strong>Tanggal Mulai:</strong> {{ $booking->start_date }}</p>
    <p><strong>Tanggal Selesai:</strong> {{ $booking->end_date }}</p>
    <p><strong>Status:</strong> {{ $booking->status }}</p>

    @if ($booking->payment_proof)
        <p><strong>Bukti Pembayaran:</strong></p>
        <img src="{{ asset('payment_proofs/' . $booking->payment_proof) }}" alt="Bukti Pembayaran" class="img-fluid">
    @endif

    @if ($booking->status == 'new')
        <a href="{{ route('bookings.uploadPaymentProof', $booking->id) }}" class="btn btn-primary">Upload Bukti Pembayaran</a>
    @endif
</div>
@endsection
