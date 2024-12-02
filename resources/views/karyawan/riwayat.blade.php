{{-- <x-layout>
    <x-slot:title>
        Riwayat
    </x-slot:title>

    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold text-gray-800 mb-6">Riwayat Aktivitas</h1>

        <!-- Pesan sukses jika ada -->
        @if(session('success'))
            <div class="bg-green-100 text-green-700 p-4 rounded-md mb-4">
                {{ session('success') }}
            </div>
        @endif

        <!-- Riwayat list -->
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-200 rounded-lg shadow-md">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="text-left px-6 py-3 text-sm font-medium text-gray-600 border-b">Tanggal</th>
                        <th class="text-left px-6 py-3 text-sm font-medium text-gray-600 border-b">Aktivitas</th>
                        <th class="text-left px-6 py-3 text-sm font-medium text-gray-600 border-b">Deskripsi</th>
                        <th class="text-center px-6 py-3 text-sm font-medium text-gray-600 border-b">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($riwayats as $riwayat)
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4 text-gray-800 border-b">{{ $riwayat->tanggal }}</td>
                            <td class="px-6 py-4 text-gray-800 border-b">{{ $riwayat->aktivitas }}</td>
                            <td class="px-6 py-4 text-gray-800 border-b">{{ $riwayat->deskripsi }}</td>
                            <td class="px-6 py-4 text-center border-b">
                                <!-- Tombol untuk melihat detail riwayat -->
                                <a href="{{ route('riwayat.show', $riwayat->id) }}" 
                                   class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-md shadow inline-block">
                                    Detail
                                </a>

                                <!-- Tombol untuk menghapus riwayat -->
                                <form action="{{ route('riwayat.destroy', $riwayat->id) }}" method="POST" class="inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" 
                                            class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-md shadow">
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
</x-layout> --}}

<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>

    <div class="container mx-auto px-4 py-8">
        <!-- Pesan Sukses jika ada -->
        @if(session('success'))
            <div class="bg-green-100 text-green-700 p-4 rounded-md mb-4">
                {{ session('success') }}
            </div>
        @endif
@dd($absensi)
        <h1 class="text-3xl font-bold text-gray-800 mb-6">{{ $title }}</h1>

        <!-- Tabel Riwayat Absensi -->
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-200 rounded-lg shadow-md">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="text-left px-6 py-3 text-sm font-medium text-gray-600 border-b">Tanggal</th>
                        <th class="text-left px-6 py-3 text-sm font-medium text-gray-600 border-b">Waktu Masuk</th>
                        <th class="text-left px-6 py-3 text-sm font-medium text-gray-600 border-b">Waktu Keluar</th>
                        <th class="text-left px-6 py-3 text-sm font-medium text-gray-600 border-b">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($absensi as $item)
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4 text-gray-800 border-b">{{ \Carbon\Carbon::parse($item->tanggal)->format('d-m-Y') }}</td>
                            <td class="px-6 py-4 text-gray-800 border-b">{{ \Carbon\Carbon::parse($item->waktu_masuk)->format('H:i') }}</td>
                            <td class="px-6 py-4 text-gray-800 border-b">{{ $item->waktu_keluar ? \Carbon\Carbon::parse($item->waktu_keluar)->format('H:i') : 'Belum keluar' }}</td>
                            <td class="px-6 py-4 text-gray-800 border-b">{{ $item->status }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-6 py-4 text-center text-gray-500">Tidak ada riwayat absensi</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-layout>