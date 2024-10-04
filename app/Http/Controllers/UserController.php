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

    // public function store(Request $request){
    //     $validatedData = $request->validate([
    //         'nama' => 'required|string|max:255',
    //         'npm' => 'required|string|max:255',
    //         'kelas_id' => 'required|exists:kelas,id',
    //     ]);

    //     $user = UserModel::create($validatedData);

    //     $user->load('kelas');

    //     return view('profile', [
    //         'nama' => $user->nama,
    //         'npm' => $user->npm,
    //         'nama_kelas' => $user->kelas->nama_kelas ?? 'Kelas tidak ditemukan',
    //     ]);
    // }

    public function store(Request $request)
    {
        $this->UserModel->create([
        'nama' => $request->input('nama'),
        'npm' => $request->input('npm'),
        'kelas_id' => $request->input('kelas_id'),
        ]);
        return redirect()->to('/user');
    }
}