<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("Anda berhasil login.") }}
                </div>
            </div>
        </div>
    </div>

    {{-- <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight mb-4">Notifikasi</h2>
                    <ul>
                        @foreach(auth()->user()->notifications as $notification)
                        <li>
                            Pemesanan ID: {{ $notification->data['booking_id'] }} statusnya berubah menjadi {{ $notification->data['status'] }}
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div> --}}
</x-app-layout>
