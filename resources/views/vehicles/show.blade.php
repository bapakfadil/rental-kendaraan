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
                    <div class="container">
                        <h1 class="my-4">Detail Kendaraan</h1>
                        <div class="card">
                            <div class="card-header">
                                <h2>{{ $vehicle->brand }} - {{ $vehicle->model }}</h2>
                            </div>
                            <div class="card-body">
                                <p><strong>Jenis:</strong> {{ $vehicle->type }}</p>
                                <p><strong>Merek:</strong> {{ $vehicle->brand }}</p>
                                <p><strong>Model:</strong> {{ $vehicle->model }}</p>
                                <p><strong>Nomor Plat:</strong> {{ $vehicle->plate_number }}</p>
                                <p><strong>Tahun:</strong> {{ $vehicle->year }}</p>
                                <p><strong>Kapasitas:</strong> {{ $vehicle->capacity }}</p>
                                <p><strong>Harga Sewa:</strong> {{ $vehicle->rental_price }}</p>
                                @if($vehicle->image)
                                    <img src="{{ asset('storage/' . $vehicle->image) }}" alt="Foto Kendaraan" class="img-thumbnail mt-2" style="max-height: 400px;">
                                @endif
                            </div>
                            <div class="card-footer">
                                <a href="{{ route('vehicles.index') }}" class="btn btn-primary">Kembali ke Daftar</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
