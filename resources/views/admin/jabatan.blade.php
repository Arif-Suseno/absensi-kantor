

<x-layout>
    <x-slot:title>
        {{ $title }}
    </x-slot:title>

    <div class="container">
        <h1>{{ $title }}</h1>

        <!-- Pesan sukses jika ada -->
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <a href="{{ url('/admin/create_jabatan') }}" class="btn btn-primary mb-3">Tambah Jabatan</a>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Deskripsi</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($jabatans as $jabatan)
                    <tr>
                        <td>{{ $jabatan->nama }}</td>
                        <td>{{ $jabatan->deskripsi }}</td>
                        <td>
                            <a href="{{ url('/admin/edit_jabatan', $jabatan->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ url('/jabatan', $jabatan->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-layout>
