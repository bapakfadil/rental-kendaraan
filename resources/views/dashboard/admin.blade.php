<!-- dashboard.blade.php -->
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- User Greeting -->
            <div class="bg-blue-100 p-6 rounded-lg shadow-md mb-6">
                <h3 class="text-lg font-semibold text-gray-800">
                    {{ __('Selamat Datang,') }} {{ Auth::user()->name }}!
                </h3>
                <p class="text-gray-600">
                    {{ __("Anda berhasil login. Berikut adalah ringkasan informasi terbaru.") }}
                </p>
            </div>

            <!-- Stats Section -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <h4 class="text-xl font-semibold text-gray-800">Total Kendaraan</h4>
                    <p class="text-gray-600">{{ $totalVehicles }} Unit</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <h4 class="text-xl font-semibold text-gray-800">Pemesanan Bulan Ini</h4>
                    <p class="text-gray-600">{{ $bookingsThisMonth }} Pemesanan</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <h4 class="text-xl font-semibold text-gray-800">Total Pengguna</h4>
                    <p class="text-gray-600">{{ $totalUsers }} Pengguna</p>
                </div>
            </div>

            <!-- Recent Bookings Table -->
            <div class="bg-white p-6 rounded-lg shadow-md">
                <h4 class="text-xl font-semibold text-gray-800 mb-4">Pemesanan Terbaru</h4>
                <table class="min-w-full bg-white">
                    <thead>
                        <tr>
                            <th class="py-2">Nama</th>
                            <th class="py-2">Kendaraan</th>
                            <th class="py-2">Tanggal Pemesanan</th>
                            <th class="py-2">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($recentBookings as $booking)
                            <tr>
                                <td class="py-2">{{ $booking->user->name }}</td>
                                <td class="py-2">{{ $booking->vehicle->model }}</td>
                                <td class="py-2">{{ $booking->created_at->format('d M Y') }}</td>
                                <td class="py-2">
                                    <span class="{{ $booking->status === 'confirmed' ? 'text-green-600' : 'text-yellow-600' }}">
                                        {{ ucfirst($booking->status) }}
                                    </span>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
