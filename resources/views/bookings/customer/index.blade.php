<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Riwayat Booking') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @if (session('success'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                            <span class="block sm:inline">{{ session('success') }}</span>
                        </div>
                    @endif
                    @if (session('error'))
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                            <span class="block sm:inline">{{ session('error') }}</span>
                        </div>
                    @endif
                    <div class="overflow-x-auto">
                        <table class="min-w-full bg-white border border-gray-300">
                            <thead class="bg-gray-100">
                                <tr>
                                    <th class="px-1 py-2 border-b border-gray-300 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">No.</th>
                                    <th class="px-1 py-2 border-b border-gray-300 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Kendaraan</th>
                                    <th class="px-1 py-2 border-b border-gray-300 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal Mulai</th>
                                    <th class="px-1 py-2 border-b border-gray-300 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal Akhir</th>
                                    <th class="px-1 py-2 border-b border-gray-300 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                    <th class="px-1 py-2 border-b border-gray-300 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($bookings as $booking)
                                <tr>
                                    <td class="px-6 py-2 border-b border-gray-300">{{ $loop->iteration }}</td>
                                    <td class="px-6 py-2 border-b border-gray-300">{{ $booking->vehicle ? $booking->vehicle->model : 'Kendaraan tidak ditemukan' }}</td>
                                    <td class="px-6 py-2 border-b border-gray-300 text-center">{{ $booking->start_date }}</td>
                                    <td class="px-6 py-2 border-b border-gray-300 text-center">{{ $booking->end_date }}</td>
                                    <td class="px-6 py-2 border-b border-gray-300 text-center">{{ $booking->status }}</td>
                                    <td class="px-6 py-2 border-b border-gray-300 space-x-2">
                                        <a href="{{ route('bookings.show', $booking->id) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-3 rounded">Detail</a>
                                        @if ($booking->status == 'pending' || $booking->status == 'payment_rejected')
                                            <a href="{{ route('customer.bookings.uploadPayment', $booking->id) }}" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-1 px-3 rounded">Upload Pembayaran</a>
                                        @endif
                                        @if ($booking->status == 'pending' || $booking->status == 'payment_pending' || $booking->status == 'payment_rejected')
                                            <form action="{{ route('customer.bookings.cancel', $booking->id) }}" method="POST" class="inline-block">
                                                @csrf
                                                @method('PUT')
                                                <button type="button" class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-3 rounded" onclick="confirmCancellation({{ $booking->id }})">Batalkan</button>
                                            </form>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<script>
    function confirmCancellation(id) {
        if (confirm('Apakah Anda yakin ingin membatalkan booking ini?')) {
            document.querySelector('form[action*="' + id + '"]').submit();
        }
    }
</script>
