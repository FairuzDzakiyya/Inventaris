<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Jurusan;
use App\Http\Requests\StorekelasRequest;
use App\Http\Requests\UpdatekelasRequest;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kelas = Kelas::with('jurusan')->get(); // Ambil semua kelas dengan jurusannya
        $jurusan = Jurusan::all(); // Ambil semua jurusan
        return view('siswa.kelas', compact('kelas', 'jurusan'));
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
    public function store(StorekelasRequest $request)
    {
        $request->validate([
            'kelas' => 'required',
            'no_kelas' => 'required',
            'jns_brg_kode' => 'required',
        ]);

        Kelas::create([
            'kelas' => $request->kelas,
            'no_kelas' => $request->no_kelas,
            'jurusan_id' => $request->jns_brg_kode,
        ]);

        return redirect()->route('kelas')->with('success', 'Kelas berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Kelas $kelas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kelas $kelas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatekelasRequest $request, Kelas $kelas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($kelas)
    {
        $kelas = jurusan::findOrFail($kelas);
        $kelas->delete();
        return redirect()->route('hapusKelas')->with('success', 'Jurusan berhasil dihapus!');
    }
}
