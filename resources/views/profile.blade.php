<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Halaman Profil</title>
</head>
<body class="flex items-center justify-center h-screen bg-gray-100">
    <div class="text-center text-sm font-bold font-serif bg-slate-700 h-96 w-64 rounded-lg">
        <div class="h-36 w-36 bg-gray-300 rounded-full mx-auto mt-4">
            @if($user['foto'])
                <img src="{{ asset('storage/uploads/' . $user->foto) }}" alt="User Photo" width="full" class="rounded-full" >
            @endif
        </div>
        
        <div class="bg-gray-300 py-2 px-4 rounded mb-2 mt-8 mx-6">
            <p> Nama: {{ $user->nama }}</p>
        </div>

        <div class="bg-gray-300 py-2 px-4 rounded mb-2 mx-6">
            <p>NPM: {{ $user->npm }}</p>
        </div>

        <div class="bg-gray-300 py-2 px-4 rounded mb-8 mx-6">
            <p>Kelas: {{ $user->kelas->nama_kelas ?? 'Kelas tidak ditemukan'}}</p>
        </div>
    </div>`
</body>
</html>