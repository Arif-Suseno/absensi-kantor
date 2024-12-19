<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>

    <div class="container mx-auto px-4 py-8">
        <div class="max-w-2xl mx-auto bg-white p-8 rounded-xl shadow-lg border border-gray-200">
            <!-- Judul -->
            <h2 class="text-3xl font-semibold text-gray-800 text-center mb-6">Pengajuan Izin/Cuti</h2>

            <!-- Pesan Sukses -->
            @if(session('success'))
                <div class="bg-green-100 text-green-700 p-4 rounded-lg mb-4">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Form -->
            <form action="{{ route('pengajuan_cutiizin.create') }}" method="POST" class="space-y-4 mb-8">
                @csrf
                <div>
                    <label for="tanggal_mulai" class="block text-sm font-medium">Tanggal Mulai</label>
                    <input type="date" name="tanggal_mulai" required
                        class="w-full p-2 border rounded-lg" value="{{ old('tanggal_mulai') }}">
                </div>
                <div>
                    <label for="tanggal_selesai" class="block text-sm font-medium">Tanggal Selesai</label>
                    <input type="date" name="tanggal_selesai" required
                        class="w-full p-2 border rounded-lg" value="{{ old('tanggal_selesai') }}">
                </div>
                <div>
                    <label for="jenis" class="block text-sm font-medium">Jenis</label>
                    <select name="jenis" class="w-full p-2 border rounded-lg" required>
                        <option value="Cuti">Cuti</option>
                        <option value="Izin">Izin</option>
                    </select>
                </div>
                <div>
                    <label for="alasan" class="block text-sm font-medium">Alasan</label>
                    <textarea name="alasan" rows="3" class="w-full p-2 border rounded-lg" required></textarea>
                </div>
                <button type="submit" class="w-full bg-indigo-600 text-white py-2 rounded-lg hover:bg-indigo-700">
                    Kirim Pengajuan
                </button>
            </form>
        </div>

        <!-- Tabel Daftar Pengajuan -->
        <div class="max-w-2xl mx-auto mt-8 bg-white p-8 rounded-xl shadow-lg border border-gray-200">
            <h3 class="text-xl font-semibold mb-4">Daftar Pengajuan</h3>
            <table class="w-full border-collapse border border-gray-300">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="border p-2">Jenis</th>
                        <th class="border p-2">Tanggal Mulai</th>
                        <th class="border p-2">Tanggal Selesai</th>
                        <th class="border p-2">Alasan</th>
                        <th class="border p-2">Status</th>
                        <th class="border p-2">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pengajuan as $data)
                        <tr>
                            <td class="border p-2">{{ $data->jenis }}</td>
                            <td class="border p-2">{{ $data->tanggal_mulai }}</td>
                            <td class="border p-2">{{ $data->tanggal_selesai }}</td>
                            <td class="border p-2">{{ $data->alasan }}</td>
                            <td class="border p-2">{{ $data->status }}</td>
                            <td class="border p-2">
                                <!-- Tombol Hapus -->
                                <form action="{{ route('pengajuan_cutiizin.destroy', $data->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:underline"
                                        onclick="return confirm('Yakin ingin menghapus pengajuan ini?');">
                                        Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            @if ($pengajuan->isEmpty())
                <p class="text-center mt-4 text-gray-600">Belum ada pengajuan izin atau cuti.</p>
            @endif
        </div>
    </div>
</x-layout>
