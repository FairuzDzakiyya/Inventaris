<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;

    protected $primaryKey = 'kelas_id';
    public $incrementing = true; // Menggunakan auto-increment
    protected $keyType = 'int'; // Tipe data integer

    protected $fillable = [
        'kelas',
        'no_kelas',
        'jurusan_id',
    ];

    // Relasi ke Jurusan (Many to One)
    public function jurusan()
    {
        return $this->belongsTo(Jurusan::class, 'jurusan_id', 'jurusan_id');
    }

    public function peminjaman()
    {
        return $this->hasMany(tm_peminjaman::class, 'kelas_id', 'kelas_id');
    }
}

