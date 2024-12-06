<x-layout>
    <x-slot:title>
        {{ $title }}
    </x-slot:title>

    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold text-gray-800 mb-6 text-center">{{ $title }}</h1>

        <form action="{{ route('jabatan.update', $jabatan->id) }}" method="POST" class="bg-white p-6 rounded-lg shadow-md max-w-lg mx-auto">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="nama" class="block text-sm font-medium text-gray-700 mb-2">Nama Jabatan</label>
                <input 
                    type="text" 
                    name="nama_jabatan" 
                    id="nama" 
                    value="{{ old('nama', $jabatan->nama_jabatan) }}" 
                    class="block w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                    placeholder="Masukkan nama jabatan" 
                    required>
            </div>
            <div class="mb-4">
                <label for="deskripsi" class="block text-sm font-medium text-gray-700 mb-2">Deskripsi</label>
                <textarea 
                    name="deskripsi" 
                    id="deskripsi" 
                    class="block w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                    rows="4" 
                    placeholder="Masukkan deskripsi">{{ old('deskripsi', $jabatan->deskripsi) }}</textarea>
            </div>
            <button type="submit" class="w-full bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                Update
            </button>
        </form>
    </div>
</x-layout>
