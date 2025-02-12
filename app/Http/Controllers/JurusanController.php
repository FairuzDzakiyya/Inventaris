<?php

namespace App\Http\Controllers;

use App\Models\jurusan;
use App\Http\Requests\StorejurusanRequest;
use App\Http\Requests\UpdatejurusanRequest;

class JurusanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jurusan = Jurusan::with('kelas')->get(); // Ambil semua jurusan dengan kelasnya
        return view('siswa.jurusan', compact('jurusan'));
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
    public function store(StorejurusanRequest $request)
    {
        $request->validate([
            'nama_jurusan' => 'required|string|max:255',
        ]);

        Jurusan::create([
            'nama_jurusan' => $request->nama_jurusan,
        ]);

        return redirect()->route('jurusan')->with('success', 'Jurusan berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(jurusan $jurusan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(jurusan $jurusan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatejurusanRequest $request, jurusan $jurusan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($jurusan)
    {
        $jurusan = jurusan::findOrFail($jurusan);
        $jurusan->delete();
        return redirect()->route('hapusJurusan')->with('success', 'Jurusan berhasil dihapus!');
    }
}
