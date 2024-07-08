<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detail Booking') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1 class="text-2xl font-bold mb-4">Detail Booking</h1>
                    <div class="mb-4">
                        <strong>Nama Lengkap:</strong> {{ $booking->full_name }}<br>
                        <strong>NIK:</strong> {{ $booking->nik }}<br>
                        <strong>Alamat:</strong> {{ $booking->address }}<br>
                        <strong>Kendaraan:</strong> {{ $booking->vehicle->model }}<br>
                        <strong>Tanggal Mulai:</strong> {{ $booking->start_date }}<br>
                        <strong>Tanggal Akhir:</strong> {{ $booking->end_date }}<br>
                        <strong>Status:</strong> {{ $booking->status }}<br>
                    </div>
                    <a href="{{ route('customer.bookings') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">Kembali</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
