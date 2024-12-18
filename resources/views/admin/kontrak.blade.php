<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <h1 class="text-3xl font-bold text-gray-800 mt-4 mb-6">Daftar Kontrak</h1>
        <a href="{{ route('kontrak.create') }}"
            class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded-lg text-xl">Tambah Kontrak</a>
        @if (session('success'))
            <div class="mt-4 p-4 bg-green-100 border border-green-200 text-green-700 rounded-lg">
                {{ session('success') }}
            </div>
        @endif
        {{-- Form search --}}
        <form action="" method="GET" class="flex items-center space-x-3 my-4 ">
            <input type="search" name="search" id="search" value="{{ $search }}" autocomplete="off"
                class="w-8/12 border border-gray-300 shadow-md shadow-gray-500 rounded-full px-2 py-1 focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-red-500 transition duration-300 sm:w-9/12 md:w-10/12 lg:w-11/12"
                placeholder="Cari sesuatu...">
            <button type="submit"
                class="bg-red-500 text-white px-2 py-2 rounded-full hover:bg-red-600 focus:ring-2 focus:ring-red-300 focus:ring-offset-1 transition duration-300">
                🔎 Cari
            </button>
        </form>
        <div class="overflow-x-auto mt-6">
            <table class="min-w-full bg-white border border-gray-200 rounded-lg">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-4 py-2 text-left text-gray-600 font-medium">No</th>
                        <th class="px-4 py-2 text-left text-gray-600 font-medium">Nama</th>
                        <th class="px-4 py-2 text-left text-gray-600 font-medium">Durasi</th>
                        <th class="px-4 py-2 text-left text-gray-600 font-medium">Tanggal Mulai</th>
                        <th class="px-4 py-2 text-left text-gray-600 font-medium">Tanggal Selesai</th>
                        <th class="px-4 py-2 text-left text-gray-600 font-medium">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @foreach ($kontrak as $index => $item)
                        <tr>
                            <td class="px-4 py-2">{{ ++$index }}</td>
                            <td class="px-4 py-2">{{ $item->nama }}</td>
                            <td class="px-4 py-2">{{ $item->durasi_kontrak ?? '-' }}</td>
                            <td class="px-4 py-2">{{ $item->tanggal_mulai }}</td>
                            <td class="px-4 py-2">{{ $item->tanggal_selesai ?? '-' }}</td>
                            <td class="px-4 py-2 space-x-2 flex items-center h-full">
                                <a href="{{ route('kontrak.edit', $item->id) }}"
                                    class="bg-yellow-500 hover:bg-yellow-600 text-white py-1 px-3 rounded-lg text-sm">Edit</a>
                                <form action="{{ route('kontrak.destroy', $item->id) }}" method="POST"
                                    class="inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="bg-red-500 hover:bg-red-600 text-white py-1 px-3 rounded-lg text-sm"
                                        onclick="return confirm('Apakah Anda yakin ingin menghapus kontrak ini?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    @if ($kontrak->isEmpty())
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
                {{ $kontrak->appends(['search' => $search])->links() }}
            </div>
        </div>
    </div>
</x-layout>
