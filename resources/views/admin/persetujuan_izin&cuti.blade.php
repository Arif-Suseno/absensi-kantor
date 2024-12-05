<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <div class="container mx-auto px-4 py-6">
        <h1 class="text-2xl font-bold mb-6">Persetujuan Izin & Cuti</h1>

        <div class="overflow-x-auto bg-white shadow rounded-lg">
            <table class="min-w-full border-collapse border border-gray-200">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700 border-b">No</th>
                        <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700 border-b">Nama Karyawan</th>
                        <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700 border-b">Tanggal Pengajuan</th>
                        <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700 border-b">Jenis</th>
                        <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700 border-b">Alasan</th>
                        <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700 border-b">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pengajuan as $index => $izin)
                    <tr class="{{ $loop->odd ? 'bg-gray-50' : 'bg-white' }}">
                        <td class="px-6 py-4 text-sm text-gray-600 border-b">{{ $index + 1 }}</td>
                        <td class="px-6 py-4 text-sm text-gray-600 border-b">{{ $izin->user->name }}</td>
                        <td class="px-6 py-4 text-sm text-gray-600 border-b">{{ $izin->created_at->format('d-m-Y') }}</td>
                        <td class="px-6 py-4 text-sm text-gray-600 border-b">{{ $izin->jenis }}</td>
                        <td class="px-6 py-4 text-sm text-gray-600 border-b">{{ $izin->alasan }}</td>
                        <td class="px-6 py-4 text-sm text-gray-600 border-b">
                            <form action="{{ route('admin.persetujuan.izin', $izin->id) }}" method="POST" class="inline-block">
                                @csrf
                                @method('PATCH')
                                <input type="hidden" name="status" value="Disetujui">
                                <button type="submit" class="px-4 py-2 bg-green-500 text-white rounded hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-400">Setujui</button>
                            </form>
                            <form action="{{ route('admin.persetujuan.izin', $izin->id) }}" method="POST" class="inline-block">
                                @csrf
                                @method('PATCH')
                                <input type="hidden" name="status" value="Ditolak">
                                <button type="submit" class="px-4 py-2 bg-red-500 text-white rounded hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-400">Tolak</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-layout>