<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jurusan extends Model
{
    use HasFactory;

    protected $table = 'jurusans';
    protected $primaryKey = 'jurusan_id'; // Pakai jurusan_id
    public $incrementing = true; // Harus true biar auto-increment
    protected $keyType = 'int'; // Harus integer
    
    protected $fillable = ['nama_jurusan']; 
    public function kelas()
    {
        return $this->hasMany(Kelas::class, 'jurusan_id', 'jurusan_id');
    }
}