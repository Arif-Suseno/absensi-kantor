<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <div class="container w-6/12 mx-auto px-4 sm:px-6 lg:px-8 py-6">
        <h1 class="text-2xl font-bold text-gray-800 mb-6">Edit Kontrak</h1>
        <form action="{{ route('kontrak.update', $kontrak->id) }}" method="POST" class="space-y-6 bg-white p-6 shadow-md rounded-lg">
            @csrf
            @method('PUT')

            <!-- Jenis Kontrak -->
            <div>
                <label for="nama" class="block text-sm font-medium text-gray-700">Nama</label>
                <select name="nama" id="nama" class="mt-1 block w-full p-2  rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm" required>
                    <option value="">-- Pilih Jenis --</option>
                    <option value="Permanen" {{ $kontrak->nama == 'Permanen' ? 'selected' : '' }}>Permanen</option>
                    <option value="Sementara" {{ $kontrak->nama == 'Sementara' ? 'selected' : '' }}>Sementara</option>
                    <option value="Magang" {{ $kontrak->nama == 'Magang' ? 'selected' : '' }}>Magang</option>
                </select>
            </div>

            <!-- Durasi Kontrak -->
            <div>
                <label for="durasi_kontrak" class="block text-sm font-medium text-gray-700">Durasi Kontrak (Bulan)</label>
                <input type="number" name="durasi_kontrak" id="durasi_kontrak" value="{{ $kontrak->durasi_kontrak }}" class="mt-1 block w-full p-2 rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm" value="{{ $kontrak->durasi_kontrak }}">
            </div>

            <!-- Tanggal Mulai -->
            <div>
                <label for="tanggal_mulai" class="block text-sm font-medium text-gray-700">Tanggal Mulai</label>
                <input type="date" name="tanggal_mulai" id="tanggal_mulai" value="{{ $kontrak->tanggal_mulai }}" class="mt-1 block  p-2 rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm" value="{{ $kontrak->tanggal_mulai }}" required>
            </div>

            <!-- Tanggal Selesai -->
            <div>
                <label for="tanggal_selesai" class="block text-sm font-medium text-gray-700">Tanggal Selesai</label>
                <input type="date" name="tanggal_selesai" id="tanggal_selesai" value="{{$kontrak->tanggal_selesai}}" class="mt-1 block  p-2 rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm" value="{{ $kontrak->tanggal_selesai }}">
            </div>

            <!-- Deskripsi -->
            <div>
                <label for="deskripsi" class="block text-sm font-medium text-gray-700">Deskripsi</label>
                <textarea name="deskripsi" id="deskripsi" value="{{$kontrak->deskripsi}}" class="mt-1 block w-full p-2 rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm" rows="4">{{ $kontrak->deskripsi }}</textarea>
            </div>

            <!-- Tombol Aksi -->
            <div class="flex justify-end space-x-3">
                <button type="submit" class="bg-green-500 hover:bg-green-600 text-white py-2 px-4 rounded-md shadow">Update</button>
                <a href="{{ route('kontrak.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white py-2 px-4 rounded-md shadow">Kembali</a>
            </div>
        </form>
    </div>
</x-layout>
