<?php

namespace App\Http\Controllers;

use App\Models\kelas;
use App\Models\tm_barang_inventaris;
use App\Models\tm_peminjaman;
use App\Models\td_peminjaman_barang;
use App\Models\Siswa;
use Auth;
use Carbon\Carbon;
use DB;
use Illuminate\Http\Request;

class TmPeminjamanController extends Controller
{
    /**
     * Menampilkan daftar peminjaman
     */
    public function index(Request $request)
    {
        $peminjaman = tm_peminjaman::with(['user', 'kelas', 'jurusan', 'barang.barangInventaris.jenisBarang'])->get();
        return view('peminjaman.daftarPeminjaman', compact('peminjaman'));
    }


    public function blade(Request $request)
    {
        $data['kelass'] = kelas::all();
        $data['barangs'] = tm_barang_inventaris::all();
        $data['siswas'] = Siswa::with('jurusan')->get(); // Ambil data siswa beserta jurusan
        $data['dataBarang'] = tm_barang_inventaris::with('peminjamanBarang')
            ->whereHas('peminjamanBarang', function ($q) {
                $q->where('pdb_sts', '!=', 1);
            })
            ->orDoesntHave('peminjamanBarang')
            ->get();
        return view('form.peminjaman')->with($data);
    }
    /**
     * Menyimpan data peminjaman baru.
     */

    public function store(Request $request)
    {
        // Validasi input dari form
        $request->validate([
            'pb_nama_siswa' => 'required',
            'pb_no_siswa' => 'required',
            'kelas_id' => 'required',
            'pb_tgl' => 'required|date',
            'pb_harus_kembali_tgl' => 'required|date|after_or_equal:pb_tgl',
        ]);

        //pisangkeju was here
        // Ambil tahun dan bulan saat ini
        $tahun = now()->format('Y');
        $bulan = now()->format('m'); // Format bulan 2 digit

        // Ambil peminjaman terakhir yang dibuat pada bulan dan tahun yang sama
        $lastPeminjaman = tm_peminjaman::whereYear('pb_tgl', $tahun)
            ->whereMonth('pb_tgl', $bulan)
            ->orderBy('pb_id', 'desc')
            ->first();


        $noUrut = 1;
        if ($lastPeminjaman) {
            // Ambil nomor urut dari ID transaksi peminjaman terakhir
            $lastNoUrut = (int) substr($lastPeminjaman->pb_id, -3);
            $noUrut = $lastNoUrut + 1;
        }

        // Format nomor urut dengan 3 digi
        $noUrutFormatted = str_pad($noUrut, 3, '0', STR_PAD_LEFT);

        // Buat ID transaksi dengan format PJ+TAHUN+BULAN+NO_URUT
        //  $pbId = 'PJ' . $tahun . $bulan . $noUrutFormatted;
        $pbId = 'PJ' . $tahun . $bulan . sprintf('%03d', $noUrut);


        $tanggalHariIni = Carbon::now('Asia/Jakarta')->format('Y-m-d\TH:i'); // Format: YYYY-MM-DDTHH:MM
        $tanggalKembali = Carbon::now('Asia/Jakarta')->startOfDay()->format('Y-m-d') . 'T00:00'; // Format: YYYY-MM-DDT00:00

        DB::beginTransaction();

        tm_peminjaman::create([
            'pb_id' => $pbId,
            'user_id' => Auth::user()->user_id,
            'pb_nama_siswa' => $request->pb_nama_siswa,
            'pb_no_siswa' => $request->pb_no_siswa,
            'kelas_id' => $request->kelas_id,
            'pb_tgl' => $tanggalHariIni, // Otomatis hari ini dengan jam sekarang di timezone Asia/Jakarta
            'pb_harus_kembali_tgl' => $tanggalKembali, // Otomatis hari ini jam 00:00 AM
            'pb_stat' => 1,
        ]);

        $noUrut = 1;

        foreach ($request->id as $barangKode) {
            td_peminjaman_barang::create([
                'pbd_id' => $pbId . sprintf('%03d', $noUrut),
                'pb_id' => $pbId,
                'br_kode' => $barangKode,
                'pdb_tgl' => date('Y-m-d'),
                'pdb_sts' => 1,
            ]);
            $noUrut++;
        }

        DB::commit();


        return redirect()->back()->with('success', 'Peminjaman berhasil ditambahkan');
    }
    /**
     * Tampilkan form edit peminjaman.
     */
    public function update(Request $request, $id)
    {
        //
    }


    // Proses hapus data peminjaman
    public function destroy($id)
    {
        // 
    }
}
