@extends('templates.header')

@section('content')
<div class="container-fluid min-vh-100 d-flex flex-column justify-content-start py-4">
  <div class="row justify-content-center gx-3 gy-4">
    <div class="col-lg-6 col-md-6 col-sm-12">
      <div class="card card-stats h-100">
        <div class="card-body text-center">
          <div class="row">
            <div class="col-12 py-10">
              <div class="numbers">
                <p class="card-category">Barang Dipinjam</p>
                <p class="card-title">10 barang</p>
              </div>
            </div>
          </div>
        </div>
        <div class="card-footer">
          <hr>
        </div>
      </div>
    </div>

    <div class="col-lg-6 col-md-6 col-sm-12">
      <div class="card card-stats h-100">
        <div class="card-body text-center">
          <div class="row">
            <div class="col-12">
              <div class="numbers">
                <p class="card-category">Barang Tersedia</p>
                <p class="card-title">20 barang</p>
              </div>
            </div>
          </div>
        </div>
        <div class="card-footer">
          <hr>
        </div>
      </div>
    </div>
  </div>

  <div class="content">
    <div class="row mt-4">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title">Riwayat Barang</h4>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table">
                <thead class="text-primary">
                  <tr>
                    <th class="text-center">No</th>
                    <th class="text-center">Jenis Barang</th>
                    <th class="text-center">User</th>
                    <th class="text-center">Nama Barang</th>
                    <th class="text-center">Tanggal Masuk</th>
                    <th class="text-center">Tanggal Diterima</th>
                    <th class="text-center">Status</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td class="text-center">1</td>
                    <td class="text-center">Alat Kelas</td>
                    <td class="text-center">Siswa</td>
                    <td class="text-center">Kursi</td>
                    <td class="text-center">14/01/2025</td>
                    <td class="text-center">10/01/2025</td>
                    <td class="text-center">Diterima</td>
                  </tr>
                  <tr>
                    <td class="text-center">2</td>
                    <td class="text-center">Alat Kelas</td>
                    <td class="text-center">Siswa</td>
                    <td class="text-center">Meja</td>
                    <td class="text-center">14/01/2025</td>
                    <td class="text-center">12/01/2025</td>
                    <td class="text-center">Diterima</td>
                  </tr>
                  <tr>
                    <td class="text-center">3</td>
                    <td class="text-center">Alat Kelas</td>
                    <td class="text-center">Siswa</td>
                    <td class="text-center">Infocus</td>
                    <td class="text-center">14/01/2025</td>
                    <td class="text-center">15/01/2025</td>
                    <td class="text-center">Pending</td>
                  </tr>
                  <tr>
                    <td class="text-center">4</td>
                    <td class="text-center">Alat Kelas</td>
                    <td class="text-center">Siswa</td>
                    <td class="text-center">Laptop</td>
                    <td class="text-center">14/01/2025</td>
                    <td class="text-center">20/01/2025</td>
                    <td class="text-center">Diterima</td>
                  </tr>
                  <tr>
                    <td class="text-center">5</td>
                    <td class="text-center">Alat Kelas</td>
                    <td class="text-center">Siswa</td>
                    <td class="text-center">Terminal</td>
                    <td class="text-center">14/01/2025</td>
                    <td class="text-center">22/01/2025</td>
                    <td class="text-center">Pending</td>
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
@endsection