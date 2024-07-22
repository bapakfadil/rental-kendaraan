<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Buat Booking Baru') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @if (session('error'))
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                            <span class="block sm:inline">{{ session('error') }}</span>
                        </div>
                    @endif
                    <form action="{{ route('bookings.store') }}" method="POST" enctype="multipart/form-data" id="bookingForm">
                        @csrf
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="full_name" class="block text-sm font-medium text-gray-700">Nama Lengkap</label>
                                <input type="text" name="full_name" id="full_name" class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required>
                            </div>
                            <div>
                                <label for="nik" class="block text-sm font-medium text-gray-700">Nomor Induk Kependudukan</label>
                                <input type="text" name="nik" id="nik" class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required>
                            </div>
                            <div class="col-span-1 md:col-span-2">
                                <label for="address" class="block text-sm font-medium text-gray-700">Alamat</label>
                                <textarea name="address" id="address" rows="3" class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required></textarea>
                            </div>
                            <div>
                                <label for="email_invoice" class="block text-sm font-medium text-gray-700">Email Invoice</label>
                                <input type="email" name="email_invoice" id="email_invoice" class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required>
                            </div>
                            <div>
                                <label for="phone_number" class="block text-sm font-medium text-gray-700">Nomor HP</label>
                                <input type="text" name="phone_number" id="phone_number" class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required>
                            </div>
                            <div class="col-span-1 md:col-span-2">
                                <label for="ktp_image" class="block text-sm font-medium text-gray-700">Foto KTP</label>
                                <input type="file" name="ktp_image" id="ktp_image" class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required>
                            </div>
                            <div>
                                <label for="vehicle_id" class="block text-sm font-medium text-gray-700">Pilih Kendaraan</label>
                                <select name="vehicle_id" id="vehicle_id" class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required>
                                    <option value="">Pilih Kendaraan</option>
                                    @foreach($vehicles as $vehicle)
                                        <option value="{{ $vehicle->id }}" data-price="{{ $vehicle->rental_price }}">
                                            {{ $vehicle->brand }} {{ $vehicle->model }} - {{ $vehicle->plate_number }} - {{ $vehicle->type }} - {{ $vehicle->transmission }} - {{ $vehicle->year }} - {{ $vehicle->capacity }} seats - Rp {{ number_format($vehicle->rental_price, 0, ',', '.') }}/day
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div>
                                <label for="start_date" class="block text-sm font-medium text-gray-700">Tanggal Mulai Sewa</label>
                                <input type="date" name="start_date" id="start_date" class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required>
                            </div>
                            <div>
                                <label for="rental_price" class="block text-sm font-medium text-gray-700">Biaya Sewa Total</label>
                                <input type="text" name="rental_price" id="rental_price" class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" readonly>
                            </div>
                            <div >
                                <label for="end_date" class="block text-sm font-medium text-gray-700">Tanggal Akhir Sewa</label>
                                <input type="date" name="end_date" id="end_date" class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required>
                            </div>
                            <div>
                                <label for="account_info" class="block text-sm font-medium text-gray-700">No Rekening</label>
                                <p class="mt-1 text-gray-700">Bank BCA<br>a/n PT. Pujangga Mandiri Trans<br>No. Rek: 12345678910</p>
                            </div>

                        </div>
                        <div class="mt-6">
                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Buat Booking</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const vehicleSelect = document.getElementById('vehicle_id');
            const startDateInput = document.getElementById('start_date');
            const endDateInput = document.getElementById('end_date');
            const rentalPriceInput = document.getElementById('rental_price');

            function calculateRentalPrice() {
                const vehicleOption = vehicleSelect.options[vehicleSelect.selectedIndex];
                const rentalPricePerDay = vehicleOption ? parseFloat(vehicleOption.getAttribute('data-price')) : 0;
                const startDate = new Date(startDateInput.value);
                const endDate = new Date(endDateInput.value);

                if (vehicleSelect.value && startDateInput.value && endDateInput.value) {
                    const timeDifference = endDate.getTime() - startDate.getTime();
                    const daysDifference = Math.ceil(timeDifference / (1000 * 3600 * 24)) + 1; // +1 to include the start date
                    const totalRentalPrice = rentalPricePerDay * daysDifference;

                    rentalPriceInput.value = `Rp ${totalRentalPrice.toLocaleString('id-ID')}`;
                } else {
                    rentalPriceInput.value = '';
                }
            }

            vehicleSelect.addEventListener('change', calculateRentalPrice);
            startDateInput.addEventListener('change', calculateRentalPrice);
            endDateInput.addEventListener('change', calculateRentalPrice);
        });
    </script>
</x-app-layout>
