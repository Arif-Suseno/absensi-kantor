<!-- resources/views/jabatan/edit.blade.php -->

<x-layout>
    <x-slot:title>
        {{ $title }}
    </x-slot:title>

    <div class="container">
        <h1>{{ $title }}</h1>

        <form action="{{ route('jabatan.update', $jabatan->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="nama" class="form-label">Nama Jabatan</label>
                <input type="text" name="nama" id="nama" class="form-control" value="{{ $jabatan->nama }}" required>
            </div>
            <div class="mb-3">
                <label for="deskripsi" class="form-label">Deskripsi</label>
                <textarea name="deskripsi" id="deskripsi" class="form-control">{{ $jabatan->deskripsi }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</x-layout>
