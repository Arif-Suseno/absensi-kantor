<x-layout>
    <x-slot:title>Edit Pengajuan</x-slot:title>

    <div class="container mx-auto px-4 py-8">
        <div class="max-w-2xl mx-auto bg-white p-8 rounded-xl shadow-lg border border-gray-200">
            <h2 class="text-2xl font-semibold text-gray-800 mb-4">Edit Pengajuan Izin/Cuti</h2>

            <form action="{{ route('pengajuan.update', $pengajuan->id) }}" method="POST" class="space-y-6">
                @csrf
                @method('PUT')

                <!-- Input Tanggal Mulai -->
                <div>
                    <label class="block">Tanggal Mulai</label>
                    <input type="date" name="tanggal_mulai" value="{{ old('tanggal_mulai', $pengajuan->tanggal_mulai) }}"
                           class="w-full p-3 border rounded" required>
                </div>

                <!-- Input Tanggal Selesai -->
                <div>
                    <label class="block">Tanggal Selesai</label>
                    <input type="date" name="tanggal_selesai" value="{{ old('tanggal_selesai', $pengajuan->tanggal_selesai) }}"
                           class="w-full p-3 border rounded" required>
                </div>

                <!-- Jenis -->
                <div>
                    <label class="block">Jenis</label>
                    <select name="jenis" class="w-full p-3 border rounded" required>
                        <option value="Cuti" {{ $pengajuan->jenis == 'Cuti' ? 'selected' : '' }}>Cuti</option>
                        <option value="Izin" {{ $pengajuan->jenis == 'Izin' ? 'selected' : '' }}>Izin</option>
                    </select>
                </div>

                <!-- Alasan -->
                <div>
                    <label class="block">Alasan</label>
                    <textarea name="alasan" rows="3" class="w-full p-3 border rounded" required>{{ old('alasan', $pengajuan->alasan) }}</textarea>
                </div>

                <button type="submit"
                        class="w-full py-3 bg-indigo-600 text-white rounded hover:bg-indigo-700">
                    Simpan Perubahan
                </button>
            </form>
        </div>
    </div>
</x-layout>
