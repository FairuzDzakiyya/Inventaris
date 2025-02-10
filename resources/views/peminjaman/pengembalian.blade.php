@extends('templates.header')

@section('content')
<div class="main-panel">
  <div class="content-wrapper">
    <div class="row">
      <div class="col-md-12 grid-margin">
        <div class="card">
          <div class="card-body">
            <h3 class="mb-4">Pengembalian Barang</h3>
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
            <form action="{{ route('dataPengembalian') }}" method="POST">
              @csrf
              <div class="mb-3">
                <label for="pb_id" class="form-label">Pilih Peminjaman</label>
                <select id="pb_id" name="pb_id" class="form-select">
                  <option value="" selected>-- Pilih Peminjaman --</option>
                  @foreach($peminjaman as $pem)
                    <option value="{{ $pem->pb_id }}">{{ $pem->pb_nama_siswa }} - {{ $pem->pb_no_siswa }}</option>
                  @endforeach
                </select>
              </div>
          </div>
      </div>

        <!-- Tabel Detail Peminjaman -->
        <div class="card mt-4" id="detailPeminjaman" style="display: none;">
          <div class="card-body">
            <h4>Detail Peminjaman</h4>
            <div class="table-responsive">
              <table class="display expandable-table" style="width: 100%">
                <thead>
                  <tr>
                    <th>ID Peminjaman</th>
                    <th>User</th>
                    <th>Nama Barang</th>
                    <th>Tanggal Peminjaman</th>
                    <th>Tanggal Kembali</th>
                  </tr>
                </thead>
                <tbody id="detailTableBody">
                </tbody>
              </table>
            </div>
            <button type="submit" class="btn btn-primary p-3 mt-3">Kembalikan</button>
          </div>
        </div>
        </form>
      </div>
    </div>
  </div>
</div>
<script>
  document.getElementById('pb_id').addEventListener('change', function () {
    var peminjamanId = this.value;
    var detailTableBody = document.getElementById('detailTableBody');
    detailTableBody.innerHTML = "";

    var peminjamanData = @json($peminjaman);
    console.log("Data Peminjaman:", peminjamanData);

    var selectedPeminjaman = peminjamanData.find(p => p.pb_id == peminjamanId);

    if (selectedPeminjaman && selectedPeminjaman.barang.length > 0) {
      selectedPeminjaman.barang.forEach(function (barang) {
        var row = `<tr>
          <td>${selectedPeminjaman.pb_id}</td>
          <td>${selectedPeminjaman.user.user_nama ?? 'Tidak diketahui'}</td>
          <td>${barang.barang_inventaris.br_nama ?? 'Tidak ada'}</td>
          <td>${selectedPeminjaman.pb_tgl ?? 'Tidak diketahui'}</td>
          <td>${selectedPeminjaman.pb_harus_kembali_tgl ?? 'Tidak ada'}</td>
        </tr>`;
        detailTableBody.innerHTML += row;
      });

      document.getElementById('detailPeminjaman').style.display = 'block';
    } else {
      document.getElementById('detailPeminjaman').style.display = 'none';
    }
  });
</script>
@endsection