<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\UserModel;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;

class UserController extends Controller
{
    public $UserModel;
    public $Kelas;

    public function __construct(){
        $this->UserModel = new userModel();
        $this->Kelas = new kelas();
    }

    public function index()
{
    $data = [
    'title' => 'Create User',
    'users' => $this->UserModel->getUser(),
    ];
    return view('list_user', $data);
}
    public function profile($nama = "", $npm = "", $kelas = "")
    {
        $data = [
            'nama' => $nama,
            'npm' => $npm,
            'kelas' => $kelas,
        ];
        return view('profile', $data);
    }
    public function create(){

        $Kelas= new kelas();

        $kelas = $Kelas->getKelas();

        $data = [
            'title' => 'Create User',
            'kelas' => $kelas,
        ];

        return view('create_user', $data);
        // return view('create_user',[
        //     'kelas' => Kelas::all(),
        // ]);
    }

    // public function store(Request $request){
    //     $data = [
    //         'nama' => $request->nama,
    //         'kelas' => $request->kelas,
    //         'npm' => $request->npm,

    //     ];
    //     return view('profile', $data);
    // }

    public function store(Request $request){
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'npm' => 'required|string|max:255',
            'kelas_id' => 'required|exists:kelas,id',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048' //Validai untuk foto
        ]);

        // Meng-handle upload foto
        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            // Menyimpan file foto di folder 'uploads'
            $foto_name = $foto->hashName();
            $fotoPath = $foto->move(('uploads'), $foto_name);
        } else {
            // Jika tidak ada file yang diupload, set fotoPath menjadi null atau default
            $fotoPath = null;
        }
        // Menyimpan data ke database termasuk path foto
        $this->UserModel->create([
            'nama' => $request->input('nama'),
            'npm' => $request->input('npm'),
            'kelas_id' => $request->input('kelas_id'),
            'foto' => $fotoPath, // Menyimpan path foto
        ]);

            //return redirect()->to('/user');
            return redirect()->to('/user')->with('success', 'User berhasil ditambahkan');
    }

    

    //     $user = UserModel::create($validatedData);

    //     $user->load('kelas');

    //     return view('profile', [
    //         'nama' => $user->nama,
    //         'npm' => $user->npm,
    //         'nama_kelas' => $user->kelas->nama_kelas ?? 'Kelas tidak ditemukan',
    //     ]);
    // }

    // public function store(Request $request)
    // {
    //     $this->UserModel->create([
    //     'nama' => $request->input('nama'),
    //     'npm' => $request->input('npm'),
    //     'kelas_id' => $request->input('kelas_id'),
    //     ]);
        
    // }
}