<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tr_jenis_barang extends Model
{
    /** @use HasFactory<\Database\Factories\TrJenisBarangFactory> */
    use HasFactory;

    protected $table = 'tr_jenis_barangs';
    protected $primaryKey = 'jns_brg_kode';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'jns_brg_kode',
        'jns_brg_nama',
    ];

    public function barang_inventaris()
    {
        return $this->hasMany(tm_barang_inventaris::class, 'jns_brg_kode', 'jns_brg_kode');
    }
    public static function generateId()
    {
        $latestData = tr_jenis_barang
            ::orderByDesc('jns_brg_kode')
            ->lockForUpdate()
            ->first();

        $startId = $latestData ? (int) substr($latestData['jns_brg_kode'], 2) + 1 : 1;

        return 'JB' . str_pad($startId, 5, 0, STR_PAD_LEFT);
    }
}
