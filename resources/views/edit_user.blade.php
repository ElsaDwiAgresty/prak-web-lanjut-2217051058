<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Edit User</title>
</head>

<body > 

@extends('layouts.app')

@section('content')
    <h1 class="text-center text-3xl mb-6 font-bold mt-4">Edit Biodata</h1>
    <form action="{{ route('user.update', $user['id']) }}" method="POST" enctype="multipart/form-data" class="flex justify-center">
        @csrf
        @method('PUT')
        <div class="bg-slate-600 h-auto w-96 p-6 rounded-lg"> <!-- Background warna slate -->
            
            <div class="mt-4 flex flex-col items-start">
                <label for="nama" class="text-white font-bold text-lg mb-2">Nama : </label>
                <input type="text" id="nama" name="nama" class="rounded-lg h-8 w-full px-2" value="{{ old('nama', $user->nama) }}">
                @foreach($errors->get('nama') as $msg)
                    <p class="text-red-500 text-sm font-semibold mt-1">{{ $msg }}</p>
                @endforeach
            </div>

            <div class="mt-4 flex flex-col items-start">
                <label for="smt" class="text-white font-bold text-lg mb-2">Semester : </label>
                <input type="number" id="smt" name="smt" class="rounded-lg h-8 w-full px-2" min="1" max="14" required value="{{ old('smt', $user->smt) }}">
                @foreach($errors->get('smt') as $msg)
                    <p class="text-red-500 text-sm font-semibold mt-1">{{ $msg }}</p>
                @endforeach
            </div>

            <div>
                <label for="fakultas_id" class="text-white font-bold text-lg mb-2">Fakultas:</label>
                <select name="fakultas_id" id="fakultas_id" class="rounded-lg h-8 w-full px-2" required>
                    @foreach($fakultas as $f)
                        <option value="{{ $f->id }}" {{ old('fakultas_id', $user->fakultas_id) == $f->id ? 'selected' : '' }}>
                            {{ $f->nama_fakultas }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div>
                <label for="jurusan" class="text-white font-bold text-lg mb-2">Jurusan:</label>
                <select name="jurusan" id="jurusan" class="rounded-lg h-8 w-full px-2" required>
                    <option value="fisika" {{ old('jurusan', $user->jurusan) == 'fisika' ? 'selected' : '' }}>Fisika</option>
                    <option value="kimia" {{ old('jurusan', $user->jurusan) == 'kimia' ? 'selected' : '' }}>Kimia</option>
                    <option value="biologi" {{ old('jurusan', $user->jurusan) == 'biologi' ? 'selected' : '' }}>Biologi</option>
                    <option value="matematika" {{ old('jurusan', $user->jurusan) == 'matematika' ? 'selected' : '' }}>Matematika</option>
                    <option value="ilmu komputer" {{ old('jurusan', $user->jurusan) == 'ilmu komputer' ? 'selected' : '' }}>Ilmu Komputer</option>
                </select>
            </div>

            <div class="mt-4 flex flex-col items-start">
                <label for="kelas_id" class="text-white font-bold text-lg mb-2">Kelas : </label>
                <select name="kelas_id" id="kelas_id" class="rounded-lg h-8 w-full px-2" required>
                    @foreach($kelas as $kelasItem)
                    <option value="{{ $kelasItem->id }}"
                        {{ $kelasItem->id == $user->kelas_id ? 'selected' : '' }}>
                        {{ $kelasItem->nama_kelas }}
                    </option>
                    @endforeach
                </select>
                @foreach($errors->get('kelas_id') as $msg)
                    <p class="text-red-500 text-sm font-semibold mt-1">{{ $msg }}</p>
                @endforeach
            </div>

            <div class="mt-4 flex flex-col items-start">
                <label for="foto" class="text-white font-bold text-lg mb-2">Foto:</label><br>
                <input type="file" id="foto" name="foto" class="text-white"><br><br>
                @if($user->foto)
                    <img src="{{ asset('storage/uploads/' . $user->foto) }}" alt="User Photo" width="100" class="mt-2">
                @endif
            </div>

            <div class="mt-6 flex justify-end">
                <input type="submit" value="Update" class="bg-blue-500 text-white px-4 py-2 rounded-lg cursor-pointer hover:bg-blue-600">
            </div>
        </div>
    </form>
@endsection

</body>

</html>
