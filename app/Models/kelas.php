<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kelas extends Model
{
    /** @use HasFactory<\Database\Factories\KelasFactory> */
    use HasFactory;

    protected $table = 'kelas';
    protected $primaryKey = 'kelas_id';
    protected $keyType = 'string';
    public $incrementing = false;
    
    protected $fillable = [
        'kelas_id',
        'jurusan_id',
        'kelas',
        'no_kelas',
    ];

    public function peminjaman()
    {
        return $this->hasMany(tm_peminjaman::class, 'kelas_id', 'kelas_id');
    }
}
