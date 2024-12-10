<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <form action="{{ route('data_karyawan.update', $user->id) }}" method="POST" enctype="multipart/form-data"
        class="relative w-11/12 mx-auto mb-8 mt-4 p-2 bg-sky-300 border-2 border-sky-600 shadow-lg shadow-sky-700 rounded-lg sm:w-8/12 md:w-6/12 md:text-lg lg:w-5/12">
        @csrf
        @method('PATCH')
        <a href="{{ route('data_karyawan.index') }}"
            class="flex justify-center items-center absolute -right-2 -top-3 w-6 h-6 bg-gray-200 border border-gray-500 font-bold rounded-full shadow-md shadow-gray-500 md:-right-3 md:-top-3 md:w-8 md:h-8">X</a>
        @if ($errors->any)
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif
        <h1 class="mb-4 mt-2 text-base font-bold text-center md:text-lg">Mengedit Data Karyawan</h1>
        <label for="role"
            class="w-full block mb-3 border border-white rounded-md text-xs md:text-base font-semibold px-1 py-1">Role
            :
            <select name="role" id="role" class="block py-1  input-style md:text-base">
                <option value="Karyawan" {{ $user->role === 'Karyawan' ? 'selected' : '' }}>Karyawan</option>
                <option value="Admin" {{ $user->role === 'Admin' ? 'selected' : '' }}>Admin</option>
            </select>
        </label>
        <label for="jabatan"
            class="w-full block mb-3 border border-white rounded-md text-xs md:text-base font-semibold px-1 py-1">Jabatan:
            <select name="jabatan_id" id="jabatan" class="block py-1 input-style md:text-base ">
                @foreach ($jabatan as $j)
                    <option value="{{ $j->id }}" {{ $user->jabatan_id === $j->id ? 'selected' : '' }}>
                        {{ $j->nama_jabatan }}</option>
                @endforeach
            </select>
        </label>
        <label for="kontrak"
            class="w-full block mb-3 border border-white rounded-md text-xs md:text-base font-semibold px-1 py-1">Kontrak:
            <select name="kontrak_id" id="kontrak" class="block py-1 input-style md:text-base">
                @foreach ($kontrak as $k)
                    <option value="{{ $k->id }}" {{ $user->kontrak_id === $k->id ? 'selected' : '' }}>
                        {{ $k->nama }}</option>
                @endforeach
            </select>
        </label>
        <label for="nama"
            class="w-full block mb-3 border border-white rounded-md text-xs md:text-base font-semibold px-1 py-1">Nama:
            <input type="text" name="nama" id="nama" value="{{ $user->nama }}" required
                class="w-full  block input-style md:text-base">
        </label>
        <label for="email"
            class="w-full block mb-3 border border-white rounded-md text-xs md:text-base font-semibold px-1 py-1">Email:
            <input type="email" name="email" id="email" value="{{ $user->email }}" required
                class="w-full  block input-style md:text-base">
        </label>
        <label for="password"
            class="w-full block mb-3 border border-white rounded-md text-xs md:text-base font-semibold px-1 py-1">Password:
            <input type="password" name="password" id="password" class="w-full  block input-style md:text-base">
        </label>
        <label for="gender"
            class="w-full block mb-3 border border-white rounded-md text-xs md:text-base font-semibold px-1 py-1">Jenis
            Kelamin
            :
            <select name="gender" id="gender" class="block py-1 input-style md:text-base">
                <option value="Laki-laki" {{ $user->gender === 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                <option value="Perempuan" {{ $user->gender === 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
            </select>
        </label>
        <label for="agama"
            class="w-full block mb-3 border border-white rounded-md text-xs md:text-base font-semibold px-1 py-1">Agama
            :
            <select name="agama" id="agama" class="block py-1  input-style md:text-base">
                <option value="Islam" {{ $user->agama === 'Islam' ? 'selected' : '' }}>Islam</option>
                <option value="Kristen" {{ $user->agama === 'Kristen' ? 'selected' : '' }}>Kristen</option>
                <option value="Hindu" {{ $user->agama === 'Hindu' ? 'selected' : '' }}>Hindu</option>
                <option value="Buddha" {{ $user->agama === 'Buddha' ? 'selected' : '' }}>Buddha</option>
                <option value="Katolik" {{ $user->agama === 'Katolik' ? 'selected' : '' }}>Katolik</option>
                <option value="Konghucu" {{ $user->agama === 'Konghucu' ? 'selected' : '' }}>Konghucu</option>
            </select>
        </label>
        <label for="tanggal_lahir"
            class="w-full block mb-3 border border-white rounded-md text-xs md:text-base font-semibold px-1 py-1">Tanggal
            Lahir :
            <input type="date" name="tanggal_lahir" id="tanggal_lahir" value="{{ $user->tanggal_lahir }}"
                class="block input-style md:text-base">
        </label>
        <label for="tempat_lahir"
            class="w-full block mb-3 border border-white rounded-md text-xs md:text-base font-semibold px-1 py-1">Tempat
            Lahir
            :
            <input type="text" name="tempat_lahir" id="tempat_lahir" value="{{ $user->tempat_lahir }}"
                class="w-full  block input-style md:text-base">
        </label>
        <label for="no_hp"
            class="w-full block mb-3 border border-white rounded-md text-xs md:text-base font-semibold px-1 py-1">No.
            Telp :
            <input type="text" name="no_hp" id="no_hp" value="{{ $user->no_hp }}"
                class="w-full  block input-style md:text-base">
        </label>
        <label for="alamat"
            class="w-full block mb-3 border border-white rounded-md text-xs md:text-base font-semibold px-1 py-1">Alamat
            :
            <textarea name="alamat" id="alamat" class="input-style md:text-base w-full h-20">{{ $user->alamat }}</textarea>
        </label>
        <label for="jam_kerja"
            class="w-full block mb-3 border border-white rounded-md text-xs md:text-base font-semibold px-1 py-1">Jam
            Kerja :
            <input type="text" name="jam_kerja" id="jam_kerja" value="{{ $user->jam_kerja }}"
                class="w-full  block input-style md:text-base">
        </label>
        <label for="image"
            class="w-full block mb-3 border border-white rounded-md text-xs md:text-base font-semibold px-1 py-1">Foto
            :
            <input type="file" name="image" id="image" value="{{ $user->image }}"
                onchange="previewImage(event)" class="w-full  block input-style md:text-base">
            {{-- <img src=""  alt="" class="w-20 m-1 aspect-square bg-black"> --}}
        </label>
        <div class="w-2/12 aspect-square mb-4 md:w-3/12 lg:w-2/12" id="imagePreview">
            <img src="{{ asset('storage/' . $user->image) }}" alt="Image user" class="w-full h-full object-cover">
        </div>
        <button type="submit"
            class="w-full block py-2 bg-blue-500 rounded-full font-semibold  text-white shadow-md shadow-sky-700  hover:bg-blue-600">Edit</button>
    </form>
    <div class="batas w-full h-1 "></div>
    <script>
        // Function to preview image
        function previewImage(event) {
            const reader = new FileReader();
            reader.onload = function() {
                const imagePreview = document.getElementById('imagePreview');
                imagePreview.innerHTML = `<img src="${reader.result}" alt="Preview" class="w-full aspect-square">`;
            };
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>
</x-layout>
