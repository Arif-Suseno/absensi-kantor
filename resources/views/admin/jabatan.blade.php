<x-layout>
    <x-slot:title>
        {{ $title }}
    </x-slot:title>

    <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <h1 class="text-2xl sm:text-4xl font-bold text-black mb-6 text-center sm:text-left">
            {{ $title }}
        </h1>

        <!-- Pesan sukses jika ada -->
        @if (session('success'))
            <div class="bg-green-100 text-green-700 p-4 rounded-md mb-4">
                {{ session('success') }}
            </div>
        @endif

        <!-- Tombol Tambah Jabatan -->
        <div class="mb-6 flex justify-center sm:justify-start">
            <a href="{{ route('jabatan.create') }}"
                class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-md shadow">
                Tambah Jabatan
            </a>
        </div>
        {{-- Form search --}}
        <form action="" method="GET" class="flex items-center space-x-3 mb-4 ">
            <input type="search" name="search" id="search" value="{{ $search }}" autocomplete="off"
                class="w-8/12 border border-gray-300 shadow-md shadow-gray-500 rounded-full px-2 py-1 focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-red-500 transition duration-300 sm:w-9/12 md:w-10/12 lg:w-11/12"
                placeholder="Cari sesuatu...">
            <button type="submit"
                class="bg-red-500 text-white px-2 py-2 rounded-full hover:bg-red-600 focus:ring-2 focus:ring-red-300 focus:ring-offset-1 transition duration-300">
                🔎 Cari
            </button>
        </form>
        <!-- Tabel Responsif -->
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border-gray-400 rounded-lg shadow-md">
                <thead>
                    <tr class="bg-gray-400">
                        <th class="text-left px-4 sm:px-6 py-3 text-sm font-medium text-gray-600 border-b">
                            No
                        </th>
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

                    @foreach ($jabatans as $index => $jabatan)
                        <tr class="hover:bg-gray-50">
                            <td class="px-4 sm:px-6 py-4 text-gray-800 border-b">
                                {{ ++$index }}
                            </td>
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
                    @if ($jabatans->isEmpty())
                        <tr>
                            <td colspan="6" class="px-6 py-4 text-center text-sm text-gray-500">
                                Tidak Ada Data
                            </td>
                        </tr>
                    @endif
                </tbody>
            </table>
            {{-- link paginate --}}
            <div class="my-4">
                {{ $jabatans->appends(['search' => $search])->links() }}
            </div>
        </div>
    </div>
</x-layout>
