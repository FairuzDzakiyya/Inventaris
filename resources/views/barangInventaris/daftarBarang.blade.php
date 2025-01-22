@extends('templates.header')

@section('content') 
<div class="main-panel">
  <div class="content-wrapper">
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <p class="card-title">Daftar Barang</p>
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
                          <th></th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr class="text-center">
                            <th>INV202500001</th>
                            <th>Elektronik</th>
                            <th>2</th>
                            <th>Infocus</th>
                            <th>2025-01-22</th>
                            <th>2025-01-25</th>
                            <th>Masuk</th>
                        </tr>
                        <tr class="text-center">
                            <th>INV202500002</th>
                            <th>Alat Tulis</th>
                            <th>3</th>
                            <th>Spidol</th>
                            <th>2025-01-22</th>
                            <th>2025-01-25</th>
                            <th>Pinjam</th>
                        </tr>
                        <tr class="text-center">
                            <th>INV202500003</th>
                            <th>Alat Tulis</th>
                            <th>3</th>
                            <th>Spidol</th>
                            <th>2025-01-22</th>
                            <th>2025-01-25</th>
                            <th>Pinjam</th>
                        </tr>
                        <tr class="text-center">
                            <th>INV202500004</th>
                            <th>Alat Tulis</th>
                            <th>3</th>
                            <th>Spidol</th>
                            <th>2025-01-22</th>
                            <th>2025-01-25</th>
                            <th>Pinjam</th>
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