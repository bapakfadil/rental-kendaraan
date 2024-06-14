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
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif
                    <table class="table table-bordered">
                        <thead class="thead-light">
                            <tr>
                                <th>#</th>
                                <th>Kendaraan</th>
                                <th>Tanggal Mulai</th>
                                <th>Tanggal Akhir</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($bookings as $booking)
                            <tr>
                                <td>{{ $booking->id }}</td>
                                <td>{{ $booking->vehicle ? $booking->vehicle->model : 'Kendaraan tidak ditemukan' }}</td>
                                <td>{{ $booking->start_date }}</td>
                                <td>{{ $booking->end_date }}</td>
                                <td>{{ $booking->status }}</td>
                                <td>
                                    <a href="{{ route('bookings.show', $booking->id) }}" class="btn btn-info btn-sm">Detail</a>
                                    @if ($booking->status == 'pending' || $booking->status == 'payment_pending' || $booking->status == 'payment_rejected')
                                        <a href="{{ route('customer.bookings.uploadPayment', $booking->id) }}" class="btn btn-warning btn-sm">Upload Pembayaran</a>
                                        @if ($booking->status != 'payment_rejected')
                                            <form action="{{ route('customer.bookings.cancel', $booking->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('PUT')
                                                <button type="button" class="btn btn-danger btn-sm" onclick="confirmCancellation({{ $booking->id }})">Batalkan</button>
                                            </form>
                                        @endif
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
</x-app-layout>

<script>
    function confirmCancellation(id) {
        if (confirm('Apakah Anda yakin ingin membatalkan booking ini?')) {
            document.querySelector('form[action*="' + id + '"]').submit();
        }
    }
</script>
