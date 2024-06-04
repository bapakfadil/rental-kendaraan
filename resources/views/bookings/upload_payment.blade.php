@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Upload Bukti Pembayaran</h1>
    <form action="{{ route('bookings.uploadPaymentProof', $booking->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="payment_proof">Bukti Pembayaran</label>
            <input type="file" name="payment_proof" id="payment_proof" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Upload</button>
    </form>
</div>
@endsection
