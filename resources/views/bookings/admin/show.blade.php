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
                    <div class="container">
                        <h1 class="my-4">Detail Booking</h1>
                        <div class="card">
                            <div class="card-header">
                                <h2>Booking #{{ $booking->id }}</h2>
                            </div>
                            <div class="card-body">
                                <p><strong>Nama Pelanggan:</strong> {{ $booking->user->name }}</p>
                                <p><strong>Kendaraan:</strong> {{ $booking->vehicle->model }}</p>
                                <p><strong>Tanggal Mulai:</strong> {{ $booking->start_date }}</p>
                                <p><strong>Tanggal Akhir:</strong> {{ $booking->end_date }}</p>
                                <p><strong>Status:</strong> {{ $booking->status }}</p>
                            </div>
                            <div class="card-footer">
                                <a href="{{ route('bookings.index') }}" class="btn btn-primary">Kembali ke Daftar</a>
                                <a href="{{ route('bookings.edit', $booking->id) }}" class="btn btn-warning">Edit</a>
                                <form action="{{ route('bookings.destroy', $booking->id) }}" method="POST" class="d-inline" id="deleteForm{{ $booking->id }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="btn btn-danger" onclick="confirmDeletion({{ $booking->id }})">Hapus</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    function confirmDeletion(id) {
        if (confirm('Apakah Anda yakin ingin menghapus booking ini?')) {
            $('#deleteForm' + id).submit();
        }
    }
</script>
