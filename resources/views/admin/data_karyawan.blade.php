<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <div class="my-4 md:mb-6">
        <a href="{{ route('Tambah Karyawan') }}"
            class="p-1 bg-green-400 border-2 border-green-950 rounded-md font-medium text-xs shadow-md shadow-green-700 hover:bg-green-500 md:text-base lg:p-2">Tambah
            Karyawan</a>
    </div>
    @if (session('success'))
        <div
            class="p-1 my-2 bg-sky-400 font-semibold text-xs border border-black rounded-md shadow-md shadow-sky-700 md:text-base lg:p-2">
            {{ session('success') }}
        </div>
    @endif
    {{-- Membuat tabel data karyawan --}}
    <table
        class="table-auto w-full border border-collapse border-slate-400 text-xs shadow-md shadow-orange-200 md:text-sm lg:text-base xl:text-base">


        {{-- Caption start --}}
        <caption class="caption-bottom py-2">
            Tabel 1.1 Data karyawan
        </caption>
        {{-- Caption end --}}
        {{-- Bagian Head table start --}}
        <thead>
            <tr>
                <th class="border border-slate-500 bg-orange-400">No</th>
                <th class="border border-slate-500 bg-orange-400">Nama</th>
                <th class="border border-slate-500 bg-orange-400">Role</th>
                <th class="border border-slate-500 bg-orange-400 hidden md:table-cell">Email</th>
                <th class="border border-slate-500 bg-orange-400 hidden md:table-cell">Jenis Kelamin</th>
                <th class="border border-slate-500 bg-orange-400 hidden md:table-cell">Kontrak</th>
                <th class="border border-slate-500 bg-orange-400 hidden md:table-cell">Jabatan</th>
                <th class="border border-slate-500 bg-orange-400" colspan="3">Aksi</th>
            </tr>
        </thead>
        {{-- Bagian Head table end --}}
        {{-- Bagian Body table start --}}
        <tbody>
            @if ($users->isEmpty())
                <div class="flex justify-center items-center w-full h-8 my-8 mx-auto bg-white font-semibold text-2xl">🚫
                    Tidak
                    ada data
                    karyawan
                </div>
            @else
                @foreach ($users as $index => $user)
                    <tr>
                        {{-- Mengambil data users dari model --}}
                        <td class="border border-slate-500 bg-orange-200 p-1">{{ ++$index }}</td>
                        <td class="border border-slate-500 bg-orange-200 p-1">{{ $user->nama }}</td>
                        <td class="border border-slate-500 bg-orange-200 p-1">{{ $user->role }}</td>
                        <td class="border border-slate-500 bg-orange-200 p-1 hidden md:table-cell">
                            {{ $user->email }}</td>
                        <td class=" border border-slate-500 bg-orange-200 p-1  hidden md:table-cell">{{ $user->gender }}
                        </td>
                        <td class=" border border-slate-500 bg-orange-200 p-1  hidden md:table-cell">
                            {{ $user->kontrak->nama }}
                        </td>
                        <td class=" border border-slate-500 bg-orange-200 p-1  hidden md:table-cell">
                            {{ $user->jabatan->nama_jabatan }}
                        </td>
                        <td class="border-b border-slate-400 bg-orange-200 p-2 text-center md:p-1 lg:p-2">
                            <a href="{{ url('data_karyawan/' . $user->id . '/detail') }}"
                                class="p-1 bg-cyan-400 border border-cyan-500 rounded-md text-white shadow shadow-cyan-600  hover:bg-cyan-600">Detail</a>
                        </td>
                        <td
                            class="hidden border-b border-slate-400 bg-orange-200 p-2 text-center md:p-1 lg:p-2 md:table-cell">
                            <a href="{{ url('data_karyawan/' . $user->id . '/edit') }}"
                                class="p-1 bg-blue-400 border border-blue-600 rounded-md text-white shadow shadow-blue-600 hover:bg-blue-500 hover:shadow-blue-600">Edit</a>
                        </td>
                        <td class="border-b border-slate-400 bg-orange-200 p-2 text-center md:p-1 lg:p-2">
                            <a href="{{ url('data_karyawan/' . $user->id . '/delete') }}"
                                class="p-1 bg-red-400 border border-red-500 rounded-md  text-white shadow shadow-red-600 hover:bg-red-600 ">Hapus</a>
                        </td>
                        </td>
                    </tr>
                @endforeach
            @endif
        </tbody>
        {{-- Bagian Body table end --}}

    </table>
</x-layout>
