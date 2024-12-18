<x-layout>
    <x-slot:title>Dashboard Admin</x-slot:title>

    <!-- Main Content -->
    <div class="flex-1 p-8">
        <h1 class="text-6xl font-bold text-gray-700 mb-6">Dashboard Admin</h1>

        <!-- Statistik Karyawan -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
            <!-- Card 1: Hadir -->
            <div class="p-6 bg-white rounded-lg shadow-md hover:shadow-lg">
                <h2 class="text-xl font-semibold mb-2 text-gray-800">Hadir</h2>
                <p class="text-4xl font-bold text-green-500">{{ $totalHadir }}</p>
                <p class="text-gray-600">Jumlah karyawan yang hadir hari ini.</p>
            </div>

            <!-- Card 2: Sakit -->
            <div class="p-6 bg-white rounded-lg shadow-md hover:shadow-lg">
                <h2 class="text-xl font-semibold mb-2 text-gray-800">Sakit</h2>
                <p class="text-4xl font-bold text-yellow-500">{{ $totalSakit }}</p>
                <p class="text-gray-600">Jumlah karyawan yang sedang sakit.</p>
            </div>

            <!-- Card 3: Cuti -->
            <div class="p-6 bg-white rounded-lg shadow-md hover:shadow-lg">
                <h2 class="text-xl font-semibold mb-2 text-gray-800">Cuti</h2>
                <p class="text-4xl font-bold text-blue-500">{{ $totalCuti }}</p>
                <p class="text-gray-600">Jumlah karyawan yang sedang cuti.</p>
            </div>

            <!-- Card 4: Alpa -->
            <div class="p-6 bg-white rounded-lg shadow-md hover:shadow-lg">
                <h2 class="text-xl font-semibold mb-2 text-gray-800">Alpa</h2>
                <p class="text-4xl font-bold text-red-500">{{ $totalAlpa }}</p>
                <p class="text-gray-600">Jumlah karyawan yang tidak hadir tanpa keterangan.</p>
            </div>

            <!-- Card 5: Izin -->
            <div class="p-6 bg-white rounded-lg shadow-md hover:shadow-lg">
                <h2 class="text-xl font-semibold mb-2 text-gray-800">Izin</h2>
                <p class="text-4xl font-bold text-orange-500">{{ $totalIzin }}</p>
                <p class="text-gray-600">Jumlah karyawan yang izin.</p>
            </div>

            <!-- Card 6: Notifikasi Cuti/Izin -->
            <div class="p-6 bg-white rounded-lg shadow-md hover:shadow-lg">
                <h2 class="text-xl font-semibold mb-2 text-gray-800">Pengajuan Izin & Cuti</h2>
                <p class="text-4xl font-bold text-purple-500">{{ $izinPending ?? 0 }}</p>
                <p class="text-gray-600">Permintaan izin/cuti yang belum disetujui.</p>
                <a href="/persetujuan_izin&cuti" class="mt-4 inline-block text-blue-500 hover:underline">
                    Lihat Permintaan
                </a>
            </div>
        </div>

        <!-- Grafik Absensi per Status -->
        <div class="p-6 bg-white rounded-lg shadow-md hover:shadow-lg"
            style="position: relative; width: 100%; height: 600px;">
            <h2 class="text-xl font-semibold mb-2 text-gray-800">Grafik Absensi per Status</h2>
            <canvas id="absensiChart" class="w-full h-64"></canvas>
        </div>
    </div>
    </div>

    <script>
        const ctx = document.getElementById('absensiChart').getContext('2d');
        const absensiChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Hadir', 'Sakit', 'Cuti', 'Alpa', 'Izin'],
                datasets: [{
                    label: 'Status Absensi',
                    data: [
                        {{ $absensiByStatus['Hadir'] ?? 0 }},
                        {{ $absensiByStatus['Sakit'] ?? 0 }},
                        {{ $absensiByStatus['Cuti'] ?? 0 }},
                        {{ $absensiByStatus['Alpa'] ?? 0 }},
                        {{ $absensiByStatus['Izin'] ?? 0 }}
                    ],
                    backgroundColor: [
                        '#4CAF50', '#FFEB3B', '#2196F3', '#F44336', '#FFC107'
                    ],
                    borderColor: '#fff',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            stepSize: 1
                        }
                    }
                }
            }
        });
    </script>
</x-layout>
