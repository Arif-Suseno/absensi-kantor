<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
<div class="p-6 bg-gray-100">
    <h1 class="text-2xl font-bold text-gray-800">Dashboard Karyawan</h1>
    <p class="text-gray-600">Selamat datang, {{ Auth::user()->nama }}!</p>

    <!-- Ringkasan Absensi -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mt-6">
        <div class="bg-white shadow-md rounded-lg p-4">
            <h2 class="text-lg font-semibold text-gray-700">Total Hari Hadir</h2>
            <p class="text-2xl font-bold text-green-500">{{ $totalHadir }}</p>
        </div>
        <div class="bg-white shadow-md rounded-lg p-4">
            <h2 class="text-lg font-semibold text-gray-700">Total Izin/Cuti</h2>
            <p class="text-2xl font-bold text-blue-500">{{ $totalIzin }}</p>
        </div>
        <div class="bg-white shadow-md rounded-lg p-4">
            <h2 class="text-lg font-semibold text-gray-700">Hari Tidak Hadir</h2>
            <p class="text-2xl font-bold text-red-500">{{ $totalTidakHadir }}</p>
        </div>
    </div>

    <!-- Data Absensi Terbaru -->
    <div class="mt-8 bg-white shadow-md rounded-lg p-6">
        <h2 class="text-xl font-semibold text-gray-800">Data Absensi Terbaru</h2>
        <table class="w-full mt-4 border-collapse border border-gray-300">
            <thead>
                <tr class="bg-gray-100">
                    <th class="border border-gray-300 p-2">Tanggal</th>
                    <th class="border border-gray-300 p-2">Waktu Masuk</th>
                    <th class="border border-gray-300 p-2">Waktu Keluar</th>
                    <th class="border border-gray-300 p-2">Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($absensiTerbaru as $absensi)
                    <tr class="text-center">
                        <td class="border border-gray-300 p-2">{{ $absensi->tanggal }}</td>
                        <td class="border border-gray-300 p-2">{{ $absensi->waktu_masuk ?? '-' }}</td>
                        <td class="border border-gray-300 p-2">{{ $absensi->waktu_keluar ?? '-' }}</td>
                        <td class="border border-gray-300 p-2">
                            <span class="px-2 py-1 rounded 
                                {{ $absensi->status == 'Hadir' ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' }}">
                                {{ $absensi->status }}
                            </span>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

</x-layout>
