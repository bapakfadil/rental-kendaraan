<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Manajemen Pelanggan') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1 class="text-2xl font-bold mb-4">Manajemen Pelanggan</h1>
                    <div class="overflow-x-auto">
                        <table class="min-w-full bg-white">
                            <thead class="bg-gray-100">
                                <tr>
                                    <th class="py-2 px-4 border-b border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Nama</th>
                                    <th class="py-2 px-4 border-b border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Email</th>
                                    <th class="py-2 px-4 border-b border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($customers as $customer)
                                <tr>
                                    <td class="py-2 px-4 border-b border-gray-200">{{ $customer->name }}</td>
                                    <td class="px-2 py-4 border-b border-gray-200">{{ $customer->email }}</td>
                                    <td class="px-2 py-4 border-b border-gray-200">
                                        <a href="{{ route('customers.show', $customer->id) }}" class="text-white bg-blue-500 hover:bg-blue-700 font-bold py-1 px-2 rounded">Detail</a>
                                        <a href="{{ route('customers.edit', $customer->id) }}" class="text-white bg-yellow-500 hover:bg-yellow-700 font-bold py-1 px-2 rounded">Edit</a>
                                        <form action="{{ route('customers.destroy', $customer->id) }}" method="POST" class="inline-block" id="deleteForm{{ $customer->id }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" class="text-white bg-red-500 hover:bg-red-700 font-bold py-1 px-2 rounded" onclick="confirmDeletion({{ $customer->id }})">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    function confirmDeletion(id) {
        if (confirm('Apakah Anda yakin ingin menghapus pelanggan ini? Semua booking yang terkait juga akan dihapus.')) {
            $('#deleteForm' + id).submit();
        }
    }
</script>
