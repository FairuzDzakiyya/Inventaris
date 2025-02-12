<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class td_peminjaman_barang extends Model
{
    use HasFactory;

    protected $table = 'td_peminjaman_barangs';
    protected $primaryKey = 'pbd_id';
    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = ['pbd_id', 'pb_id', 'br_kode', 'pdb_tgl', 'pdb_sts'];

    // public function peminjaman()
    // {o
    //     return $this->belongsTo(tm_peminjaman::class, 'pb_id');
    // }
    public function barangInventaris()
    {
        return $this->belongsTo(tm_barang_inventaris::class, 'br_kode', 'br_kode');
    }
}
