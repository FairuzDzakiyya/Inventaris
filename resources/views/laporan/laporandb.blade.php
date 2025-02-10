@extends('templates.header')

@section('content') 
<div class="main-panel">
  <div class="content-wrapper">
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <p class="card-title">Laporan Daftar Barang</p>
              <div class="row">
                <div class="col-12">
                  <div class="table-responsive">
                    <table id="example" class="display expandable-table" style="width:100%">
                      <thead>
                        <tr class="text-center">
                          <th>Kode</th>
                          <th>Jenis Barang</th>
                          <th>User id</th>
                          <th>Nama Barang</th>
                          <th>Tanggal Terima</th>
                          <th>Tanggal Entry</th>
                          <th>Status</th>
                          {{-- reminder edit --}}
                        </tr>
                      </thead>
                      <tbody>
                        <tr class="text-center">
                            <td>INV202500001</td>
                            <td>Elektronik</td>
                            <td>2</td>
                            <td>Infocus</td>
                            <td>2025-01-22</td>
                            <td>2025-01-25</td>
                            <td><p class="status-active">Tersedia</p></td>
                        </tr>
                        <tr class="text-center">
                            <td>INV202500002</td>
                            <td>Alat Tulis</td>
                            <td>3</td>
                            <td>Spidol</td>
                            <td>2025-01-22</td>
                            <td>2025-01-25</td>
                            <td><p class="status-active">Tersedia</p></td>
                        </tr>
                        <tr class="text-center">
                            <td>INV202500003</td>
                            <td>Alat Tulis</td>
                            <td>3</td>
                            <td>Spidol</td>
                            <td>2025-01-22</td>
                            <td>2025-01-25</td>
                            <td><p class="status-pinjam">Dipinjam</p></td>
                        </tr>
                        <tr class="text-center">
                            <td>INV202500004</td>
                            <td>Alat Tulis</td>
                            <td>3</td>
                            <td>Spidol</td>
                            <td>2025-01-22</td>
                            <td>2025-01-25</td>
                            <td><p class="status-pinjam">Dipinjam</p></td>
                        </tr>
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
@endsection