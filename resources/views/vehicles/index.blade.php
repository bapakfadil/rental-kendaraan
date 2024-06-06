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
                    <a href="{{ route('vehicles.create') }}" class="btn btn-primary mb-3">Tambah Kendaraan</a>
                    <table class="table table-bordered">
                        <thead class="thead-light">
                            <tr>
                                <th>ID</th>
                                <th>Jenis</th>
                                <th>Merek</th>
                                <th>Model</th>
                                <th>Nomor Plat</th>
                                <th>Tahun</th>
                                <th>Kapasitas</th>
                                <th>Harga Sewa</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($vehicles as $vehicle)
                            <tr>
                                <td>{{ $vehicle->id }}</td>
                                <td>{{ $vehicle->type }}</td>
                                <td>{{ $vehicle->brand }}</td>
                                <td>{{ $vehicle->model }}</td>
                                <td>{{ $vehicle->plate_number }}</td>
                                <td>{{ $vehicle->year }}</td>
                                <td>{{ $vehicle->capacity }}</td>
                                <td>{{ $vehicle->rental_price }}</td>
                                <td>
                                    <a href="{{ route('vehicles.show', $vehicle->id) }}" class="btn btn-info btn-sm">Detail</a>
                                    <a href="{{ route('vehicles.edit', $vehicle->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{ route('vehicles.destroy', $vehicle->id) }}" method="POST" class="d-inline" id="deleteForm{{ $vehicle->id }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" class="btn btn-danger btn-sm" onclick="confirmDeletion({{ $vehicle->id }})">Hapus</button>
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
</x-app-layout>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    function confirmDeletion(id) {
        if (confirm('Apakah Anda yakin ingin menghapus kendaraan ini?')) {
            $('#deleteForm' + id).submit();
        }
    }
</script>
