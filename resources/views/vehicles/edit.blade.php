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
                    <form action="{{ route('vehicles.update', $vehicle->id) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                        @csrf
                        @method('PUT')
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label for="type" class="block text-gray-700 text-sm font-bold mb-2">Jenis Kendaraan</label>
                                <select name="type" id="type" class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                                    <option value="" disabled>Pilih Jenis Kendaraan</option>
                                    <option value="Sedan" {{ $vehicle->type == 'Sedan' ? 'selected' : '' }}>Sedan</option>
                                    <option value="MPV" {{ $vehicle->type == 'MPV' ? 'selected' : '' }}>MPV</option>
                                    <option value="SUV" {{ $vehicle->type == 'SUV' ? 'selected' : '' }}>SUV</option>
                                    <option value="Crossover" {{ $vehicle->type == 'Crossover' ? 'selected' : '' }}>Crossover</option>
                                    <option value="Hatchback" {{ $vehicle->type == 'Hatchback' ? 'selected' : '' }}>Hatchback</option>
                                    <option value="Sport" {{ $vehicle->type == 'Sport' ? 'selected' : '' }}>Sport</option>
                                    <option value="Double-Cabin" {{ $vehicle->type == 'Double-Cabin' ? 'selected' : '' }}>Double-Cabin</option>
                                    <option value="Truck" {{ $vehicle->type == 'Truck' ? 'selected' : '' }}>Truck</option>
                                    <option value="Electric" {{ $vehicle->type == 'Electric' ? 'selected' : '' }}>Electric</option>
                                    <option value="Hybrid" {{ $vehicle->type == 'Hybrid' ? 'selected' : '' }}>Hybrid</option>
                                    <option value="LCGC" {{ $vehicle->type == 'LCGC' ? 'selected' : '' }}>LCGC</option>
                                    <option value="Minibus" {{ $vehicle->type == 'Minibus' ? 'selected' : '' }}>Minibus</option>
                                    <option value="Bus" {{ $vehicle->type == 'Bus' ? 'selected' : '' }}>Bus</option>
                                    <option value="Lainnya" {{ $vehicle->type == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                                </select>
                            </div>
                            <div>
                                <label for="brand" class="block text-gray-700 text-sm font-bold mb-2">Merek</label>
                                <select name="brand" id="brand" class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                                    <option value="" disabled>Pilih Merek</option>
                                    <option value="Toyota" {{ $vehicle->brand == 'Toyota' ? 'selected' : '' }}>Toyota</option>
                                    <option value="Honda" {{ $vehicle->brand == 'Honda' ? 'selected' : '' }}>Honda</option>
                                    <option value="Suzuki" {{ $vehicle->brand == 'Suzuki' ? 'selected' : '' }}>Suzuki</option>
                                    <option value="Mitsubishi" {{ $vehicle->brand == 'Mitsubishi' ? 'selected' : '' }}>Mitsubishi</option>
                                    <option value="Isuzu" {{ $vehicle->brand == 'Isuzu' ? 'selected' : '' }}>Isuzu</option>
                                    <option value="Nissan" {{ $vehicle->brand == 'Nissan' ? 'selected' : '' }}>Nissan</option>
                                    <option value="Hyundai" {{ $vehicle->brand == 'Hyundai' ? 'selected' : '' }}>Hyundai</option>
                                    <option value="BMW" {{ $vehicle->brand == 'BMW' ? 'selected' : '' }}>BMW</option>
                                    <option value="Mercedes-Benz" {{ $vehicle->brand == 'Mercedes-Benz' ? 'selected' : '' }}>Mercedes-Benz</option>
                                    <option value="Lainnya" {{ $vehicle->brand == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                                </select>
                            </div>
                            <div>
                                <label for="model" class="block text-gray-700 text-sm font-bold mb-2">Model</label>
                                <input type="text" name="model" id="model" class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{ $vehicle->model }}" required>
                            </div>
                            <div>
                                <label for="transmission" class="block text-gray-700 text-sm font-bold mb-2">Transmisi</label>
                                <select name="transmission" id="transmission" class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                                    <option value="" disabled>Pilih Transmisi</option>
                                    <option value="Manual" {{ $vehicle->transmission == 'Manual' ? 'selected' : '' }}>Manual</option>
                                    <option value="Matic" {{ $vehicle->transmission == 'Matic' ? 'selected' : '' }}>Matic</option>
                                    <option value="Electric" {{ $vehicle->transmission == 'Electric' ? 'selected' : '' }}>Electric</option>
                                </select>
                            </div>
                            <div>
                                <label for="plate_number" class="block text-gray-700 text-sm font-bold mb-2">Nomor Plat</label>
                                <input type="text" name="plate_number" id="plate_number" class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{ $vehicle->plate_number }}" required>
                            </div>
                            <div>
                                <label for="year" class="block text-gray-700 text-sm font-bold mb-2">Tahun</label>
                                <input type="number" name="year" id="year" class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{ $vehicle->year }}" required>
                            </div>
                            <div>
                                <label for="capacity" class="block text-gray-700 text-sm font-bold mb-2">Kapasitas</label>
                                <input type="number" name="capacity" id="capacity" class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{ $vehicle->capacity }}" required>
                            </div>
                            <div>
                                <label for="rental_price" class="block text-gray-700 text-sm font-bold mb-2">Harga Sewa</label>
                                <input type="number" name="rental_price" id="rental_price" class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{ $vehicle->rental_price }}" required>
                            </div>
                            <div>
                                <label for="image" class="block text-gray-700 text-sm font-bold mb-2">Foto Kendaraan</label>
                                <input type="file" name="image" id="image" class="block w-full text-gray-700 py-2 px-3 border rounded focus:outline-none focus:shadow-outline">
                                @if($vehicle->image)
                                    <img src="{{ asset('storage/' . $vehicle->image) }}" alt="Foto Kendaraan" class="mt-6 max-h-48 rounded-lg">
                                @endif
                            </div>
                        </div>
                        <div class="flex justify-between mt-4">
                            <a href="{{ url('/dashboard') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Kembali</a>
                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Simpan Perubahan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
