<?php

namespace App\Http\Controllers;

use App\Models\tm_peminjaman;
use App\Models\tm_pengembalian;
use App\Http\Requests\Storetm_pengembalianRequest;
use App\Http\Requests\Updatetm_pengembalianRequest;
use Auth;
use Carbon\Carbon;

class TmPengembalianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Hanya ambil data peminjaman yang belum dikembalikan
        $peminjaman = tm_peminjaman::with(['pengembalian', 'user', 'barang.barangInventaris'])
            ->where('pb_stat', '!=', 'dikembalikan')
            ->get();
        return view('peminjaman.pengembalian', compact('peminjaman'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Storetm_pengembalianRequest $request)
    {
        $request->validate([
            'pb_id' => 'required|exists:tm_peminjaman,pb_id',
        ]);

        // Ambil tanggal sekarang
        $tahun = Carbon::now()->format('Y');
        $bulan = Carbon::now()->format('m');

        // Cari nomor urut terakhir
        $lastRecord = tm_pengembalian::whereYear('kembali_tgl', $tahun)
            ->whereMonth('kembali_tgl', $bulan)
            ->orderBy('kembali_id', 'desc')
            ->first();

        // Jika ada, tambah no urut. Jika tidak, mulai dari 001
        if ($lastRecord) {
            $lastNumber = (int) substr($lastRecord->kembali_id, -3);
            $newNumber = str_pad($lastNumber + 1, 3, '0', STR_PAD_LEFT);
        } else {
            $newNumber = '001';
        }

        // Format kembali_id → KBYYYYMMXXX
        $kembali_id = "KB{$tahun}{$bulan}{$newNumber}";

        tm_pengembalian::create([
            'kembali_id' => $kembali_id,
            'pb_id' => $request->pb_id,
            'user_id' => Auth::user()->user_id,
            'kembali_tgl' => now(),
            'kembali_sts' => 1,
        ]);

        // Update status peminjaman menjadi dikembalikan
        $peminjaman = tm_peminjaman::find($request->pb_id);
        $peminjaman->pb_stat = 'dikembalikan';
        $peminjaman->save();

        return redirect()->back()->with('success', 'Pengembalian berhasil disimpan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(tm_pengembalian $tm_pengembalian)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(tm_pengembalian $tm_pengembalian)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Updatetm_pengembalianRequest $request, tm_pengembalian $tm_pengembalian)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(tm_pengembalian $tm_pengembalian)
    {
        //
    }
}