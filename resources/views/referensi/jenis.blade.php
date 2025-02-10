@extends('templates.header')

@section('content')
<div class="main-panel">
  <div class="content-wrapper">
    <div class="row">
      <div class="col-md-12 grid-margin">
        <h3>Jenis Barang</h3>
        @if (session('success'))
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
        <a href="#" data-bs-toggle="modal" data-bs-target="#jenisModal" class="btn btn-primary mb-3 p-3 mt-2">
          <i class="mdi mdi-plus-circle-outline px-1"></i>
          Tambah Jenis Barang
        </a>
        <div class="card">
          <div class="card-body">
            <div class="row">
              <div class="col-12">
                <div class="table-responsive">
                  <div style="overflow-x: auto">
                    <table class="display expandable-table" style="width: 100%">
                      <thead>
                        <tr class="text-center">
                          <th>Kode Barang</th>
                          <th>Nama Barang</th>
                        </tr>
                      </thead>
                      <tbody>
                        @forelse ($jeniss as $jenis)
              <tr class="text-center">
                <td>{{ $jenis->jns_brg_kode }}</td>
                <td>{{ $jenis->jns_brg_nama }}</td>
              </tr>
            @empty
        <tr>
          <td colspan="2" class="text-center">Data tidak tersedia</td>
        </tr>
      @endforelse
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="jenisModal" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalLabel">Form Jenis Barang</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form class="forms-sample" method="POST" action="{{ route('jenisBarang') }}">
            @csrf
            <div class="form-group">
              <label for="jns_brg_kode">Kode Jenis Barang</label>
              <input type="text" name="jns_brg_kode" class="form-control" value="{{ \App\Models\tr_jenis_barang::generateId() }}" readonly />
            </div>
            <div class="form-group">
              <label for="jns_brg_nama">Nama Jenis Barang</label>
              <input type="text" name="jns_brg_nama" class="form-control" placeholder="Nama Jenis Barang" required />
            </div>
            <button type="submit" class="btn btn-primary p-3">
              Input
            </button>
          </form>          
        </div>
      </div>
    </div>
  </div>
  @endsection