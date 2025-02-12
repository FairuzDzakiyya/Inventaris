<?php

namespace App\Http\Controllers;

use App\Models\tr_jenis_barang;
use App\Http\Requests\Storetr_jenis_barangRequest;
use App\Http\Requests\Updatetr_jenis_barangRequest;

class TrJenisBarangController extends Controller
{   
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // dd(auth()->user());
        $data['jeniss'] = tr_jenis_barang::all();
        return view('referensi.jenis')->with($data);
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
    public function store(Storetr_jenis_barangRequest $request)
    {
        $request->validate([
            'jns_brg_kode' => 'required|string|max:10|unique:tr_jenis_barangs,jns_brg_kode',
            'jns_brg_nama' => 'required|string|max:255',
        ]);

        // Simpan data ke database
        tr_jenis_barang::create([
            'jns_brg_kode' => $request->jns_brg_kode,
            'jns_brg_nama' => $request->jns_brg_nama,
        ]);

        // Redirect kembali dengan pesan sukses
        return redirect()->route('jenisBarang')->with('success', 'Jenis Barang berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(tr_jenis_barang $tr_jenis_barang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(tr_jenis_barang $tr_jenis_barang)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Updatetr_jenis_barangRequest $request, tr_jenis_barang $tr_jenis_barang)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(tr_jenis_barang $tr_jenis_barang)
    {
        //
    }
}
