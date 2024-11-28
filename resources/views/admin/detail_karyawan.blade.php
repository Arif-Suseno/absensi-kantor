<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    {{-- Card detail data karyawan start --}}
    <div class="container h-screen">
        <section
            class="w-full mx-auto p-2 bg-orange-300 border-2 border-orange-500 rounded-md shadow-lg shadow-orange-400 md:p-4 md:w-8/12 lg:w-6/12">
            <div
                class="w-3/12 aspect-square mx-auto  border border-orange-400 text-center  shadow-lg rounded sm:w-2/12 md:w-3/12 lg:w-2/12">
                <img src="{{ asset('storage/' . $user->image) }}" alt="foto karyawan" class="w-full h-full object-cover">
            </div>
            <div class="flex flex-col gap-1 card-content text-sm">
                <h3><span class="font-medium"> Nama: </span>{{ $user->nama }} </h3>
                <h3><span class="font-medium"> Jenis Kelamin: </span>{{ $user->gender }} </h3>
                <h3><span class="font-medium"> Agama: </span>{{ $user->agama }} </h3>
                <address><span class="font-medium"> Alamat: </span>{{ $user->alamat }} </address>
                <h3><span class="font-medium"> Tanggal Lahir: </span>{{ $user->tanggal_lahir }} </h3>
                <h3><span class="font-medium"> Tempat Lahir: </span>{{ $user->tempat_lahir }} </h3>
                <h3><span class="font-medium"> No. Telepon: </span>{{ $user->no_hp }} </h3>
                <h3><span class="font-medium"> Email: </span>{{ $user->email }} </h3>
                <h3><span class="font-medium"> Tanggal Dibuat:
                    </span>{{ $user->created_at->format('d-m-Y H:i') }}
                </h3>
                <h3><span class="font-medium"> Jam Kerja: </span>{{ $user->jam_kerja }} </h3>
                <h3><span class="font-medium"> Role: </span>{{ $user->role }} </h3>
                <h3><span class="font-medium"> Nama Kontrak: </span>{{ $kontrak->nama }} </h3>
                <h3><span class="font-medium"> Durasi Kontrak:
                    </span>{{ $kontrak->nama === 'Permanen' ? '-' : $kontrak->durasi_kontrak }} </h3>
                <h3><span class="font-medium"> Tanggal Mulai: </span>{{ $kontrak->tanggal_mulai }}
                </h3>
                <h3><span class="font-medium"> Tanggal Selesai: </span>{{ $kontrak->tanggal_selesai }}
                </h3>
                <h3><span class="font-medium"> Jabatan: </span>{{ $jabatan->nama_jabatan }} </h3>
            </div>

            {{-- Link untuk Edit dan Hapus --}}
            <div class="card-links flex justify-between items-center mt-4">
                <div class="card-link">
                    <a href="{{ url('data_karyawan/' . $user->id . '/edit') }}"
                        class="px-2 py-1 bg-blue-400 border border-blue-600 rounded-md text-white shadow shadow-blue-600 hover:bg-blue-500 hover:shadow-blue-600">Edit</a>
                    <a href="{{ url('data_karyawan/' . $user->id . '/delete') }}"
                        class="px-2 py-1 bg-red-400 border border-red-600 rounded-md text-white shadow shadow-red-600 hover:bg-red-500 hover:shadow-red-600">Hapus</a>
                </div>
                <div class="page-back">
                    <a href="/data_karyawan"
                        class="px-2 py-1 bg-white border border-black rounded-md shadow hover:bg-slate-200">Kembali</a>
                </div>
            </div>
        </section>
        {{-- card detail data karyawan end --}}
    </div>
</x-layout>
