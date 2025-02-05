<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\TmBarangInventarisController;
use Illuminate\Support\Facades\Route;

Route::get('/home', [HomeController::class, 'index']);

Route::get('/barang-inventaris', [TmBarangInventarisController::class, 'daftarBarang']);
Route::get('/penerimaan', [TmBarangInventarisController::class, 'penerimaanBarang']);
Route::post( '/penerimaan', [TmBarangInventarisController::class, 'store'])->name('barangInventaris.penerimaan');