<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Kendaraan') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('vehicles.update', $vehicle->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="type">Jenis Kendaraan</label>
                            <input type="text" name="type" id="type" class="form-control" value="{{ $vehicle->type }}" required>
                        </div>
                        <div class="form-group">
                            <label for="brand">Merek</label>
                            <input type="text" name="brand" id="brand" class="form-control" value="{{ $vehicle->brand }}" required>
                        </div>
                        <div class="form-group">
                            <label for="model">Model</label>
                            <input type="text" name="model" id="model" class="form-control" value="{{ $vehicle->model }}" required>
                        </div>
                        <div class="form-group">
                            <label for="plate_number">Nomor Plat</label>
                            <input type="text" name="plate_number" id="plate_number" class="form-control" value="{{ $vehicle->plate_number }}" required>
                        </div>
                        <div class="form-group">
                            <label for="year">Tahun</label>
                            <input type="number" name="year" id="year" class="form-control" value="{{ $vehicle->year }}" required>
                        </div>
                        <div class="form-group">
                            <label for="capacity">Kapasitas</label>
                            <input type="number" name="capacity" id="capacity" class="form-control" value="{{ $vehicle->capacity }}" required>
                        </div>
                        <div class="form-group">
                            <label for="rental_price">Harga Sewa</label>
                            <input type="number" name="rental_price" id="rental_price" class="form-control" value="{{ $vehicle->rental_price }}" required>
                        </div>
                        <div class="form-group">
                            <label for="image">Foto Kendaraan</label>
                            <input type="file" name="image" id="image" class="form-control-file">
                            @if($vehicle->image)
                                <img src="{{ asset('storage/' . $vehicle->image) }}" alt="Foto Kendaraan" class="img-thumbnail mt-2" style="max-height: 200px;">
                            @endif
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
