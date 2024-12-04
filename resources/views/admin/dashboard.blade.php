<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>

    <!-- Main Container -->
    <div class="container mx-auto p-6 flex justify-center">
        <div class="w-full md:w-3/4 lg:w-2/3 xl:w-1/2">

            <!-- Header -->
            <header class="mb-6 text-center">
                <h2 class="text-4xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-gray-600 via-white to-black shadow-md p-4">
                    Dashboard Admin
                </h2>
            </header>

            <!-- Card untuk Menampilkan Jumlah Karyawan -->
            <div class="bg-gradient-to-r from-teal-500 to-teal-400 shadow-lg rounded-lg p-6 mb-5">
                <h3 class="text-xl font-semibold text-white mb-4 text-center">Data Karyawan</h3>
                <table class="w-full text-left table-auto bg-white rounded-lg shadow-md overflow-hidden">
                    <thead>
                        <tr>
                            <th class="px-6 py-3 font-semibold text-gray-700 bg-gray-200">Nama</th>
                            <th class="px-6 py-3 font-semibold text-gray-700 bg-gray-200">Alamat</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($karyawan as $data)
                            <tr>
                                <td class="border px-6 py-4">{{ $data->nama }}</td>
                                <td class="border px-6 py-4">{{ $data->alamat }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Data Izin/Cuti Terbaru -->
            <div class="bg-gradient-to-r from-blue-500 to-blue-400 shadow-lg rounded-lg p-6 mb-6">
                <h3 class="text-xl font-semibold text-white mb-4 text-center">Data Izin/Cuti Terbaru</h3>
                <table class="w-full text-left table-auto bg-white rounded-lg shadow-md overflow-hidden">
                    <thead>
                        <tr>
                            <th class="px-6 py-3 font-semibold text-gray-700 bg-gray-200">Nama Karyawan</th>
                            <th class="px-6 py-3 font-semibold text-gray-700 bg-gray-200">Tanggal Izin/Cuti</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cutiLogs as $log)
                            <tr>
                                <td class="border px-6 py-4">{{ $log->nama }}</td>
                                <td class="border px-6 py-4">{{ $log->tanggal_mulai }} - {{ $log->tanggal_selesai }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Log Aktivitas -->
            {{-- <div class="bg-gradient-to-r from-yellow-500 to-yellow-400 shadow-lg rounded-lg p-6">
                <h3 class="text-xl font-semibold text-white mb-4 text-center">Log Aktivitas</h3>
                <table class="w-full text-left table-auto bg-white rounded-lg shadow-md overflow-hidden" style="table-layout: fixed;">
                    <thead>
                        <tr>
                            <th class="px-6 py-3 font-semibold text-gray-700 bg-gray-200 w-1/2">Waktu</th>
                            <th class="px-6 py-3 font-semibold text-gray-700 bg-gray-200 w-1/2">Aktivitas</th>
                        </tr>
                    </thead>
                
            
            








                    <tbody>
                        @foreach ($absensiLogs as $log)
                            <tr>
                                <td class="border px-6 py-4">{{ $log->tanggal }}</td>
                                <td class="border px-6 py-4">{{ $log->status }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div> --}}
    </div>
</x-layout>
