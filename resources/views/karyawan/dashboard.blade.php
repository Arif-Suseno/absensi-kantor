<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <div class="p-6 bg-gradient-to-br from-stone-50 to-stone-200 min-h-screen">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-bold text-gray-800">Dashboard Karyawan</h1>

            <!-- Tombol Absensi -->
            <div class="flex flex-col items-end">
                <p class="text-gray-600 font-medium mb-2">Belum absen?</p>
                <a href="{{ route('karyawan.absensi') }}"
                    class="py-2 px-5 bg-blue-700 text-white font-semibold rounded-lg shadow-lg hover:bg-blue-600 transition-all duration-300">
                    Absen sekarang
                </a>
            </div>
        </div>

        <!-- Selamat Datang -->
        <p class="text-gray-800 text-2xl mb-4">Selamat datang, <span
                class="font-semibold">{{ Auth::user()->nama }}</span>!</p>



        <!-- Ringkasan Absensi -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-6">
            <div class="bg-white shadow-lg rounded-lg p-4">
                <h2 class="text-lg font-semibold text-gray-700">Total Hari Hadir</h2>
                <p class="text-3xl font-bold text-green-500">{{ $totalHadir }}</p>
            </div>
            <div class="bg-white shadow-lg rounded-lg p-4">
                <h2 class="text-lg font-semibold text-gray-700">Total Izin/Cuti</h2>
                <p class="text-3xl font-bold text-blue-500">{{ $totalIzin }}</p>
            </div>
            <div class="bg-white shadow-lg rounded-lg p-4">
                <h2 class="text-lg font-semibold text-gray-700">Hari Tidak Hadir</h2>
                <p class="text-3xl font-bold text-red-500">{{ $totalTidakHadir }}</p>
            </div>
        </div>

        <!-- Pengajuan Pending -->
        <div class="mt-8 bg-white shadow-lg rounded-lg p-6">
            <h2 class="text-xl font-semibold text-gray-800 mb-4">Pengajuan Izin/Cuti Belum Disetujui</h2>
            @if ($pengajuanPending->isEmpty())
                <p class="text-gray-500">Tidak ada pengajuan izin/cuti yang pending.</p>
            @else
                <table class="w-full border-collapse border border-gray-300">
                    <thead>
                        <tr class="bg-blue-100 text-gray-700">
                            <th class="border border-gray-300 p-2">Tanggal Pengajuan</th>
                            <th class="border border-gray-300 p-2">Jenis</th>
                            <th class="border border-gray-300 p-2">Tanggal Mulai</th>
                            <th class="border border-gray-300 p-2">Tanggal Selesai</th>
                            <th class="border border-gray-300 p-2">Keterangan</th>
                            <th class="border border-gray-300 p-2">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pengajuanPending as $pengajuan)
                            <tr class="text-center bg-gray-50 hover:bg-gray-100 transition">
                                <td class="border p-2">{{ $pengajuan->created_at->format('Y-m-d') }}</td>
                                <td class="border p-2">{{ $pengajuan->jenis }}</td>
                                <td class="border p-2">{{ $pengajuan->tanggal_mulai }}</td>
                                <td class="border p-2">{{ $pengajuan->tanggal_selesai }}</td>
                                <td class="border p-2">{{ $pengajuan->alasan }}</td>
                                <td class="border p-2">
                                    <span
                                        class="px-3 py-1 rounded bg-yellow-200 text-yellow-700">{{ $pengajuan->status }}</span>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>

        <!-- Data Absensi Terbaru -->
        <div class="mt-8 bg-white shadow-lg rounded-lg p-6">
            <h2 class="text-xl font-semibold text-gray-800 mb-4">Data Absensi Terbaru</h2>
            <table class="w-full border-collapse border border-gray-300">
                <thead>
                    <tr class="bg-blue-100 text-gray-700">
                        <th class="border p-2">Tanggal</th>
                        <th class="border p-2">Waktu Masuk</th>
                        <th class="border p-2">Waktu Keluar</th>
                        <th class="border p-2">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($absensiTerbaru as $absensi)
                        <tr class="text-center bg-gray-50 hover:bg-gray-100 transition">
                            <td class="border p-2">{{ $absensi->tanggal }}</td>
                            <td class="border p-2">{{ $absensi->waktu_masuk }}</td>
                            <td class="border p-2">{{ $absensi->waktu_keluar }}</td>
                            <td class="border p-2">
                                <span
                                    class="px-3 py-1 rounded 
                                {{ $absensi->status == 'Hadir' ? 'bg-green-200 text-green-700' : 'bg-red-200 text-red-700' }}">
                                    {{ $absensi->status }}
                                </span>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>


    <!-- Script Jam Realtime -->
    <script>
        function updateTime() {
            const currentTime = document.getElementById('current-time');
            const now = new Date();
            currentTime.innerText = now.toLocaleTimeString();
        }
        setInterval(updateTime, 1000);
        updateTime();
    </script>
</x-layout>
