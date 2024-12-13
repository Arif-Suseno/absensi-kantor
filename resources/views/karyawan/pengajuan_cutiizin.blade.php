<x-layout>
    <x-slot:title>{{ $title ?? 'Pengajuan Izin/Cuti' }}</x-slot:title>

    <div class="container mx-auto px-4 py-8">
        <div class="max-w-2xl mx-auto bg-white p-8 rounded-xl shadow-lg border border-gray-200">
            <!-- Judul -->
            <div class="flex items-center justify-center mb-6">
                <h2 class="text-3xl font-semibold text-gray-800 ml-3">Pengajuan Izin/Cuti</h2>
            </div>

            <!-- Pesan Sukses -->
            @if(session('success'))
                <div class="bg-green-100 text-green-700 p-4 rounded-lg mb-4 flex items-center">
                    <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" stroke-width="1.5"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M5 13l4 4L19 7" />
                    </svg>
                    {{ session('success') }}
                </div>
            @endif

            <!-- Form -->
            <form action="{{ route('pengajuan_cutiizin.create') }}" method="POST" class="space-y-6">
                @csrf

                <!-- Input Tanggal Mulai -->
                <div>
                    <label for="tanggal_mulai" class="block text-sm font-medium text-gray-700">Tanggal Mulai</label>
                    <input type="date" name="tanggal_mulai"
                        class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"
                        value="{{ old('tanggal_mulai') }}" required>
                    @error('tanggal_mulai')
                        <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Input Tanggal Selesai -->
                <div>
                    <label for="tanggal_selesai" class="block text-sm font-medium text-gray-700">Tanggal Selesai</label>
                    <input type="date" name="tanggal_selesai"
                        class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"
                        value="{{ old('tanggal_selesai') }}" required>
                    @error('tanggal_selesai')
                        <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Input Jenis Cuti/Izin -->
                <div>
                    <label for="jenis" class="block text-sm font-medium text-gray-700">Jenis Cuti/Izin</label>
                    <select name="jenis"
                        class="w-full p-3 border border-gray-300 rounded-lg bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500"
                        required>
                        <option value="Cuti" {{ old('jenis') == 'Cuti' ? 'selected' : '' }}>Cuti</option>
                        <option value="Izin" {{ old('jenis') == 'Izin' ? 'selected' : '' }}>Izin</option>
                    </select>
                    @error('jenis')
                        <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Input Alasan -->
                <div>
                    <label for="alasan" class="block text-sm font-medium text-gray-700">Alasan</label>
                    <textarea name="alasan" rows="4"
                        class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"
                        placeholder="Jelaskan alasan pengajuan">{{ old('alasan') }}</textarea>
                    @error('alasan')
                        <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Tombol Submit -->
                <div class="text-center">
                    <button type="submit"
                        class="w-full py-3 px-6 bg-indigo-600 text-white font-semibold rounded-lg shadow-md hover:bg-indigo-700 transition-all duration-300 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                        Kirim Pengajuan
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-layout>
