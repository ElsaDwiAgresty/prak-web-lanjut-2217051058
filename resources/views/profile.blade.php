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
    <div class="text-center text-sm font-bold font-serif bg-slate-600 h-auto w-80 rounded-lg shadow-lg p-6">
        
        <!-- Foto Profil -->
        <div class="h-36 w-36 bg-gray-300 rounded-full mx-auto mt-4 overflow-hidden">
            @if($user->foto)
                <img src="{{ asset('storage/uploads/'. $user['foto']) }}" alt="User Photo" class="w-full h-full object-cover">
            @else
                <p class="text-gray-500 mt-14">Foto tidak tersedia</p>
            @endif
        </div>
        
        <!-- Nama -->
        <div class="bg-slate-300 py-2 px-4 rounded mb-2 mt-4">
            <p class="text-black">Nama: {{ $user->nama }}</p>
        </div>
        
        <!-- Semester -->
        <div class="bg-slate-300 py-2 px-4 rounded mb-2">
            <p class="text-black">Semester: {{ $user['smt'] }}</p>
        </div>

        <!-- Kelas -->
        <div class="bg-slate-300 py-2 px-4 rounded mb-2">
            <p class="text-black">Kelas: {{ $user->kelas->nama_kelas ?? 'Kelas tidak ditemukan' }}</p>
        </div>

        <!-- Fakultas -->
        <div class="bg-slate-300 py-2 px-4 rounded mb-2">
            <p class="text-black">Fakultas: {{ $user->fakultas->nama_fakultas }}</p>
        </div>

        <!-- Jurusan -->
        <div class="bg-slate-300 py-2 px-4 rounded mb-4">
            <p class="text-black">Jurusan: {{ ucfirst($user->jurusan) }}</p> <!-- ucfirst untuk capitalize huruf pertama -->
        </div>

    </div>
</body>
</html>
