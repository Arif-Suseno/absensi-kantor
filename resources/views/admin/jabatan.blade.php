<x-layout>
    <x-slot:title>
        {{ $title }}
    </x-slot:title>

    <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <h1 class="text-2xl sm:text-3xl font-bold text-white mb-6 text-center sm:text-left">
            {{ $title }}
        </h1>

        <!-- Pesan sukses jika ada -->
        @if(session('success'))
            <div class="bg-green-100 text-green-700 p-4 rounded-md mb-4">
                {{ session('success') }}
            </div>
        @endif

        <!-- Tombol Tambah Jabatan -->
        <div class="mb-6 flex justify-center sm:justify-start">
            <a href="{{ url('/admin/create_jabatan') }}" 
                class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-md shadow">
                Tambah Jabatan
            </a>
        </div>

        <!-- Tabel Responsif -->
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border-gray-400 rounded-lg shadow-md">
                <thead>
                    <tr class="bg-gray-400">
                        <th class="text-left px-4 sm:px-6 py-3 text-sm font-medium text-gray-600 border-b">
                            Nama
                        </th>
                        <th class="text-left px-4 sm:px-6 py-3 text-sm font-medium text-gray-600 border-b">
                            Deskripsi
                        </th>
                        <th class="text-center px-4 sm:px-6 py-3 text-sm font-medium text-gray-600 border-b">
                            Aksi
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($jabatans as $jabatan)
                        <tr class="hover:bg-gray-50">
                            <td class="px-4 sm:px-6 py-4 text-gray-800 border-b">
                                {{ $jabatan->nama_jabatan }}
                            </td>
                            <td class="px-4 sm:px-6 py-4 text-gray-800 border-b">
                                {{ $jabatan->deskripsi }}
                            </td>
                            <td class="px-4 sm:px-6 py-4 text-center border-b">
                                <div class="flex flex-col sm:flex-row sm:justify-center gap-2">
                                    <a href="{{ route('jabatan.edit', $jabatan->id) }}" 
                                       class="bg-yellow-400 hover:bg-yellow-500 text-white px-4 py-2 rounded-md shadow">
                                        Edit
                                    </a>
                                    <form action="{{ route('jabatan.destroy', $jabatan->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" 
                                                class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-md shadow">
                                            Hapus
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-layout>
