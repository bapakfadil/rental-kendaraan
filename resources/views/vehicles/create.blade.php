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
                    <form id="vehicleForm" action="{{ route('vehicles.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                        @csrf
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label for="type" class="block text-gray-700 text-sm font-bold mb-2">Jenis Kendaraan</label>
                                <select name="type" id="type" class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                                    <option value="" disabled selected>Pilih Jenis Kendaraan</option>
                                    <option value="Sedan">Sedan</option>
                                    <option value="MPV">MPV</option>
                                    <option value="SUV">SUV</option>
                                    <option value="Crossover">Crossover</option>
                                    <option value="Hatchback">Hatchback</option>
                                    <option value="Sport">Sport</option>
                                    <option value="Double-Cabin">Double-Cabin</option>
                                    <option value="Truck">Truck</option>
                                    <option value="Electric">Electric</option>
                                    <option value="Hybrid">Hybrid</option>
                                    <option value="LCGC">LCGC</option>
                                    <option value="Minibus">Minibus</option>
                                    <option value="Bus">Bus</option>
                                    <option value="Lainnya">Lainnya</option>
                                </select>
                            </div>
                            <div>
                                <label for="brand" class="block text-gray-700 text-sm font-bold mb-2">Merek</label>
                                <select name="brand" id="brand" class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                                    <option value="" disabled selected>Pilih Merek</option>
                                    <option value="Toyota">Toyota</option>
                                    <option value="Honda">Honda</option>
                                    <option value="Suzuki">Suzuki</option>
                                    <option value="Mitsubishi">Mitsubishi</option>
                                    <option value="Isuzu">Isuzu</option>
                                    <option value="Nissan">Nissan</option>
                                    <option value="Hyundai">Hyundai</option>
                                    <option value="BMW">BMW</option>
                                    <option value="Mercedes-Benz">Mercedes-Benz</option>
                                    <option value="Lainnya">Lainnya</option>
                                </select>
                            </div>
                            <div>
                                <label for="model" class="block text-gray-700 text-sm font-bold mb-2">Model</label>
                                <input type="text" name="model" id="model" class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                            </div>
                            <div>
                                <label for="transmission" class="block text-gray-700 text-sm font-bold mb-2">Transmisi</label>
                                <select name="transmission" id="transmission" class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                                    <option value="" disabled selected>Pilih Transmisi</option>
                                    <option value="Manual">Manual</option>
                                    <option value="Matic">Matic</option>
                                    <option value="Electric">Electric</option>
                                </select>
                            </div>
                            <div>
                                <label for="plate_number" class="block text-gray-700 text-sm font-bold mb-2">Nomor Plat</label>
                                <input type="text" name="plate_number" id="plate_number" class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                                <p id="plateError" class="text-red-500 text-xs italic mt-2 hidden">Nomor Plat sudah ada di database.</p>
                            </div>
                            <div>
                                <label for="year" class="block text-gray-700 text-sm font-bold mb-2">Tahun</label>
                                <input type="number" name="year" id="year" class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                            </div>
                            <div>
                                <label for="capacity" class="block text-gray-700 text-sm font-bold mb-2">Kapasitas</label>
                                <input type="number" name="capacity" id="capacity" class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                            </div>
                            <div>
                                <label for="rental_price" class="block text-gray-700 text-sm font-bold mb-2">Harga Sewa</label>
                                <input type="number" name="rental_price" id="rental_price" class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                            </div>
                            <div>
                                <label for="image" class="block text-gray-700 text-sm font-bold mb-2">Foto Kendaraan</label>
                                <input type="file" name="image" id="image" class="block w-full text-gray-700 py-2 px-3 border rounded focus:outline-none focus:shadow-outline">
                            </div>
                        </div>
                        <div class="flex justify-end">
                            <a href="{{ url('/dashboard') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Kembali</a>
                            <button type="submit" class="ml-2 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#plate_number').on('change', function() {
            var plateNumber = $(this).val();
            $.ajax({
                url: '{{ route("checkPlateNumber") }}',
                type: 'GET',
                data: { plate_number: plateNumber },
                success: function(response) {
                    if(response.exists) {
                        $('#plateError').removeClass('hidden');
                    } else {
                        $('#plateError').addClass('hidden');
                    }
                }
            });
        });

        $('#vehicleForm').on('submit', function(event) {
            if(!$('#plateError').hasClass('hidden')) {
                event.preventDefault();
                alert('Nomor Plat sudah ada di database.');
            }
        });
    });
</script>
