<!-- resources/views/vehicles/show.blade.php -->
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detail Kendaraan') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1 class="text-2xl font-bold mb-4">Detail Kendaraan</h1>
                    <div class="bg-white border border-gray-200 shadow-sm rounded-lg p-6">
                        <h2 class="text-xl font-semibold mb-4">{{ $vehicle->brand }} - {{ $vehicle->model }}</h2>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                            <div>
                                <p><strong>Jenis:</strong> {{ $vehicle->type }}</p>
                                <p><strong>Merek:</strong> {{ $vehicle->brand }}</p>
                                <p><strong>Model:</strong> {{ $vehicle->model }}</p>
                                <p><strong>Transmisi:</strong> {{ $vehicle->transmission }}</p>
                                <p><strong>Nomor Plat:</strong> {{ $vehicle->plate_number }}</p>
                                <p><strong>Tahun:</strong> {{ $vehicle->year }}</p>
                                <p><strong>Kapasitas:</strong> {{ $vehicle->capacity }} penumpang</p>
                                <p><strong>Harga Sewa:</strong> Rp {{ number_format($vehicle->rental_price, 0, ',', '.') }}</p>
                            </div>
                            @if($vehicle->image)
                                <div class="flex justify-center items-center">
                                    <img src="{{ asset('uploads/' . $vehicle->image) }}" alt="Foto Kendaraan" class="rounded-lg max-h-96">
                                </div>
                            @endif
                        </div>
                        <div class="flex justify-end mt-4">
                            <a href="{{ route('vehicles.index') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Kembali ke Daftar</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
