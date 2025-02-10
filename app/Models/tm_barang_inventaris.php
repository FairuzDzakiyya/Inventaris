<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tm_barang_inventaris extends Model
{
    /** @use HasFactory<\Database\Factories\TmBarangInventarisFactory> */
    use HasFactory;
    
    protected $table = 'tm_barang_inventaris';

    protected $primaryKey = 'br_kode';

    protected $keyType = 'string';

    public $incrementing = false;
    
    protected $fillable = [
        //errornya simple guis
        // gegara user_id nya ga masuk fillable
        // lah, oh, gtw deh
        'user_id',
        'br_kode',
        'jns_brg_kode',
        'br_nama',
        'br_tgl_terima',
        'br_tgl_entry',
        'br_status',
    ];

    public function jenisBarang()
    {
        return $this->belongsTo(tr_jenis_barang::class, 'jns_brg_kode');
    }
    public function peminjamanBarang()
    {
        return $this->hasMany(td_peminjaman_barang::class, 'br_kode', 'br_kode');
    }
    public function peminjaman()
    {
        return $this->hasMany(tm_peminjaman::class, 'br_kode', 'br_kode');
    }
}
