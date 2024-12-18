<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <!-- Tabel -->
    <div class="container mx-auto my-8 p-4 bg-white shadow-md rounded">
        <h1 class="text-3xl font-bold mb-4">{{ $title }}</h1>
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
        <!-- Tabel -->
        <div class="overflow-x-auto">
            <table class="min-w-full text-xs sm:text-sm text-left text-gray-600 border border-gray-200">
                <thead class="bg-gray-100 text-gray-700 font-semibold uppercase">
                    <tr>
                        <th class="py-2 px-4 border text-center ">ID</th>
                        <th class="py-2 px-4 border text-center">Nama</th>
                        <th class="py-2 px-4 border text-center">Tanggal</th>
                        <th class="py-2 px-4 border text-center">Waktu</th>
                        <th class="py-2 px-4 border text-center">Status</th>
                        <th class="py-2 px-4 border text-center">Waktu Masuk</th>
                        <th class="py-2 px-4 border text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($manajemen as $index => $data)
                        <tr class="hover:bg-gray-50">
                            <td class="py-2 px-4 border text-gray-800 text-center">{{ ++$index }}</td>
                            <td class="py-2 px-4 border text-gray-800 text-center">{{ $data->user->nama }}</td>
                            <td class="py-2 px-4 border text-gray-800 text-center">{{ $data->tanggal }}</td>
                            <td class="py-2 px-4 border text-gray-800 text-center">{{ $data->waktu }}</td>
                            <td class="py-2 px-4 border text-gray-800 text-center">{{ $data->status }}</td>
                            <td class="py-2 px-4 border text-gray-800 text-center">{{ $data->waktu_masuk }}</td>
                            <td class="py-2 px-4 border flex justify-center items-center">
                                <!-- Tombol Edit -->
                                <a href="{{ route('manajemen.edit', $data->id) }}"
                                    class="bg-yellow-500 hover:bg-yellow-600 text-white py-1 px-3 rounded mr-2">
                                    Edit
                                </a>
                                <!-- Tombol Hapus -->
                                <form action="{{ route('manajemen.destroy', $data->id) }}" method="POST"
                                    class="inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" onclick="return confirm('Hapus Absensi?')"
                                        class="bg-red-500 hover:bg-red-600 text-white py-1 px-3 rounded">
                                        Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    @if ($manajemen->isEmpty())
                        <tr>
                            <td colspan="6" class="px-6 py-4 text-center text-sm text-gray-500">
                                Tidak Ada Data
                            </td>
                        </tr>
                    @else
                </tbody>
            </table>
            {{-- link paginate --}}
            <div class="my-4">
                {{ $manajemen->appends(['search' => $search])->links() }}
            </div>
        </div>
    </div>
    @endif
</x-layout>
