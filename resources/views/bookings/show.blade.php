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
                    <form>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Nama Lengkap</label>
                                <input type="text" value="{{ $booking->full_name }}" class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md bg-gray-100 cursor-not-allowed" readonly>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700">NIK</label>
                                <input type="text" value="{{ $booking->nik }}" class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md bg-gray-100 cursor-not-allowed" readonly>
                            </div>
                            <div class="col-span-1 md:col-span-2">
                                <label class="block text-sm font-medium text-gray-700">Alamat</label>
                                <textarea rows="3" class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md bg-gray-100 cursor-not-allowed" readonly>{{ $booking->address }}</textarea>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Kendaraan</label>
                                <input type="text" value="{{ $booking->vehicle->brand }} {{ $booking->vehicle->model }}" class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md bg-gray-100 cursor-not-allowed" readonly>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Nomor Plat</label>
                                <input type="text" value="{{ $booking->vehicle->plate_number }}" class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md bg-gray-100 cursor-not-allowed" readonly>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Tipe</label>
                                <input type="text" value="{{ $booking->vehicle->type }}" class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md bg-gray-100 cursor-not-allowed" readonly>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Transmisi</label>
                                <input type="text" value="{{ $booking->vehicle->transmission }}" class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md bg-gray-100 cursor-not-allowed" readonly>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Tahun</label>
                                <input type="text" value="{{ $booking->vehicle->year }}" class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md bg-gray-100 cursor-not-allowed" readonly>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Kapasitas</label>
                                <input type="text" value="{{ $booking->vehicle->capacity }} seats" class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md bg-gray-100 cursor-not-allowed" readonly>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Harga Sewa per Hari</label>
                                <input type="text" value="Rp {{ number_format($booking->vehicle->rental_price, 0, ',', '.') }}" class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md bg-gray-100 cursor-not-allowed" readonly>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Tanggal Mulai</label>
                                <input type="date" value="{{ $booking->start_date }}" class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md bg-gray-100 cursor-not-allowed" readonly>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Tanggal Akhir</label>
                                <input type="date" value="{{ $booking->end_date }}" class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md bg-gray-100 cursor-not-allowed" readonly>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Status</label>
                                <input type="text" value="{{ $booking->status }}" class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md bg-gray-100 cursor-not-allowed" readonly>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Total Harga Sewa</label>
                                <input type="text" value="Rp {{ number_format($booking->total_price, 0, ',', '.') }}" class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md bg-gray-100 cursor-not-allowed" readonly>
                            </div>
                            @if($booking->ktp_image)
                            <div class="col-span-1 md:col-span-2">
                                <label class="block text-sm font-medium text-gray-700">Foto KTP</label>
                                <img src="{{ asset('uploads/' . $booking->ktp_image) }}" alt="Foto KTP" class="mt-1 max-h-48">
                            </div>
                            @endif
                            @if($booking->payment_proof)
                            <div class="col-span-1 md:col-span-2">
                                <label class="block text-sm font-medium text-gray-700">Bukti Pembayaran</label>
                                <img src="{{ asset('uploads/' . $booking->payment_proof) }}" alt="Bukti Pembayaran" class="mt-1 max-h-48">
                            </div>
                            @endif
                        </div>
                        <div class="mt-6 flex justify-between">
                            <a href="{{ route('customer.bookings') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">Kembali</a>
                            @if($booking->status === 'confirmed')
                                <a href="{{ route('bookings.invoice', $booking->id) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Lihat Invoice</a>
                            @endif
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
