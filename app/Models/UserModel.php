<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserModel extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $table = 'user';

    public function kelas(){
        return $this->belongsTo(Kelas::class, 'kelas_id');
    }
    public function fakultas(){
        return $this->belongsTo(FakultasModel::class, 'fakultas_id');
    }
    

    public function getUser(){
        return $this->join('kelas', 'user.kelas_id', '=', 'kelas.id')
            ->join('fakultas', 'user.fakultas_id', '=', 'fakultas.id') // join dengan tabel fakultas
            ->select('user.*', 'kelas.nama_kelas as nama_kelas', 'fakultas.nama_fakultas as nama_fakultas') // pilih nama fakultas
            ->get();
    }

    protected $fillable = [
        'nama',
        'smt',
        'kelas_id',
        'fakultas_id',
        'jurusan',
        'foto',
    ];
}
