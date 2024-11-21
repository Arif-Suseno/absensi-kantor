<!-- resources/views/jabatan/create.blade.php -->

<x-layout>
    <x-slot:title>
        {{ $title }}
    </x-slot:title>

    <div class="container">
        <h1>{{ $title }}</h1>

        <form action="{{ route('jabatan.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="nama" class="form-label">Nama Jabatan</label>
                <input type="text" name="nama" id="nama" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="deskripsi" class="form-label">Deskripsi</label>
                <textarea name="deskripsi" id="deskripsi" class="form-control"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</x-layout>
