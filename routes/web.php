<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\TdPeminjamanBarangController;
use App\Http\Controllers\TmBarangInventarisController;
use App\Http\Controllers\TmPeminjamanController;
use App\Http\Controllers\TmPengembalianController;
use App\Http\Controllers\TrJenisBarangController;
use Illuminate\Support\Facades\Route;

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('cek-login');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', [HomeController::class, 'index']);
    Route::get('/barang-inventaris', [TmBarangInventarisController::class, 'daftarBarang'])->name('barang-inventaris');
    Route::get('/penerimaan', [TmBarangInventarisController::class, 'penerimaanBarang'])->name('penerimaan');
    Route::post('/penerimaan', [TmBarangInventarisController::class, 'store'])->name('barangInventaris.penerimaan');
    Route::put('/penerimaan/{barang}', [TmBarangInventarisController::class, 'update'])->name('editPenerimaan');
    Route::delete('/penerimaan/{br_kode}', [TmBarangInventarisController::class, 'destroy'])->name('hapusPenerimaan');
    
    Route::get('/daftar-peminjaman', [TmPeminjamanController::class, 'index'])->name('daftarPeminjaman');
    Route::post('/data-peminjaman', [TmPeminjamanController::class, 'store'])->name('dataPeminjaman');
    
    Route::get('/peminjaman', [TmPeminjamanController::class, 'blade'])->name('peminjaman');
    Route::post('/peminjaman', [TmPeminjamanController::class, 'store'])->name('peminjaman');
    Route::post('/peminjaman/add', [TdPeminjamanBarangController::class, 'add'])->name('addPeminjaman');
    Route::get('/peminjaman/{id}/list', [TdPeminjamanBarangController::class, 'list'])->name('listPeminjaman');
    
    Route::get('/daftar-pengembalian', [TmPengembalianController::class, 'index'])->name('pengembalian');
    Route::post('/pengembalian', [TmPengembalianController::class, 'store'])->name('dataPengembalian');

    Route::get('/laporandb', [TmBarangInventarisController::class, 'laporan']);

    Route::get('/siswa', [SiswaController::class, 'index']);
    Route::post('/siswa', [SiswaController::class, 'store'])->name('postSiswa');

    Route::get('/kelas', [KelasController::class, 'index']);
    Route::get('/kelas', [KelasController::class, 'index']);

    Route::get('/jurusan', [JurusanController::class, 'index']);
    Route::post('/jurusan', [JurusanController::class, 'store'])->name('jurusan');

    Route::get('logout', [LoginController::class, 'logout'])->name('logout');
});

Route::get('/jenis-barang', [TrJenisBarangController::class, 'index']);
Route::post('/jenis-barang', [TrJenisBarangController::class, 'store'])->name('jenisBarang');