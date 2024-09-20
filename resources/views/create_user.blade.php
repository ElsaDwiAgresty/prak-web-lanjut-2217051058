<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Create User</title>
</head>

<body>
    <h1 class="text-center text-2xl mb-6 font-bold mt-4">Isi Biodata</h1>
    <form action="{{ route('user.store') }}" method="POST" class="flex justify-center">
        @csrf
        <div class="bg-slate-400 h-60 w-96 p-6 rounded-lg">
            <div class="mt-4 flex items-center">
                <label for="nama" class="w-1/3 text-white font-bold text-lg">Nama : </label>
                <input type="text" id="nama" name="nama" class="rounded-lg h-8 w-full px-2">
            </div>

            <div class="mt-4 flex items-center">
                <label for="npm" class="w-1/3 text-white font-bold text-lg">NPM : </label>
                <input type="text" id="npm" name="npm" class="rounded-lg h-8 w-full px-2">
            </div>

            <div class="mt-4 flex items-center">
                <label for="kelas" class="w-1/3 text-white font-bold text-lg">Kelas : </label>
                <input type="text" id="kelas" name="kelas" class="rounded-lg h-8 w-full px-2">
            </div>

            <div class="mt-6 flex justify-end">
                <input type="submit" value="Submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg cursor-pointer hover:bg-blue-600">
            </div>
        </div>
    </form>
</body>

</html>
