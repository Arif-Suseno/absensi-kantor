<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <script>
        function toggleDetails() {
            const details = document.getElementById('detail-info');
            details.classList.toggle('hidden');
        }
    </script>
    <div class="flex items-center justify-center min-h-auto">
        <div class="bg-white shadow-lg rounded-lg w-full  max-w-md p-6">
            <div class="text-center mb-6">
                <h2 class="text-2xl font-bold text-gray-700">Profil Karyawan</h2>
                <p class="text-sm text-gray-500">Detail Informasi Anda</p>
            </div>
            <!-- Profil picture -->
            <div class="flex justify-center mb-4">
                <img src="{{ Vite::asset('public/images/logo3.png') }}" alt="Profile Picture" class="rounded-full w-24 h-24 shadow-lg">
            </div>
            <!-- Basic Profile Information -->
            <div class="text-center space-y-2">
                <div class="text-xl font-semibold text-gray-800">{{ $user->nama }}</div>
            </div>
            <!-- Toggle Button for Details -->
            <div class="mt-6 flex justify-center">
                <button onclick="toggleDetails()" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 focus:outline-none">
                    Tampilkan Detail
                </button>
            </div>
            <!-- Profil Informasi -->
            <div id="detail-info" class="hidden mt-6 grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-600">Email</label>
                    <div class="bg-gray-100 px-4 py-2 rounded text-gray-700">{{ $user->email }}</div>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-600">Gender</label>
                    <div class="bg-gray-100 px-4 py-2 rounded text-gray-700">{{ $user->gender }}</div>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-600">Agama</label>
                    <div class="bg-gray-100 px-4 py-2 rounded text-gray-700">{{ $user->agama }}</div>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-600">Tempat Lahir</label>
                    <div class="bg-gray-100 px-4 py-2 rounded text-gray-700">{{ $user->tempat_lahir }}</div>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-600">Tanggal Lahir</label>
                    <div class="bg-gray-100 px-4 py-2 rounded text-gray-700">{{ $user->tanggal_lahir }}</div>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-600">Alamat</label>
                    <div class="bg-gray-100 px-4 py-2 rounded text-gray-700">{{ $user->alamat }}</div>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-600">Nomor Handphone</label>
                    <div class="bg-gray-100 px-4 py-2 rounded text-gray-700">{{ $user->no_hp }}</div>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-600">Jabatan</label>
                    <div class="bg-gray-100 px-4 py-2 rounded text-gray-700">{{ $user->jabatan_id }}</div>
                </div>
            </div>
        </div>
    </div>
</x-layout>