<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tambah Kendaraan Baru') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('vehicles.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="type">Jenis Kendaraan</label>
                            <input type="text" name="type" id="type" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="brand">Merek</label>
                            <input type="text" name="brand" id="brand" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="model">Model</label>
                            <input type="text" name="model" id="model" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="plate_number">Nomor Plat</label>
                            <input type="text" name="plate_number" id="plate_number" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="year">Tahun</label>
                            <input type="number" name="year" id="year" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="capacity">Kapasitas</label>
                            <input type="number" name="capacity" id="capacity" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="rental_price">Harga Sewa</label>
                            <input type="number" name="rental_price" id="rental_price" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="image">Foto Kendaraan</label>
                            <input type="file" name="image" id="image" class="form-control-file">
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
