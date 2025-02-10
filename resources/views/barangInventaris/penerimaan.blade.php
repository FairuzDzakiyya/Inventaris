@extends('templates.header')

@section('content') 
<div class="main-panel">
  <div class="content-wrapper">
    <div class="row">
      <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Input Data Barang</h4>
            @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
      @endif
            @if ($errors->any())
        <div class="alert alert-danger">
          <ul>
          @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
          </ul>
        </div>
      @endif
            <form class="forms-sample" method="POST" action="{{ route('barangInventaris.penerimaan') }}">
              @csrf
              <div class="form-group">
                <label for="br_nama">Nama Barang</label>
                <input type="text" name="br_nama" class="form-control" placeholder="Nama Barang" required />
              </div>
              <div class="form-group">
                <label for="jns_brg_kode">Jenis Barang</label>
                <select name="jns_brg_kode" class="form-select" required>
                  @foreach ($jeniss as $jenis)
            <option value="{{ $jenis->jns_brg_kode }}">{{ $jenis->jns_brg_nama }}</option>
          @endforeach
                </select>
            </div>  
              <div class="form-group">
                <label for="br_tgl_terima">Tanggal Masuk Barang</label>
                <input type="date" name="br_tgl_terima" class="form-control" placeholder="dd/mm/yyyy" required />
              </div>
              <button type="submit" class="btn btn-primary p-3">
                Input
              </button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  @endsection