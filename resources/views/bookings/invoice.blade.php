<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Invoice Booking') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div id="invoice" class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <div class="text-gray-900">
                    <h1 class="text-2xl font-bold mb-4">Invoice Booking</h1>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Nama Lengkap</label>
                            <p class="mt-1 text-sm text-gray-900">{{ $booking->full_name }}</p>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700">NIK</label>
                            <p class="mt-1 text-sm text-gray-900">{{ $booking->nik }}</p>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Kendaraan</label>
                            <p class="mt-1 text-sm text-gray-900">{{ $booking->vehicle->model }}</p>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Harga Sewa Kendaraan</label>
                            <p class="mt-1 text-sm text-gray-900">Rp {{ number_format($booking->vehicle->rental_price, 2) }}</p>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Tanggal Mulai Sewa</label>
                            <p class="mt-1 text-sm text-gray-900">{{ $booking->start_date }}</p>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Tanggal Akhir Sewa</label>
                            <p class="mt-1 text-sm text-gray-900">{{ $booking->end_date }}</p>
                        </div>
                        @if($booking->payment_proof)
                        <div class="col-span-1 md:col-span-2">
                            <label class="block text-sm font-medium text-gray-700">Bukti Pembayaran</label>
                            <img src="{{ asset('uploads/' . $booking->payment_proof) }}" alt="Bukti Pembayaran" class="mt-1 max-h-48">
                        </div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="mt-6 flex justify-between">
                <a href="{{ route('customer.bookings') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">Kembali</a>
                @if($booking->status === 'confirmed')
                <button onclick="downloadInvoice()" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Download PDF</button>
                @endif
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.min.js"></script>
    <script>
        function downloadInvoice() {
            const element = document.getElementById('invoice');
            const opt = {
                margin:       0.5,
                filename:     'invoice_booking.pdf',
                image:        { type: 'jpeg', quality: 0.98 },
                html2canvas:  { scale: 2 },
                jsPDF:        { unit: 'in', format: 'letter', orientation: 'portrait' }
            };
            html2pdf().from(element).set(opt).save();
        }
    </script>
</x-app-layout>
