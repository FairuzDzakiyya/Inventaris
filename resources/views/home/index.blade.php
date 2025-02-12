@extends('templates.header')

@section('content') 
<div class="main-panel">
  <div class="content-wrapper">
    <div class="row">
      <div class="col-md-12 grid-margin">
        <div class="row">
          <div class="col-12 col-xl-8 mb-4 mb-xl-0">
            <h2>Halo, {{ Auth::user()->user_nama }} </h2>
          </div>
          <div class="col-12 grid-margin transparent mt-3">
            <div class="row">
              <div class="col-md-4 mb-4 stretch-card transparent">
                <div class="card card-tale">
                  <div class="card-body">
                    <p class="mb-4">Jumlah Barang</p>
                    <p class="fs-30 mb-2">7</p>
                  </div>
                </div>
              </div>
              <div class="col-md-4 mb-4 stretch-card transparent">
                <div class="card card-dark-blue">
                  <div class="card-body">
                    <p class="mb-4">Jumlah Peminjaman</p>
                    <p class="fs-30 mb-2">3</p>
                  </div>
                </div>
              </div>
              <div class="col-md-4 mb-4 stretch-card transparent">
                <div class="card card-light-danger">
                  <div class="card-body">
                    <p class="mb-4">Jumlah Pengembalian</p>
                    <p class="fs-30 mb-2">1</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <p class="card-title">Grafik Pengembalian dan Peminjaman Barang</p>
                <p class="font-weight-500">Grafik ini menunjukkan jumlah pengembalian dan peminjaman barang dalam periode waktu tertentu.</p>
                <div class="d-flex flex-wrap mb-5">
                  <div class="me-5 mt-3">
                    <p class="text-muted">Pengembalian Barang</p>
                    <h3 class="text-primary fs-30 font-weight-medium">12</h3>
                  </div>
                  <div class="me-5 mt-3">
                    <p class="text-muted">Peminjaman Barang</p>
                    <h3 class="text-primary fs-30 font-weight-medium">20</h3>
                  </div>
                </div>
                <canvas id="order-chart"></canvas>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection