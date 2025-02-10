<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class siswa extends Model
{
    /** @use HasFactory<\Database\Factories\SiswaFactory> */
    use HasFactory;

    protected $table = 'siswas';
    protected $primaryKey = 'siswa_id';
    protected $keyType = 'string';
    public $incrementing = false;
    protected $fillable = [
        'siswa_id',
        'kelas_id',
        'jurusan_id',
        'nama_siswa',
        'nis',
        'jk',
        'email',
    ];

    public function kelas()
    {
        return $this->belongsTo(kelas::class, 'kelas_id', 'kelas_id');
    }
    public function jurusan()
    {
        return $this->belongsTo(jurusan::class, 'jurusan_id', 'jurusan_id');
    }
}
