@extends('templates.header')

@section('content') <div class="main-panel">
  <div class="content-wrapper">
    <div class="row">
      <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Input Data Barang</h4>
            <form class="forms-sample">
              <div class="form-group">
                <label for="exampleInputUsername1">Kode Barang</label>
                <input type="text" class="form-control" id="exampleInputUsername1" placeholder="Kode Barang" />
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Nama Barang</label>
                <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Nama Barang" />
              </div>
              <div class="form-group">
                <label for="exampleSelectGender">Jenis Barang</label>
                <select class="form-select" id="exampleSelectGender">
                  <option>Elektronik</option>
                  <option>Alat Tulis</option>
                  <option>Peralatan Kelas</option>
                  <option>Makanan</option>
                  <option>Minuman</option>
                </select>
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Tanggal Masuk Barang</label>
                <input type="date" class="form-control" placeholder="dd/mm/yyyy" />
              </div>
              <button type="submit" class="btn btn-primary me-2">
                Input
              </button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection