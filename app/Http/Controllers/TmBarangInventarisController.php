<?php

namespace App\Http\Controllers;

use App\Models\tm_barang_inventaris;
use App\Http\Requests\Storetm_barang_inventarisRequest;
use App\Http\Requests\Updatetm_barang_inventarisRequest;

class TmBarangInventarisController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function daftarBarang()
    {
        return view('barangInventaris.daftarBarang');
    }
    public function penerimaanBarang()
    {
        return view('barangInventaris.penerimaan');
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
    public function store(Storetm_barang_inventarisRequest $request)
    {
        if(TmBarangInventarisController::get()->count() == null){
            $kodeBaru = 0;
        }else{
            $kodeBaru = tm_barang_inventaris::selectRaw('SUBSTRING(br_kode, 4) as angka')->orderBy('id', 'desc')->first()->angka;
        }
        // dd($kodeBaru);
        $kodeFix = 'br-' . $kodeBaru +1;
        $request->validate([
            'br_nama' => 'required|max:50',
            'br_tgl_terima' => 'required|date',
            'br_status' => 'required|max:2',
        ]);
        // dd($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(tm_barang_inventaris $tm_barang_inventaris)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(tm_barang_inventaris $tm_barang_inventaris)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Updatetm_barang_inventarisRequest $request, tm_barang_inventaris $tm_barang_inventaris)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(tm_barang_inventaris $tm_barang_inventaris)
    {
        //
    }
}
