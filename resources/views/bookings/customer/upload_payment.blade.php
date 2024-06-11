<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Upload Bukti Pembayaran') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('customer.bookings.processPayment', $booking->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="payment_proof">Upload Bukti Pembayaran</label>
                            <input type="file" name="payment_proof" id="payment_proof" class="form-control" required>
                        </div>
                        <button type="submit" class="btn btn-primary mt-3">Upload</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
