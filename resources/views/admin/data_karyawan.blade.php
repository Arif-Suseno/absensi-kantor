<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>

    <div class="h-screen">
        {{-- Link ke tambah karyawan --}}
        <div class="flex justify-between items-center my-4 md:mb-6">
            <a href="{{ route('data_karyawan.create') }}"
                class="p-1 bg-green-400 border-2 border-green-950 rounded-md font-medium text-xs shadow-md shadow-green-700 hover:bg-green-500 md:text-base lg:p-2">Tambah
                Karyawan</a>
        </div>
        {{-- Respon --}}
        @if (session('success'))
            <div
                class="p-1 my-2 bg-sky-400 font-semibold text-xs border border-black rounded-md shadow-md shadow-sky-700 md:text-base lg:p-2">
                {{ session('success') }}
            </div>
        @endif

        {{-- Form search --}}
        <form action="" method="GET" class="flex items-center space-x-3 mb-4 ">
            <input type="search" name="search" id="search" value="{{ $search }}" autocomplete="off"
                class="w-8/12 border border-gray-300 shadow-md shadow-gray-500 rounded-full px-2 py-1 focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-red-500 transition duration-300 sm:w-9/12 md:w-10/12 lg:w-11/12"
                placeholder="Cari sesuatu...">
            <button type="submit"
                class="bg-red-500 text-white px-2 py-2 rounded-full hover:bg-red-600 focus:ring-2 focus:ring-red-300 focus:ring-offset-1 transition duration-300">
                🔎 Cari
            </button>
        </form>
        {{-- Membuat tabel data karyawan --}}
        <div class="overflow-x-auto">
            <table
                class="table-auto w-full border border-collapse border-slate-400 text-xs shadow-md shadow-orange-200 md:text-sm lg:text-base xl:text-base">
                <thead>
                    <tr>
                        <th class="border border-slate-500 bg-orange-400">No</th>
                        <th class="border border-slate-500 bg-orange-400">Nama</th>
                        <th class="border border-slate-500 bg-orange-400">Role</th>
                        <th class="border border-slate-500 bg-orange-400 ">Email</th>
                        <th class="border border-slate-500 bg-orange-400 ">Jenis Kelamin</th>
                        <th class="border border-slate-500 bg-orange-400 ">Kontrak</th>
                        <th class="border border-slate-500 bg-orange-400 ">Jabatan</th>
                        <th class="border border-slate-500 bg-orange-400" colspan="3">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($users->isEmpty())
                        <div
                            class="flex justify-center items-center w-full h-8 my-8 mx-auto bg-white font-semibold text-2xl">
                            🚫
                            Tidak ada data karyawan
                        </div>
                    @else
                        @foreach ($users as $index => $user)
                            <tr>
                                {{-- Mengambil data users dari model --}}
                                <td class="border border-slate-500 bg-orange-200 p-1">
                                    {{ ($users->currentPage() - 1) * $users->perPage() + $loop->iteration }}
                                <td class="border border-slate-500 bg-orange-200 p-1">{{ $user->nama }}</td>
                                <td class="border border-slate-500 bg-orange-200 p-1">{{ $user->role }}</td>
                                <td class="border border-slate-500 bg-orange-200 p-1 ">
                                    {{ $user->email }}</td>
                                <td class=" border border-slate-500 bg-orange-200 p-1  ">
                                    {{ $user->gender }}
                                </td>
                                <td class=" border border-slate-500 bg-orange-200 p-1  ">
                                    {{ $user->kontrak->nama }}
                                </td>
                                <td class=" border border-slate-500 bg-orange-200 p-1  ">
                                    {{ $user->jabatan->nama_jabatan }}
                                </td>
                                <td class="border-b border-slate-400 bg-orange-200 p-2 text-center md:p-1 lg:p-2">
                                    <a href="{{ route('data_karyawan.show', $user->id) }}"
                                        class="p-1 bg-cyan-400 border border-cyan-500 rounded-md text-white shadow shadow-cyan-600  hover:bg-cyan-600">Detail</a>
                                </td>
                                <td class=" border-b border-slate-400 bg-orange-200 p-2 text-center md:p-1 lg:p-2 ">
                                    <a href="{{ route('data_karyawan.edit', $user->id) }}"
                                        class="p-1 bg-blue-400 border border-blue-600 rounded-md text-white shadow shadow-blue-600 hover:bg-blue-500 hover:shadow-blue-600">Edit</a>
                                </td>
                                <td class="border-b border-slate-400 bg-orange-200 p-2 text-center md:p-1 lg:p-2">
                                    <form action="{{ route('data_karyawan.destroy', $user->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button
                                            class="p-1 bg-red-400 border border-red-500 rounded-md  text-white shadow shadow-red-600 hover:bg-red-600">Hapus</button>
                                    </form>
                                    {{-- <a href="{{ route('data_karyawan.destroy', $user->id) }}"
                                    class="p-1 bg-red-400 border border-red-500 rounded-md  text-white shadow shadow-red-600 hover:bg-red-600 ">Hapus</a> --}}
                                </td>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
        {{-- link paginate --}}
        <div class="my-4">
            {{ $users->appends(['search' => $search])->links() }}
        </div>
    </div>
</x-layout>
