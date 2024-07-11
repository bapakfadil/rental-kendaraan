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

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                <div class="space-y-6">
                    <div class="bg-white p-6 rounded-lg shadow-md">
                        <h4 class="text-xl font-semibold text-gray-800">Layanan Terbaik</h4>
                        <p class="text-gray-600">Kami menyediakan layanan penyewaan kendaraan dengan kualitas terbaik dan harga terjangkau.</p>
                    </div>
                    <div class="bg-white p-6 rounded-lg shadow-md">
                        <h4 class="text-xl font-semibold text-gray-800 text-justify">Sejarah Perusahaan</h4>
                        <p class="text-gray-600">PT. Pujangga Mandiri Trans, awalnya dikenal sebagai Pujangga, didirikan oleh Bapak Mursalim pada tahun 1994 sebagai usaha perseorangan di bidang transportasi umum dengan rute Pakuhaji-Pasar Baru. Setelah menghadapi berbagai tantangan, usaha ini mencapai tonggak penting pada tahun 2013 ketika kepemilikan diwariskan kepada anak pertama Bapak Mursalim, Mulyadi, yang membawa visi modern dan berbagai inovasi. Di bawah kepemimpinannya, perusahaan berkembang menjadi perusahaan travel dengan layanan yang lebih beragam. Pada tahun 2018, Mulyadi meresmikan usaha ini sebagai badan hukum dengan nama PT. Pujangga Mandiri Trans untuk meningkatkan kredibilitas dan memperluas jaringan bisnis. Hingga tahun 2024, perusahaan ini telah berkembang pesat dengan berbagai armada kendaraan seperti Isuzu 19 seat, Hiace, dan bus pariwisata, dan berkomitmen untuk memberikan pelayanan terbaik dan kepuasan pelanggan.</p>
                    </div>
                </div>

                <div class="bg-white p-6 rounded-lg shadow-md">
                    <h4 class="text-xl font-semibold text-gray-800 mb-4">Galeri Foto</h4>
                    <div class="relative w-full h-0" style="padding-bottom: 75%;">
                        <div class="absolute inset-0">
                            <div id="carouselExample" class="carousel slide" data-ride="carousel">
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <img class="d-block w-100" src="{{ asset('assets/static/images/dashboard/slide-1.jpeg') }}" alt="First slide">
                                    </div>
                                    <div class="carousel-item">
                                        <img class="d-block w-100" src="{{ asset('assets/static/images/dashboard/slide-2.jpeg') }}" alt="Second slide">
                                    </div>
                                    <div class="carousel-item">
                                        <img class="d-block w-100" src="{{ asset('assets/static/images/dashboard/slide-3.jpeg') }}" alt="Second slide">
                                    </div>
                                    <div class="carousel-item">
                                        <img class="d-block w-100" src="{{ asset('assets/static/images/dashboard/slide-4.jpeg') }}" alt="Second slide">
                                    </div>
                                </div>
                                <a class="carousel-control-prev" href="#carouselExample" role="button" data-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#carouselExample" role="button" data-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<!-- Add Bootstrap CSS and JS -->
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
