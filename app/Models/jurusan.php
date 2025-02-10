<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class jurusan extends Model
{
    /** @use HasFactory<\Database\Factories\JurusanFactory> */
    use HasFactory;

    protected $table = 'jurusans';
    protected $primaryKey = 'jurusan_id';
    protected $keyType = 'string';
    public $incrementing = false;
    
    protected $fillable = [
        'jurusan_id',
        'nama_jurusan',
    ];
}
