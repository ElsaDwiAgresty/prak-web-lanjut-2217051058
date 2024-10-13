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

    public function getUser(){
        return $this->join('kelas', 'user.kelas_id', '=', 'kelas.id')
        ->select('user.*', 'kelas.nama_kelas as nama_kelas')
        ->get();
    }

    protected $fillable = [
        'nama',
        'npm',
        'kelas_id',
        'foto',
    ];
}
