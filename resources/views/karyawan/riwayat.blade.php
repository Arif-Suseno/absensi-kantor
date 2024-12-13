<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>

    <div class="container mx-auto px-4 py-8">
        @if(session('success'))
            <div class="bg-green-100 text-green-700 p-4 rounded-md mb-4">
                {{ session('success') }}
            </div>
        @endif
        <div class="flex justify-between items-center mb-4">
            <h1 class="text-3xl font-bold text-slate-800 mb-6">Riwayat Absensi</h1>
            
            <a href="{{ route('karyawan.dashboard') }}"
                class="flex items-center py-2 px-4 bg-blue-600 text-white font-semibold rounded-lg shadow hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                <img src="{{ Vite::asset('public/images/backbutton.png') }}" alt="Back Button" class="w-6 h-6 mr-2">
                Kembali Ke dashboard
            </a>
        </div>
        
        
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-300 rounded-lg shadow-md">
                <thead>
                    <tr class="bg-gray-600">
                        <th class="text-left px-6 py-3 text-sm font-medium text-gray-50 border-b">Tanggal</th>
                        <th class="text-left px-6 py-3 text-sm font-medium text-gray-50 border-b">Waktu Masuk</th>
                        <th class="text-left px-6 py-3 text-sm font-medium text-gray-50 border-b">Waktu Keluar</th>
                        <th class="text-left px-6 py-3 text-sm font-medium text-gray-50 border-b">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($absensi as $item)
                        <tr class="hover:bg-gray-100">
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
