<?php

namespace App\Http\Controllers;

use App\Models\tm_barang_inventaris;
use App\Models\tr_jenis_barang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TmBarangInventarisController extends Controller
{
    public function daftarBarang()
    {
        $data['barangs'] = tm_barang_inventaris::with('jenisBarang')->get();
        $data['jeniss'] = tr_jenis_barang::get();
        return view('barangInventaris.daftarBarang')->with($data);
    }
    public function penerimaanBarang()
    {
        $data['jeniss'] = tr_jenis_barang::get();
        return view('barangInventaris.penerimaan')->with($data);
    }
    public function laporan()
    {
        return view('laporan.laporandb');
    }

    /**
     * Simpan data barang baru.
     */
    public function store(Request $request)
    {
        $tahun = date('Y');

        // Ambil nomor urut terakhir berdasarkan tahun
        $lastKode = tm_barang_inventaris::selectRaw('COALESCE(MAX(CAST(SUBSTRING(br_kode, 8, 5) AS UNSIGNED)), 0) AS angka')
            ->whereRaw('SUBSTRING(br_kode, 4, 4) = ?', [$tahun])
            ->value('angka');

        // Tambahkan nomor urut baru
        $noUrutBaru = $lastKode + 1;

        // Format kode barang baru
        $kodeFix = 'INV' . $tahun . str_pad($noUrutBaru, 5, '0', STR_PAD_LEFT);

        // Validasi data input
        $validated = $request->validate([
            'br_nama' => 'required|max:50',
            'jns_brg_kode' => 'required',
            'br_tgl_terima' => 'required|date',
        ]);


        // Simpan data ke database
        tm_barang_inventaris::create([
            'br_kode' => $kodeFix,
            'br_nama' => $validated['br_nama'],
            'jns_brg_kode' => $validated['jns_brg_kode'],
            'user_id' => Auth::user()->user_id, // ID pengguna yang menambahkan
            'br_tgl_terima' => $validated['br_tgl_terima'],
            'br_tgl_entry' => now(), // Tanggal input data
            'br_status' => '1', // Status default
        ]);

        return redirect()->route('penerimaan')->with('success', 'Barang berhasil ditambahkan.');
    }

    /**
     * Tampilkan data barang berdasarkan ID.
     */
    public function show(tm_barang_inventaris $tm_barang_inventaris)
    {
        //
    }

    /**
     * Halaman untuk mengedit data barang.
     */
    public function edit(tm_barang_inventaris $tm_barang_inventaris)
    {
        //
    }

    /**
     * Perbarui data barang.
     */
    public function update(Request $request, tm_barang_inventaris $barang)
    {
        $request->validate([
            'br_nama' => 'required|string|max:255',
            'br_status' => 'required|in:1,2',
            'jns_brg_kode' => 'required|exists:tr_jenis_barangs,jns_brg_kode'
        ]);

        // Update data barang
        $barang->update([
            'br_nama' => $request->br_nama,
            'br_status' => $request->br_status,
            'jns_brg_kode' => $request->jns_brg_kode
        ]);

        return redirect()->route('barang-inventaris')->with('success', 'Data barang berhasil diperbarui');
    }

    // Lanjutkan proses update jika datanya benar
    /**
     * Hapus data barang.
     */
    public function destroy($br_kode)
    {
        $barang = tm_barang_inventaris::where('br_kode', $br_kode)->firstOrFail();
        $barang->delete(); // Hapus data dari database

        return redirect()->route('barang-inventaris')->with('success', 'Data barang berhasil dihapus');
    }
}