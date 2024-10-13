@extends('layouts.app')
@section('content')
<div class="container mt-4">
    <h1 class="mb-4">Daftar Pengguna</h1>
    <a href="{{ route ('user.create') }}" class="btn btn-primary mb-3">+ Tambah Pengguna Baru</a>
    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead class="thead-light">
                <tr class="table-primary text-center">
                    <th>ID</th>
                    <th>Nama</th>
                    <th>NPM</th>
                    <th>Kelas</th>
                    <th>Foto</th>
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
                            @if($user['foto'])
                                <img src="{{ asset($user['foto']) }}" alt="User Photo" width="100" >
                            @endif
                        </td>
                        <td>
                            <div class="d-flex justify-content-center">
                                <a href="{{ route('user.show', $user['id'])}}" class="btn btn-primary btn-sm">View</a>
                                <a href="{{ route('user.edit', $user['id']) }}" class="btn btn-sm btn-warning mx-2">Edit</a>
                                <form action="{{ route('user.destroy', $user['id']) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger mx-0.5" onclick="return confirm('Apakah Anda yakin ingin menghapus pengguna ini?')">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection