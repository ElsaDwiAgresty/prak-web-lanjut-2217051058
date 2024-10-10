@extends('layouts.app')
@section('content')
<div class="container mt-4">

    <h1 class="mb-4">Daftar Pengguna</h1>
    <a href="{{ route ('user.create') }}" class="btn btn-primary mb-3">Tambah Pengguna Baru</a>
    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead class="thead-light">
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>NPM</th>
                    <th>Kelas</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user['id'] }}</td>
                        <td>{{ $user['nama'] }}</td>
                        <td>{{ $user['npm'] }}</td>
                        <td>{{ $user['nama_kelas'] }}</td>
                        <td>
                            <a href="{{ route('user.edit', $user['id']) }}" class="btn btn-sm btn-primary">Edit</a>
                            <form action="{{ route('user.destroy', $user['id']) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus pengguna ini?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection