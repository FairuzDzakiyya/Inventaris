<?php

namespace App\Http\Controllers;

use App\Models\td_peminjaman_barang;
use App\Http\Requests\Storetd_peminjaman_barangRequest;
use App\Http\Requests\Updatetd_peminjaman_barangRequest;
use App\Models\tm_barang_inventaris;
use App\Models\tm_peminjaman;
use Illuminate\Http\Request;

class TdPeminjamanBarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        $data['id'] = $id;
        $data['dataBarang'] = tm_barang_inventaris::with('peminjamanBarang')
            ->whereHas('peminjamanBarang', function ($q) {
                $q->where('pdb_sts', '!=', 1);
            })
            ->orDoesntHave('peminjamanBarang')
            ->get();

        return view('form.peminjaman')->with($data);
    }
    public function redirectToPilihBarang()
    {
        return redirect()->route('peminjaman');
    }
    
    public function add(Request $request)
    {
        if (!$request->has('id')) {
            return back()->withErrors(['error' => 'Tidak ada barang yang dipilih!']);
        }

        $pbId = $request->input('pb_id');

        $ids = [];

        return 'test';

        // Ambil nomor urut terakhir berdasarkan pb_id
        $dataterakhir = td_peminjaman_barang::where('pb_id', $pbId)
            ->orderBy('pbd_id', 'desc')
            ->first();

        // Ambil nomor urut terakhir, jika tidak ada, mulai dari 1
        $nomorUrut = $dataterakhir ? ((int) substr($dataterakhir->pbd_id, -3) + 1) : 1;

        foreach ($request->input('id') as $id) {
            // Format nomor urut agar selalu 3 digit (001, 002, 003)
            $noUrut = sprintf('%03d', $nomorUrut);

            // Buat pbd_id dengan format: <pb_id><no_urut>
            $pbdId = "{$pbId}{$noUrut}";

            // Periksa apakah ID sudah ada di database
            while (td_peminjaman_barang::where('pbd_id', $pbdId)->exists()) {
                $nomorUrut++;
                $noUrut = sprintf('%03d', $nomorUrut);
                $pbdId = "{$pbId}{$noUrut}";
            }

            $ids[] = $pbdId;

            // Insert data ke database
            // td_peminjaman_barang::create([
            //     'pbd_id' => $pbdId, // Pastikan ID unik
            //     'pb_id' => $pbId,
            //     'br_kode' => $id,
            //     'pdb_tgl' => now(),
            //     'pdb_sts' => 1,
            // ]);

            $nomorUrut++; // Tambah urutan untuk barang selanjutnya
        }

        return $ids;

        // Update status peminjaman
        tm_peminjaman::where('pb_id', $pbId)->update(['pb_stat' => 1]);

        return redirect()->route('peminjaman')->with('success', 'Barang berhasil dipinjam');
    }

    public function list($id)
    {
        $dataterakhir = tm_barang_inventaris::whereDoesntHave('peminjamanBarang', function ($q) {
            $q->where('pdb_id', '=', 1);  // Barang yang sudah dipinjam tidak ditampilkan
        })->get();

        return view('form.peminjaman', compact('id', 'inventaris'));
        // dd($inventaris);
    }
}