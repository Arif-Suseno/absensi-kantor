<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>

    <div class="container mx-auto p-6">
        <!-- Header -->
        <h2 class="text-3xl font-bold text-neutral-200 mb-6">Dashboard Admin</h2>

        <div class="grid grid-cols-2 md:grid-cols-2 lg:grid-cols-3 gap-4">
            <!-- Daftar Jabatan -->
            <div class="bg-blue-800 text-white rounded-lg shadow-md p-4">
                <h2 class="text-blue-400 text-center font-semibold mb-4 bg-black rounded-lg shadow-md">Daftar Jabatan</h2>
                @foreach ($jabatans as $jabatan)
                <ul>
                    <li class="border-b border-white py-2">{{ $jabatan->nama_jabatan }}</li>
                    <li class="border-b border-white py-2">{{ $jabatan->deskripsi }}</li>
                </ul>
                @endforeach
            </div>
            
            <!-- V-Legal (Data Karyawan) -->
            <div class="bg-teal-700 shadow rounded-lg p-4 col-span-2">
                <h3 class="text-lg font-bold text-teal-500 text-center mb-4 bg-black rounded-lg shadow-md">Data Karyawan</h3>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    @foreach ($karyawan as $data)
                        <div class="bg-yellow-100 p-4 rounded-lg">
                            <h4 class="font-bold text-gray-800">{{ $data->nama }}</h4>
                            <p class="text-gray-600 text-sm">{{ $data->alamat }}</p>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- Monitoring Blanko -->
            <div class="bg-rose-700 text-white rounded-lg p-4 col-span-1">
                <h3 class="text-lg font-bold">Kontrak</h3>
                <div class="bg-black text-white p-3 mt-4 rounded-lg">
                    <p class="text-base font-bold">Jenis Kontrak:</p>
                    <ul class="text-base font-bold list-disc list-inside mt-2">
                        <li>Kontrak Sementara</li>
                        <li>Kontrak Magang</li>
                        <li>Permanen</li>
                    </ul>
                    <a href="{{ route('kontrak.index') }}" class="bg-blue-700 text-white px-4 py-2 mt-4 rounded block text-center">Lihat Detail</a>
                </div>
            </div>
        </div>
    </div>
</x-layout>
