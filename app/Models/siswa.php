<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;

    protected $table = 'siswas';
    protected $primaryKey = 'siswa_id';
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = [
        'kelas_id',
        'jurusan_id',
        'nama_siswa',
        'nis',
        'jk',
        'email',
    ];

    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'kelas_id', 'kelas_id');
    }

    public function jurusan()
    {
        return $this->belongsTo(Jurusan::class, 'jurusan_id', 'jurusan_id');
    }
}
