<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Verifikasi Bukti Pembayaran') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1 class="mb-4">Verifikasi Bukti Pembayaran</h1>

                    <div class="mb-4">
                        <img src="{{ url('/uploads/' . $booking->payment_proof) }}" alt="Bukti Pembayaran" class="img-fluid">
                    </div>

                    <form action="{{ route('admin.bookings.confirmPayment', $booking->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('PUT')
                        <button type="submit" class="btn btn-success">Konfirmasi Pembayaran</button>
                    </form>

                    <form action="{{ route('admin.bookings.rejectPayment', $booking->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('PUT')
                        <button type="submit" class="btn btn-danger">Tolak Pembayaran</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
