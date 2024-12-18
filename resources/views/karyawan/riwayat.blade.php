<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>

    <div class="container mx-auto py-8">
        @if (session('success'))
            <div class="bg-green-100 text-green-700 p-4 rounded-md mb-4">
                {{ session('success') }}
            </div>
        @endif
        <div class="flex justify-between items-center mb-4">
            <h1 class="text-base font-bold text-slate-800 md:text-lg lg:text-3xl">Riwayat Absensi</h1>

            <a href="{{ route('karyawan.dashboard') }}"
                class="flex items-center py-2 px-2 bg-blue-600 text-white font-semibold rounded-lg shadow hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                <img src="{{ Vite::asset('public/images/backbutton.png') }}" alt="Back Button"
                    class="w-6 aspect-square mr-2">
                Kembali Ke dashboard
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
        <div class="overflow-x-auto">
            <table class="w-full bg-white border border-gray-300 rounded-lg shadow-md">
                <thead>
                    <tr class="bg-gray-600">
                        <th class="text-left px-6 py-3 text-sm font-medium text-gray-50 border-b">Tanggal</th>
                        <th class="text-left px-6 py-3 text-sm font-medium text-gray-50 border-b">Waktu</th>
                        <th class="text-left px-6 py-3 text-sm font-medium text-gray-50 border-b">Waktu Masuk</th>
                        <th class="text-left px-6 py-3 text-sm font-medium text-gray-50 border-b">Waktu Keluar</th>
                        <th class="text-left px-6 py-3 text-sm font-medium text-gray-50 border-b">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($absensi as $item)
                        <tr class="hover:bg-gray-100">
                            <td class="px-6 py-4 text-gray-800 border-b">
                                {{ \Carbon\Carbon::parse($item->tanggal)->format('d-m-Y') }}</td>
                            <td class="px-6 py-4 text-gray-800 border-b">{{ $item->waktu }}</td>
                            <td class="px-6 py-4 text-gray-800 border-b">
                                {{ \Carbon\Carbon::parse($item->waktu_masuk)->format('H:i') }}</td>
                            <td class="px-6 py-4 text-gray-800 border-b">
                                {{ $item->waktu_keluar ? \Carbon\Carbon::parse($item->waktu_keluar)->format('H:i') : 'Belum keluar' }}
                            </td>
                            <td class="px-6 py-4 text-gray-800 border-b">{{ $item->status }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-6 py-4 text-center text-gray-500">Tidak ada riwayat absensi
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            {{-- link paginate --}}
            <div class="my-4">
                {{ $absensi->appends(['search' => $search])->links() }}
            </div>

        </div>
    </div>
</x-layout>
