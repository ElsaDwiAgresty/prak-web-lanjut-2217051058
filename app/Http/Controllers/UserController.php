<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\UserModel;
use App\Models\FakultasModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\UserRequest;

class UserController extends Controller
{
    public $UserModel;
    public $Kelas;

    public function __construct()
    {
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
    public function create()
    {

        $Kelas = new kelas();

        $kelas = $this->Kelas->getKelas(); // Mengambil data kelas
        $fakultas = FakultasModel::all(); // Mengambil semua data fakultas

        $data = [
            'title' => 'Create User',
            'kelas' => $kelas,
            'fakultas' => $fakultas, // Menambahkan data fakultas ke array
        ];

        return view('create_user', $data);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'jurusan' => 'required|in:fisika,kimia,biologi,matematika,ilmu komputer',
            'smt' => 'required|integer|between:1,14',
            'fakultas_id' => 'required|integer|exists:fakultas,id',
            'kelas_id' => 'required|integer',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ]);

        // Meng-handle upload foto
        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            $filename = time() . '_' . $foto->getClientOriginalName();
            $foto->storeAs('uploads', $filename); // Menyimpan file ke storage
        } else {
            // Jika tidak ada file yang diupload, set fotoPath menjadi null atau default
            $fotoPath = null;
        }
        // Menyimpan data ke database termasuk path foto
        $this->UserModel->create([
            'nama' => $request->input('nama'),
            'jurusan' => $request->input('jurusan'),
            'smt' => $request->input('smt'),
            'fakultas_id' => $request->input('fakultas_id'),
            'kelas_id' => $request->input('kelas_id'),
            'foto' => $filename,
        ]);

        //return redirect()->to('/user');
        return redirect()->route('user.list')->with('success', 'User berhasil ditambahkan');
    }

    public function edit($id)
    {
        $user = UserModel::findOrFail($id);
        $kelasModel = new Kelas();
        $kelas = $kelasModel->getKelas();

        // Ambil data fakultas dari model FakultasModel
        $fakultas = FakultasModel::all();

        $title = 'Edit User';

        // Kirim data kelas dan fakultas ke view
        return view('edit_user', compact('user', 'kelas', 'fakultas', 'title'));
    }

    public function update(Request $request, $id)
    {
        $user = UserModel::findOrFail($id);

        $user->nama = $request->nama;
        $user->smt = $request->smt;
        $user->fakultas_id = $request->fakultas_id;
        $user->jurusan = $request->jurusan;
        $user->kelas_id = $request->kelas_id;

        if ($request->hasFile('foto')) {
            if ($user->foto) {
                @unlink(storage_path('app/public/uploads/' . $user->foto));
            }

            $file = $request->file('foto');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('uploads', $filename);
            $user->foto = $filename;
        }

        $user->save();

        return redirect()->route('user.list')->with('success', 'user update successfully');
    }

    public function destroy($id)
    {
        $user = UserModel::findOrFail($id);
        $user->delete();

        return redirect()->route('user.list')->with('Success, data has been deleted succesfully');
    }

    public function show($id)
    {
        $user = UserModel::findOrFail($id);
        $kelas = Kelas::find($user->kelas_id);

        $title = 'Detail ' . $user->nama;

        return view('profile', compact('user', 'kelas', 'title'));
    }
}