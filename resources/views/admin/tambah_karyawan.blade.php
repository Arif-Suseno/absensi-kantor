<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <form method="post"
        class="relative w-full mx-auto mb-8 mt-4 p-2  bg-sky-300 border-2 border-sky-600 shadow-lg shadow-sky-700 rounded-lg md:w-6/12 lg:w-5/12">
        @csrf
        <a href="{{ url('/data_karyawan') }}"
            class="flex justify-center items-center absolute -right-2 -top-3 w-6 h-6 bg-gray-200 border border-gray-500 font-bold rounded-full shadow-md shadow-gray-500 md:-right-3 md:-top-3 md:w-8 md:h-8">X</a>
        <h1 class="mb-4 mt-2 text-base font-bold text-center md:text-lg">Menambah Data Karyawan</h1>
        <label for="role"
            class="w-full block mb-3 border border-white rounded-md text-xs md:text-base font-semibold px-1 py-1">Role
            :
            <select name="role" id="role" class="block py-1  input-style md:text-base">
                <option value="Karyawan">Karyawan</option>
                <option value="Admin">Admin</option>
            </select>
        </label>
        <label for="jabatan"
            class="w-full block mb-3 border border-white rounded-md text-xs md:text-base font-semibold px-1 py-1">Jabatan:
            <select name="jabatan_id" id="jabatan" class="block py-1 input-style md:text-base ">
                @foreach ($jabatan as $j)
                    <option value="{{ $j->id }}">{{ $j->nama_jabatan }}</option>
                @endforeach
            </select>
        </label>
        <label for="kontrak"
            class="w-full block mb-3 border border-white rounded-md text-xs md:text-base font-semibold px-1 py-1">Kontrak:
            <select name="kontrak_id" id="kontrak" class="block input-style md:text-base">
                @foreach ($kontrak as $k)
                    <option value="{{ $k->id }}">{{ $k->nama }}</option>
                @endforeach
            </select>
        </label>
        <label for="nama"
            class="w-full block mb-3 border border-white rounded-md text-xs md:text-base font-semibold px-1 py-1">Nama:
            <input type="text" name="nama" id="nama" value="{{ old('nama') }}"
                class="w-full block input-style md:text-base">
            @error('nama')
                <div class="text-red-500 mt-1 text-sm font-medium">{{ $message }}</div>
            @enderror
        </label>
        <label for="gender"
            class="w-full block mb-3 border border-white rounded-md text-xs md:text-base font-semibold px-1 py-1">Jenis
            Kelamin
            :
            <select name="gender" id="gender" class="block py-1  input-style md:text-base">
                <option value="Laki-laki">Laki-laki</option>
                <option value="Perempuan">Perempuan</option>
            </select>
        </label>
        <label for="email"
            class="w-full block mb-3 border border-white rounded-md text-xs md:text-base font-semibold px-1 py-1">Email:
            <input type="email" name="email" id="email" value="{{ old('email') }}"
                class="w-full block input-style md:text-base">
            @error('email')
                <div class="text-red-500 mt-1 text-sm font-medium">{{ $message }}</div>
            @enderror
        </label>
        <label for="password"
            class="w-full block mb-3 border border-white rounded-md text-xs md:text-base font-semibold px-1 py-1">Password:
            <input type="password" name="password" id="password" class="w-full block input-style md:text-base">
            @error('password')
                <div class="text-red-500 mt-1 text-sm font-medium">{{ $message }}</div>
            @enderror
        </label>

        <label for="jam_kerja"
            class="w-full block mb-3 border border-white rounded-md text-xs md:text-base font-semibold px-1 py-1">Jam
            Kerja:
            <input type="text" name="jam_kerja" id="jam_kerja" value="{{ old('jam_kerja') }}"
                class="w-full block input-style md:text-base">
            @error('jam_kerja')
                <div class="text-red-500 mt-1 text-sm font-medium">{{ $message }}</div>
            @enderror
        </label>
        <button type="submit"
            class="w-full block py-2 bg-blue-500 rounded-full font-semibold  text-white shadow-md shadow-sky-700  hover:bg-blue-600">Tambah</button>
    </form>
    <div class="batas w-full h-1 "></div>
</x-layout>
