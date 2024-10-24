<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Create User</title>
</head>

<body>

@extends('layouts.app')

@section('content')
    <h1 class="text-center text-2xl mb-6 font-bold mt-4">Edit Biodata</h1>
    <form action="{{ route('user.update', $user['id']) }}" method="POST" enctype="multipart/form-data" class="flex justify-center">
        @csrf
        @method('PUT')
        <div class="bg-slate-400 h-auto w-96 p-6 rounded-lg"> 
            
            <div class="mt-4 flex flex-col items-start">
                <label for="nama" class="text-black font-bold text-lg mb-2">Nama : </label>
                <input type="text" id="nama" name="nama" class="rounded-lg h-8 w-full px-2" value="{{old('nama', $user->nama)}}">
                @foreach($errors->get('nama') as $msg)
                    <p class="text-red-500 text-sm font-semibold mt-1">{{ $msg }}</p>
                @endforeach
            </div>

            <div class="mt-4 flex flex-col items-start">
                <label for="npm" class="text-black font-bold text-lg mb-2">NPM : </label>
                <input type="text" id="npm" name="npm" class="rounded-lg h-8 w-full px-2" value="{{old('npm', $user->npm)}}">
                @foreach($errors->get('npm') as $msg)
                    <p class="text-red-500 text-sm font-semibold mt-1">{{ $msg }}</p>
                @endforeach
            </div>


            <div class="mt-4 flex flex-col items-start">
                <label for="kelas_id" class="text-black font-bold text-lg mb-2">Kelas : </label>
                <select name="kelas_id" id="kelas_id" class="rounded-lg h-8 w-full px-2" required>
                    @foreach($kelas as $kelasItem)
                    <option value="{{$kelasItem->id}}"
                        {{$kelasItem->id == $user-> kelas_id ? 'selected' : ''}}>
                        {{$kelasItem->nama_kelas}}
                    </option>
                    @endforeach
                </select>
                @foreach($errors->get('kelas_id') as $msg)
                    <p class="text-red-500 text-sm font-semibold mt-1">{{ $msg }}</p>
                @endforeach
            </div>

            <div class="mt-4 flex flex-col items-start">
                <label for="foto" class="text-black font-bold text-lg mb-2">foto:</label><br>
                <input type="file" id="foto" name="foto" class="form-control"><br><br>
                @if($user->foto)
                <img src="{{ asset('storage/uploads/' . $user->foto) }}" alt="User Photo" width="100" class="mt-2">
                @endif
            </div>

            <div class="mt-6 flex justify-end">
                <input type="submit" value="Submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg cursor-pointer hover:bg-blue-600">
            </div>
        </div>
    </form>
@endsection

</body>

</html>