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
                    <h1 class="text-2xl font-bold mb-4">Verifikasi Bukti Pembayaran</h1>

                    <div class="mb-4">
                        <img src="{{ url('/uploads/' . $booking->payment_proof) }}" alt="Bukti Pembayaran" class="w-full max-h-96 object-contain rounded-lg">
                    </div>

                    <div class="flex justify-between">
                        <a href="{{ url('/bookings') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Kembali</a>

                        <div class="flex space-x-4">
                            <form action="{{ route('admin.bookings.confirmPayment', $booking->id) }}" method="POST" class="inline">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Konfirmasi Pembayaran</button>
                            </form>

                            <form action="{{ route('admin.bookings.rejectPayment', $booking->id) }}" method="POST" class="inline">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Tolak Pembayaran</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
