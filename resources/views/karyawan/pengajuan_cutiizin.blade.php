<x-layout>
    <x-slot:title>{{ $title ?? 'Pengajuan Izin Cuti' }}</x-slot:title>

    <div class="container mx-auto px-4 py-8">
        <div class="max-w-2xl mx-auto bg-white p-8 rounded-lg shadow-lg">
            <h2 class="text-3xl font-semibold text-center text-gray-800 mb-6">Pengajuan Cuti/Izin</h2>

            @if(session('success'))
                <div class="bg-green-500 text-white p-4 rounded-lg mb-4">
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('pengajuan_cutiizin.create') }}" method="POST" class="space-y-6">
                @csrf

                <div class="form-group">
                    <label for="tanggal_mulai" class="block text-sm font-medium text-gray-700">Tanggal Mulai</label>
                    <input type="date" name="tanggal_mulai" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" value="{{ old('tanggal_mulai') }}" required>
                    @error('tanggal_mulai')
                        <div class="text-red-500 text-sm mt-2">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="tanggal_selesai" class="block text-sm font-medium text-gray-700">Tanggal Selesai</label>
                    <input type="date" name="tanggal_selesai" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" value="{{ old('tanggal_selesai') }}" required>
                    @error('tanggal_selesai')
                        <div class="text-red-500 text-sm mt-2">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="jenis" class="block text-sm font-medium text-gray-700">Jenis Cuti/Izin</label>
                    <select name="jenis" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                        <option value="Cuti" {{ old('jenis') == 'Cuti' ? 'selected' : '' }}>Cuti</option>
                        <option value="Izin" {{ old('jenis') == 'Izin' ? 'selected' : '' }}>Izin</option>
                    </select>
                    @error('jenis')
                        <div class="text-red-500 text-sm mt-2">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="alasan" class="block text-sm font-medium text-gray-700">Alasan</label>
                    <textarea name="alasan" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" rows="4">{{ old('alasan') }}</textarea>
                    @error('alasan')
                        <div class="text-red-500 text-sm mt-2">{{ $message }}</div>
                    @enderror
                </div>

                <div class="text-center">
                    <button type="submit" class="w-full py-3 bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">Kirim Pengajuan</button>
                </div>
            </form>
        </div>
    </div>
</x-layout>
