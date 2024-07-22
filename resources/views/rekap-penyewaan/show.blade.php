<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Rekap Penyewaan') }} ({{ $startDate->format('d-m-Y') }} - {{ $endDate->format('d-m-Y') }})
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-lg font-semibold mb-4">Total Pendapatan: Rp {{ number_format($totalIncome, 0, ',', '.') }}</h3>
                    <div class="overflow-x-auto">
                        <table class="min-w-full bg-white">
                            <thead>
                                <tr>
                                    <th class="px-6 py-3 border-b-2 border-gray-300 text-left leading-4 text-blue-500 tracking-wider">Nama Kendaraan</th>
                                    <th class="px-6 py-3 border-b-2 border-gray-300 text-left leading-4 text-blue-500 tracking-wider">Nomor Plat</th>
                                    <th class="px-6 py-3 border-b-2 border-gray-300 text-left leading-4 text-blue-500 tracking-wider">Tanggal Mulai</th>
                                    <th class="px-6 py-3 border-b-2 border-gray-300 text-left leading-4 text-blue-500 tracking-wider">Tanggal Akhir</th>
                                    <th class="px-6 py-3 border-b-2 border-gray-300 text-left leading-4 text-blue-500 tracking-wider">Total Harga</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white">
                                @foreach ($bookings as $booking)
                                    <tr>
                                        <td class="px-6 py-4 border-b border-gray-300">
                                            @if($booking->vehicle)
                                                {{ $booking->vehicle->model }}
                                            @else
                                                <span class="text-red-500">Null</span>
                                            @endif
                                        </td>
                                        <td class="px-6 py-4 border-b border-gray-300">
                                            @if($booking->vehicle)
                                                {{ $booking->vehicle->plate_number }}
                                            @else
                                                <span class="text-red-500">Null</span>
                                            @endif
                                        </td>
                                        {{-- <td class="px-6 py-4 border-b border-gray-300">{{ $booking->vehicle->brand }} {{ $booking->vehicle->model }}</td>
                                        <td class="px-6 py-4 border-b border-gray-300">{{ $booking->vehicle->plate_number }}</td> --}}
                                        <td class="px-6 py-4 border-b border-gray-300">{{ $booking->start_date->format('d-m-Y') }}</td>
                                        <td class="px-6 py-4 border-b border-gray-300">{{ $booking->end_date->format('d-m-Y') }}</td>
                                        <td class="px-6 py-4 border-b border-gray-300">Rp {{ number_format($booking->total_price, 0, ',', '.') }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-6">
                        <a href="{{ route('rekap.penyewaan') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
