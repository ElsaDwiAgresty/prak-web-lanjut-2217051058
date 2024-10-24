<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Isi Biodata</title>
</head>

<body class="bg-slate-800"> <!-- Menggunakan warna slate untuk latar belakang -->

@extends('layouts.app')

@section('content')
    <div class="container mx-auto mt-10">
        <h1 class="text-center text-3xl mb-6 font-bold text-white">Isi Biodata</h1>
        <form action="{{ route('user.store') }}" method="POST" enctype="multipart/form-data" class="flex justify-center">
            @csrf
            <div class="bg-slate-400 shadow-lg h-auto w-full max-w-lg p-8 rounded-lg"> <!-- Menggunakan slate untuk form -->
                
                <div class="mt-4 flex flex-col">
                    <label for="nama" class="text-gray-800 font-bold mb-2 flex items-center">
                        <i class="fas fa-user mr-2"></i> Nama:
                    </label>
                    <input type="text" id="nama" name="nama" class="rounded-lg h-10 w-full px-3 border border-gray-300 focus:outline-none focus:ring focus:ring-blue-300" required>
                    @foreach($errors->get('nama') as $msg)
                        <p class="text-red-500 text-sm font-semibold mt-1">{{ $msg }}</p>
                    @endforeach
                </div>

                <div class="mt-4 flex flex-col">
                    <label for="smt" class="text-gray-800 font-bold mb-2 flex items-center">
                        <i class="fas fa-graduation-cap mr-2"></i> Semester:
                    </label>
                    <input type="number" id="smt" name="smt" class="rounded-lg h-10 w-full px-3 border border-gray-300 focus:outline-none focus:ring focus:ring-blue-300" min="1" max="14" required>
                    @foreach($errors->get('smt') as $msg)
                        <p class="text-red-500 text-sm font-semibold mt-1">{{ $msg }}</p>
                    @endforeach
                </div>

                <div class="mt-4 flex flex-col">
                    <label for="kelas_id" class="text-gray-800 font-bold mb-2 flex items-center">
                        <i class="fas fa-users mr-2"></i> Kelas:
                    </label>
                    <select name="kelas_id" id="kelas_id" class="rounded-lg h-10 w-full px-3 border border-gray-300 focus:outline-none focus:ring focus:ring-blue-300" required>
                        @foreach($kelas as $kelasItem)
                        <option value="{{$kelasItem->id}}">{{$kelasItem->nama_kelas}}</option>
                        @endforeach
                    </select>
                    @foreach($errors->get('kelas_id') as $msg)
                        <p class="text-red-500 text-sm font-semibold mt-1">{{ $msg }}</p>
                    @endforeach
                </div>

                <div class="mt-4 flex flex-col">
                    <label for="fakultas_id" class="text-gray-800 font-bold mb-2 flex items-center">
                        <i class="fas fa-building mr-2"></i> Fakultas:
                    </label>
                    <select name="fakultas_id" id="fakultas_id" class="rounded-lg h-10 w-full px-3 border border-gray-300 focus:outline-none focus:ring focus:ring-blue-300" required>
                        @foreach($fakultas as $f)
                            <option value="{{ $f->id }}">{{ $f->nama_fakultas }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mt-4 flex flex-col">
                    <label for="jurusan" class="text-gray-800 font-bold mb-2 flex items-center">
                        <i class="fas fa-book mr-2"></i> Jurusan:
                    </label>
                    <select name="jurusan" id="jurusan" class="rounded-lg h-10 w-full px-3 border border-gray-300 focus:outline-none focus:ring focus:ring-blue-300" required>
                        <option value="fisika">Fisika</option>
                        <option value="kimia">Kimia</option>
                        <option value="biologi">Biologi</option>
                        <option value="matematika">Matematika</option>
                        <option value="ilmu komputer">Ilmu Komputer</option>
                    </select>
                </div>

                <div class="mt-4 flex flex-col">
                    <label for="foto" class="text-gray-800 font-bold mb-2 flex items-center">
                        <i class="fas fa-image mr-2"></i> Foto:
                    </label>
                    <input type="file" id="foto" name="foto" class="rounded-lg h-10 w-full px-3 border border-gray-300 focus:outline-none focus:ring focus:ring-blue-300">
                </div>

                <div class="mt-6 flex justify-end">
                    <input type="submit" value="Submit" class="bg-blue-600 text-white px-4 py-2 rounded-lg cursor-pointer hover:bg-blue-700 transition duration-300 ease-in-out">
                </div>
            </div>
        </form>
    </div>
@endsection

</body>

</html>
