<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <div class="h-screen"> {{-- Jangan DIHAPUS!!! --}}
        <div class="container mx-auto my-12 p-8 max-w-lg sm:max-w-md bg-white rounded-lg shadow-md">
            <h1 class="text-2xl font-bold text-gray-800 mb-6 text-center">Edit Absensi</h1>

            <form action="{{ route('manajemen.update', $manajemen->id) }}" method="POST" class="space-y-6">
                @csrf
                @method('PUT')

                <!-- Nama Karyawan -->
                <div>
                    <label for="user_id" class="block text-sm font-medium text-gray-700 mb-2">Nama Karyawan</label>
                    <select name="user_id" id="user_id" required
                        class="w-full border border-gray-300 rounded-md px-4 py-2 focus:ring focus:ring-blue-400 focus:outline-none transition">
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}"
                                {{ $manajemen->user_id == $user->id ? 'selected' : '' }}>
                                {{ $user->nama }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Tanggal -->
                <div>
                    <label for="tanggal" class="block text-sm font-medium text-gray-700 mb-2">Tanggal</label>
                    <input type="date" name="tanggal" value="{{ $manajemen->tanggal }}" required
                        class="w-full border border-gray-300 rounded-md px-4 py-2 focus:ring focus:ring-blue-400 focus:outline-none transition">
                </div>

                <!-- Status -->
                <div>
                    <label for="status" class="block text-sm font-medium text-gray-700 mb-2">Status</label>
                    <select name="status" required
                        class="w-full border border-gray-300 rounded-md px-4 py-2 focus:ring focus:ring-blue-400 focus:outline-none transition">
                        <option value="Hadir" {{ $manajemen->status == 'Hadir' ? 'selected' : '' }}>Hadir</option>
                        <option value="Izin" {{ $manajemen->status == 'Izin' ? 'selected' : '' }}>Izin</option>
                        <option value="Sakit" {{ $manajemen->status == 'Sakit' ? 'selected' : '' }}>Sakit</option>
                    </select>
                </div>

                <!-- Tombol Perbarui -->
                <div class="text-center">
                    <button type="submit"
                        class="w-full bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500 text-white font-bold py-3 px-6 rounded-2xl shadow-lg transform transition-all duration-500 ease-in-out hover:scale-110 hover:shadow-xl hover:rotate-2 hover:bg-gradient-to-r hover:from-indigo-600 hover:to-pink-600 focus:outline-none focus:ring-4 focus:ring-indigo-300">
                        Perbarui
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-layout>
