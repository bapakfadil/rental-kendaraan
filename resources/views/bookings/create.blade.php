@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Buat Pemesanan Baru</h1>
    <form action="{{ route('bookings.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="vehicle_id">Kendaraan</label>
            <select name="vehicle_id" id="vehicle_id" class="form-control">
                @foreach($vehicles as $vehicle)
                    <option value="{{ $vehicle->id }}">{{ $vehicle->brand }} - {{ $vehicle->model }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="start_date">Tanggal Mulai</label>
            <input type="datetime-local" name="start_date" id="start_date" class="form-control">
        </div>
        <div class="form-group">
            <label for="end_date">Tanggal Selesai</label>
            <input type="datetime-local" name="end_date" id="end_date" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
