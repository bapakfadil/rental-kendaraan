<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Daftar Kendaraan') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <a href="{{ route('vehicles.create') }}" class="mb-3 inline-block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Tambah Kendaraan</a>
                    <div class="overflow-x-auto">
                        <table class="min-w-full bg-white">
                            <thead>
                                <tr>
                                    <th class="py-2 px-4 border-b border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">No.</th>
                                    <th class="py-2 px-4 border-b border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Jenis</th>
                                    <th class="py-2 px-4 border-b border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Merek</th>
                                    <th class="py-2 px-4 border-b border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Model</th>
                                    <th class="py-2 px-4 border-b border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Nomor Plat</th>
                                    <th class="py-2 px-4 border-b border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Tahun</th>
                                    <th class="py-2 px-4 border-b border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Kapasitas</th>
                                    <th class="py-2 px-4 border-b border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Harga Sewa</th>
                                    <th class="py-2 px-4 border-b border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($vehicles as $vehicle)
                                <tr>
                                    <td class="py-2 px-4 border-b border-gray-200">{{ $vehicle->id }}</td>
                                    <td class="py-2 px-4 border-b border-gray-200">{{ $vehicle->type }}</td>
                                    <td class="py-2 px-4 border-b border-gray-200">{{ $vehicle->brand }}</td>
                                    <td class="py-2 px-4 border-b border-gray-200">{{ $vehicle->model }}</td>
                                    <td class="py-2 px-4 border-b border-gray-200">{{ $vehicle->plate_number }}</td>
                                    <td class="py-2 px-4 border-b border-gray-200">{{ $vehicle->year }}</td>
                                    <td class="py-2 px-4 border-b border-gray-200">{{ $vehicle->capacity }}</td>
                                    <td class="py-2 px-4 border-b border-gray-200">{{ $vehicle->rental_price }}</td>
                                    <td class="py-2 px-4 border-b border-gray-200">
                                        <a href="{{ route('vehicles.show', $vehicle->id) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 rounded">Detail</a>
                                        <a href="{{ route('vehicles.edit', $vehicle->id) }}" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-1 px-2 rounded">Edit</a>
                                        <form action="{{ route('vehicles.destroy', $vehicle->id) }}" method="POST" class="inline" id="deleteForm{{ $vehicle->id }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded" onclick="confirmDeletion({{ $vehicle->id }})">Hapus</button>
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

<script>
    function confirmDeletion(id) {
        if (confirm('Apakah Anda yakin ingin menghapus kendaraan ini?')) {
            document.getElementById('deleteForm' + id).submit();
        }
    }
</script>
