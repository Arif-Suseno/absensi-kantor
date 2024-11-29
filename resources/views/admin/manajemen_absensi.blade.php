<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>

    <div class="container mx-auto my-8 p-4 bg-white shadow-md rounded">
        <h1 class="text-3xl font-bold mb-4">Manajemen Absensi</h1>
        <!-- Tabel -->
        <div class="overflow-x-auto">
            <table class="min-w-full text-xs sm:text-sm text-left text-gray-600 border border-gray-200">
                <thead class="bg-gray-100 text-gray-700 font-semibold uppercase">
                    <tr>
                        <th class="py-2 px-4 border text-center ">ID</th>
                        <th class="py-2 px-4 border text-center">Nama</th>
                        <th class="py-2 px-4 border text-center">Tanggal</th>
                        <th class="py-2 px-4 border text-center">Status</th>
                        <th class="py-2 px-4 border text-center">Waktu Masuk</th>
                        <th class="py-2 px-4 border text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($manajemen as $data)
                        <tr class="hover:bg-gray-50">
                            <td class="py-2 px-4 border text-gray-800 text-center">{{ $data->id }}</td>
                            <td class="py-2 px-4 border text-gray-800 text-center">{{ $data->user->nama }}</td>
                            <td class="py-2 px-4 border text-gray-800 text-center">{{ $data->tanggal }}</td>
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
                </tbody>
            </table>
        </div>
    </div>
</x-layout>
