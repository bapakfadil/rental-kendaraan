<!-- resources/views/dashboard/user.blade.php -->
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
            {{ __('Dashboard User') }}
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
                    {{ __("Anda berhasil login. Berikut adalah informasi mengenai layanan kami.") }}
                </p>
            </div>

            <!-- Promotion Section -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <h4 class="text-xl font-semibold text-gray-800">Promo Spesial</h4>
                    <p class="text-gray-600">Dapatkan diskon 20% untuk semua jenis kendaraan pada bulan ini!</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <h4 class="text-xl font-semibold text-gray-800">Layanan Terbaik</h4>
                    <p class="text-gray-600">Kami menyediakan layanan penyewaan kendaraan dengan kualitas terbaik dan harga terjangkau.</p>
                </div>
                <!-- Tambahkan lebih banyak promosi atau fitur sesuai kebutuhan -->
            </div>
        </div>
    </div>
</x-app-layout>
