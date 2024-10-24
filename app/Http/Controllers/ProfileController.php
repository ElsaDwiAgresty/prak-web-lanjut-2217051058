<?php

namespace App\Http\Controllers;

use App\Models\User; // Pastikan model User digunakan
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function profile($id)
    {
        $user = User::with('kelas', 'fakultas')->findOrFail($id);
        return view('profile', ['user' => $user]);
    }
}
