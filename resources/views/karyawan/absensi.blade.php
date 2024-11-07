<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    
    <!-- Wrapper untuk memusatkan form di tengah halaman -->
    <div class="flex-1 flex items-center justify-center">
            <div class="max-w-lg w-full bg-white p-8 rounded-lg shadow-lg">
                <h1 class="text-2xl font-bold mb-6 text-center">Formulir Absensi</h1>

                <!-- Formulir Absensi -->
                <form action="{{ route('karyawan.absensi.submit') }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label for="nama" class="block text-sm font-medium text-gray-700">Nama</label>
                        <input 
                            type="text" 
                            name="nama" 
                            id="nama" 
                            class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
                            placeholder="Masukkan Nama Anda" 
                            required
                        >
                    </div>

                    <button type="submit" class="w-full py-2 px-4 bg-blue-600 text-white rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 mt-4">
                        Absen Sekarang
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-layout>

