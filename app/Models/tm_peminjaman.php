<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tm_peminjaman extends Model
{
    /** @use HasFactory<\Database\Factories\TmPeminjamanFactory> */
    use HasFactory;
    protected $table = 'tm_peminjaman';
    protected $primaryKey = 'pb_id';
    protected $keyType = 'string';
    public $incrementing = false;
    protected $fillable = ['pb_id', 'user_id','pb_no_siswa', 'pb_nama_siswa', 'kelas_id', 'pb_tgl', 'pb_harus_kembali_tgl', 'pb_stat'];
    
    public function barang()
    {
        return $this->hasMany(td_peminjaman_barang::class, 'pb_id', 'pb_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'user_id'); 
    }
    public function kelas()
    {
        return $this->belongsTo(kelas::class, 'kelas_id', 'kelas_id'); 
    }
    public function jurusan()
    {
        return $this->belongsTo(Jurusan::class, 'jurusan_id', 'jurusan_id'); 
    }
    public function pengembalian()
    {
        return $this->hasOne(tm_pengembalian::class, 'pb_id',); 
    }
    }    
