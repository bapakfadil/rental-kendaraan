<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Daftar Booking') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @if(auth()->user()->role === 'admin')
                        <h3 class="text-lg font-semibold mb-4">Booking oleh Admin</h3>
                        <a href="{{ route('bookings.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mb-3">Tambah Booking</a>
                    @else
                        <h3 class="text-lg font-semibold mb-4">Riwayat Booking Customer</h3>
                    @endif

                    <div class="overflow-x-auto">
                        <table class="min-w-full bg-white border border-gray-300">
                            <thead class="bg-gray-100">
                                <tr>
                                    <th class="px-1 py-2 border-b border-gray-300 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                                    <th class="px-1 py-2 border-b border-gray-300 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Kendaraan</th>
                                    <th class="px-1 py-2 border-b border-gray-300 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal Mulai</th>
                                    <th class="px-1 py-2 border-b border-gray-300 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal Akhir</th>
                                    <th class="px-1 py-2 border-b border-gray-300 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                    <th class="px-1 py-2 border-b border-gray-300 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($bookings as $booking)
                                <tr>
                                    <td class="px-6 py-4 border-b border-gray-300">{{ $booking->id }}</td>
                                    <td class="px-6 py-4 border-b border-gray-300">{{ $booking->vehicle->model }}</td>
                                    <td class="px-6 py-4 border-b border-gray-300">{{ $booking->start_date }}</td>
                                    <td class="px-6 py-4 border-b border-gray-300">{{ $booking->end_date }}</td>
                                    <td class="px-6 py-4 border-b border-gray-300">{{ $booking->status }}</td>
                                    <td class="px-6 py-4 border-b border-gray-300 space-x-2">
                                        <a href="{{ route('bookings.show', $booking->id) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-3 rounded">Detail</a>
                                        @if(auth()->user()->role === 'admin')
                                            <a href="{{ route('bookings.edit', $booking->id) }}" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-1 px-3 rounded">Edit</a>
                                        @endif
                                        <form action="{{ route('bookings.destroy', $booking->id) }}" method="POST" class="inline-block" id="deleteForm{{ $booking->id }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-3 rounded" onclick="confirmDeletion({{ $booking->id }})">Hapus</button>
                                        </form>
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

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    function confirmDeletion(id) {
        if (confirm('Apakah Anda yakin ingin menghapus booking ini?')) {
            $('#deleteForm' + id).submit();
        }
    }
</script>
