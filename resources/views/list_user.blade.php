@extends('layouts.app')
@section('content')
<div class="container mt-5">
<h1 class="text-center mb-4 text-4xl font-bold text-slate-800">Daftar Pengguna</h1>
    <div class="d-flex justify-content-between align-items-center mb-4">
        <a href="{{ route('user.create') }}" class="btn btn-success">
            <i class="fas fa-user-plus"></i> Tambah Pengguna Baru
        </a>
    </div>

    <div class="table-responsive">
        <table class="table table-hover table-bordered text-center">
            <thead class="thead-light text-white">
                <tr class="table-secondary">
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Semester</th>
                    <th>Kelas</th>
                    <th>Fakultas</th>
                    <th>Jurusan</th>
                    <th>Foto</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user['id'] }}</td>
                        <td>{{ $user['nama'] }}</td>
                        <td>{{ $user['smt'] }}</td>
                        <td>{{ $user['nama_kelas'] }}</td>
                        <td>{{ $user['nama_fakultas'] }}</td>
                        <td>{{ $user['jurusan'] }}</td>
                        <td>
                            @if($user['foto'])
                                <img src="{{ asset('storage/uploads/' . $user['foto']) }}" alt="User Photo" class="img-thumbnail" width="100">
                            @else
                                <span class="text-muted">Tidak ada foto</span>
                            @endif
                        </td>
                        <td>
                            <div class="btn-group">
                                <a href="{{ route('user.show', $user['id']) }}" class="btn btn-info btn-sm" title="View">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="{{ route('user.edit', $user['id']) }}" class="btn btn-warning btn-sm mx-1" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('user.destroy', $user['id']) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" title="Delete" onclick="return confirm('Apakah Anda yakin ingin menghapus pengguna ini?')">
                                        <i class="fas fa-trash"></i>
                                    </button>
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
