<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    @auth
        <div class="h-screen">
            <div class="flex items-center justify-center min-h-auto border-l-inherit">
                <div class="bg-white shadow-lg rounded-lg w-full max-w-md p-6">
                    <div class="text-center mb-6">
                        <h2 class="text-2xl font-bold text-gray-700">Profil</h2>
                        <p class="text-sm text-gray-500">Detail Informasi Anda</p>
                    </div>
                    <!-- Profil picture -->
                    <div class="flex justify-center mb-4">
                        <a href="#image-full" class="image-detail ">
                            <img id="foto"
                                src="{{ $user->image ? asset('storage/' . $user->image) : asset('images/profile_default.png') }}"
                                alt="Profile Picture" class="rounded-full w-24 h-24 shadow-lg">
                        </a>
                        {{-- Image full --}}
                        <div id="image-full"
                            class="hidden opacity-0 target:opacity-100  target:block  fixed top-0 right-0 bottom-0 left-0 bg-black bg-opacity-80">
                            <a href="#"
                                class="flex items-center justify-center absolute top-12 right-10 w-6 z-20 aspect-square rounded-full bg-white text-center md:right-40 lg:right-60 lg:w-8 xl:right-96 font-bold">X</a>
                            <img src="{{ $user->image ? asset('storage/' . $user->image) : asset('images/profile_default.png') }}"
                                alt="Profile Picture"
                                class="absolute w-8/12 top-16 left-14 aspect-square border-2 border-gray-500 shadow-xl shadow-gray-800 bg-white rounded-md md:left-52 md:w-6/12 lg:left-64 xl:w-5/12 xl:left-96">
                        </div>
                    </div>
                    <!-- Basic Profile Information -->
                    <div class="text-center space-y-2">
                        <div class="text-xl font-semibold text-gray-800">{{ $user->nama }}</div>
                    </div>
                    <!-- Toggle Button for Edit -->
                    @if (session('message'))
                        <div class="w-full p-2 bg-green-500 rounded-sm">{{ session('message') }}</div>
                    @endif
                    <div class="mt-6 flex justify-center">
                        <button onclick="toggleEdit()"
                            class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 focus:outline-none">
                            Edit
                        </button>
                    </div>
                    {{-- Edit profile start --}}
                    <div id="edit" class="hidden">
                        <form action="{{ route('fitur-update-profile') }}" method="POST" enctype="multipart/form-data"
                            class="flex flex-col gap-2">
                            @csrf
                            @method('PATCH')
                            <div>
                                <label class="block text-sm font-medium text-gray-600">Nama :</label>
                                <input type="text" name="nama" value="{{ $user->nama }}"
                                    class="w-full bg-gray-100 px-4 py-2 rounded text-gray-700">
                                @error('nama')
                                    <div class="text-red-500">{{ $message }}</div>
                                @enderror
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-600">Jenis Kelamin :</label>
                                <select name="gender" id="gender"
                                    class="w-full bg-gray-100 px-4 py-2 rounded text-gray-700 md:text-base">
                                    <option value="Laki-laki" {{ $user->gender === 'Laki-laki' ? 'selected' : '' }}>
                                        Laki-laki</option>
                                    <option value="Perempuan" {{ $user->gender === 'Perempuan' ? 'selected' : '' }}>
                                        Perempuan</option>
                                </select>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-600">Agama :</label>
                                <select name="agama" id="agama"
                                    class="w-full bg-gray-100 px-4 py-2 rounded text-gray-700 md:text-base">
                                    <option value="Islam" {{ $user->agama === 'Islam' ? 'selected' : '' }}>Islam
                                    </option>
                                    <option value="Kristen" {{ $user->agama === 'Kristen' ? 'selected' : '' }}>Kristen
                                    </option>
                                    <option value="Hindu" {{ $user->agama === 'Hindu' ? 'selected' : '' }}>Hindu
                                    </option>
                                    <option value="Buddha" {{ $user->agama === 'Buddha' ? 'selected' : '' }}>Buddha
                                    </option>
                                    <option value="Katolik" {{ $user->agama === 'Katolik' ? 'selected' : '' }}>Katolik
                                    </option>
                                    <option value="Konghucu" {{ $user->agama === 'Konghucu' ? 'selected' : '' }}>
                                        Konghucu
                                    </option>
                                </select>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-600">Tempat Lahir :</label>
                                <input type="text" name="tempat_lahir" value="{{ $user->tempat_lahir }}"
                                    class="w-full bg-gray-100 px-4 py-2 rounded text-gray-700">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-600">Tanggal Lahir :</label>
                                <input type="date" name="tanggal_lahir" value="{{ $user->tanggal_lahir }}"
                                    class="w-full bg-gray-100 px-4 py-2 rounded text-gray-700">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-600">Alamat :</label>
                                <textarea name="alamat" class="w-full bg-gray-100 px-4 py-2 rounded text-gray-700">{{ $user->alamat }}</textarea>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-600">Nomor Handphone :</label>
                                <input type="text" name="no_hp" value="{{ $user->no_hp }}"
                                    class="w-full bg-gray-100 px-4 py-2 rounded text-gray-700">
                                @error('no_hp')
                                    <div class="text-red-500">{{ $message }}</div>
                                @enderror
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-600">Foto :</label>
                                <input type="file" name="image" id="image" value="{{ $user->image }}"
                                    onchange="previewImage(event)"
                                    class="w-full bg-gray-100 px-4 py-2 rounded text-gray-700 md:text-base">
                                @error('image')
                                    <div class="text-red-500">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="w-2/12 aspect-square mb-4 md:w-3/12 lg:w-2/12" id="imagePreview">
                                <img src="{{ asset('storage/' . $user->image) }}" alt="Image user"
                                    class="w-full h-full object-cover">
                            </div>

                            <button type="submit" class="my-2 py-1 px-2 bg-blue-500 rounded text-white">Save</button>
                        </form>
                    </div>
                    {{-- Edit prifile end --}}
                    <!-- Toggle Button for Details -->
                    <div class="mt-4 flex justify-center">
                        <button onclick="toggleDetails()"
                            class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 focus:outline-none">
                            Tampilkan Detail
                        </button>
                    </div>
                    <!-- Profil Informasi -->
                    <div class="hidden" id="detail-info">
                        <div class="mt-6 flex flex-col gap-2">
                            <div>
                                <label class="block text-sm font-medium text-gray-600">Email</label>
                                <div class="bg-gray-100 px-4 py-2 rounded text-gray-700">{{ $user->email }}</div>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-600">Gender</label>
                                <div class="bg-gray-100 px-4 py-2 rounded text-gray-700">{{ $user->gender }}</div>
                            </div>
                            <div>

                                <label class="block text-sm font-medium text-gray-600">Agama</label>
                                <div class="bg-gray-100 px-4 py-2 rounded text-gray-700">{{ $user->agama }}</div>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-600">Tempat Lahir</label>
                                <div class="bg-gray-100 px-4 py-2 rounded text-gray-700">{{ $user->tempat_lahir }}
                                </div>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-600">Tanggal Lahir</label>
                                <div class="bg-gray-100 px-4 py-2 rounded text-gray-700">{{ $user->tanggal_lahir }}
                                </div>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-600">Alamat</label>
                                <div class="bg-gray-100 px-4 py-2 rounded text-gray-700">{{ $user->alamat }}</div>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-600">Nomor Handphone</label>
                                <div class="bg-gray-100 px-4 py-2 rounded text-gray-700">{{ $user->no_hp }}</div>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-600">Jabatan</label>
                                <div class="bg-gray-100 px-4 py-2 rounded text-gray-700">
                                    {{ $user->jabatan->nama_jabatan }}</div>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-600">Kontrak</label>
                                <div class="bg-gray-100 px-4 py-2 rounded text-gray-700">
                                    {{ $user->kontrak->nama }}</div>
                            </div>
                        </div>
                    @endauth
                    <script>
                        const imageDetail = document.querySelector('.image-detail');
                        const imageBig = document.querySelector('.image-big');
                        imageDetail.addEventListener('click', () => {
                            imageBig.classList.toggle('hidden');
                        })

                        function toggleDetails() {
                            const details = document.getElementById('detail-info');
                            details.classList.toggle('hidden');
                        }

                        function toggleEdit() {
                            const edit = document.getElementById('edit');
                            edit.classList.toggle('hidden');
                        }
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
