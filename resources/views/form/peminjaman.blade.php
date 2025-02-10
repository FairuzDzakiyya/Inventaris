@extends('templates.header')

@section('content')
<div class="main-panel">
  <div class="content-wrapper">
    <div class="row">
      <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Form Input Peminjaman</h4>

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

            <!-- Form Identitas -->
            <div id="form-identitas" class="form-section">
              <form id="identitas-form" method="POST">
                @csrf

                <div class="form-group">
                  <label for="pb_nama_siswa">Nama Siswa</label>
                  <input type="text" class="form-control" id="pb_nama_siswa" name="pb_nama_siswa"
                    placeholder="Masukkan nama siswa" required>
                </div>

                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="pb_no_siswa">NIS</label>
                      <input type="number" class="form-control" id="pb_no_siswa" name="pb_no_siswa"
                        placeholder="Masukkan NIS" required>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="kelas_id">Kelas</label>
                      <select class="form-select" name="kelas_id" required>
                        <option value="">Pilih Kelas</option>
                        @foreach ($kelass as $kelas)
              <option value="{{ $kelas->kelas_id }}">{{ $kelas->kelas }}</option>
            @endforeach
                      </select>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="pb_tgl">Tanggal Peminjaman</label>
                      <input type="date" class="form-control" id="pb_tgl" name="pb_tgl" required>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="pb_harus_kembali_tgl">Tanggal Pengembalian</label>
                      <input type="date" class="form-control" id="pb_harus_kembali_tgl" name="pb_harus_kembali_tgl"
                        required>
                    </div>
                  </div>
                </div>

                <div class="d-flex justify-content-between mt-3">
                  <a href="{{ route('daftarPeminjaman') }}" class="btn btn-outline-info p-3">Kembali</a>
                  <button type="button" id="to-select-barang" class="btn btn-primary">Selanjutnya</button>
                </div>
              </form>
            </div>

            <!-- Form Select Barang -->
            <div id="select-barang" class="form-section d-none">
              <form id="barang-form" method="POST" action="{{ route('peminjaman') }}">
                @csrf

                <!-- Input Hidden dari Identitas -->
                <input type="hidden" name="pb_nama_siswa" id="hidden_pb_nama_siswa">
                <input type="hidden" name="pb_no_siswa" id="hidden_pb_no_siswa">
                <input type="hidden" name="kelas_id" id="hidden_kelas_id">
                <input type="hidden" name="pb_tgl" id="hidden_pb_tgl">
                <input type="hidden" name="pb_harus_kembali_tgl" id="hidden_pb_harus_kembali_tgl">

                <div class="card">
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="display expandable-table" style="width: 100%">
                        <thead>
                          <tr>
                            <th>Kode Barang</th>
                            <th>Nama Barang</th>
                            <th>Pilih</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($barangs as $barang)
                <tr>
                <td>{{ $barang->br_kode }}</td>
                <td>{{ $barang->br_nama }}</td>
                <td class="text-center">
                  <input type="checkbox" name="id[]" class="barang-checkbox" value="{{ $barang->br_kode }}">
                </td>
                </tr>
              @endforeach
                        </tbody>
                      </table>

                      <div class="d-flex justify-content-between mt-3">
                        <button type="button" id="to-form-identitas" class="btn btn-outline-info p-3">Kembali</button>
                        <button type="submit" class="btn btn-primary">Pinjam</button>
                      </div>

                    </div>
                  </div>
                </div>
              </form>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>

  <script>
    document.addEventListener("DOMContentLoaded", function () {
      const formIdentitas = document.getElementById("form-identitas");
      const formBarang = document.getElementById("select-barang");
      const toFormBarang = document.getElementById("to-select-barang");
      const toFormIdentitas = document.getElementById("to-form-identitas");

      // Input hidden untuk menyimpan data dari form identitas
      const hiddenPbNamaSiswa = document.getElementById("hidden_pb_nama_siswa");
      const hiddenPbNoSiswa = document.getElementById("hidden_pb_no_siswa");
      const hiddenKelasId = document.getElementById("hidden_kelas_id");
      const hiddenPbTgl = document.getElementById("hidden_pb_tgl");
      const hiddenPbHarusKembaliTgl = document.getElementById("hidden_pb_harus_kembali_tgl");

      // Navigasi ke form barang
      toFormBarang.addEventListener("click", () => {
        // Isi input hidden sebelum berpindah halaman
        hiddenPbNamaSiswa.value = document.getElementById("pb_nama_siswa").value;
        hiddenPbNoSiswa.value = document.getElementById("pb_no_siswa").value;
        hiddenKelasId.value = document.querySelector("[name='kelas_id']").value;
        hiddenPbTgl.value = document.getElementById("pb_tgl").value;
        hiddenPbHarusKembaliTgl.value = document.getElementById("pb_harus_kembali_tgl").value;

        formIdentitas.classList.add("d-none");
        formBarang.classList.remove("d-none");
      });

      // Navigasi kembali ke form identitas
      toFormIdentitas.addEventListener("click", () => {
        formBarang.classList.add("d-none");
        formIdentitas.classList.remove("d-none");
      });
    });
    
      document.addEventListener("DOMContentLoaded", function () {
    const nisInput = document.getElementById("pb_no_siswa");

      // Mencegah input huruf
      nisInput.addEventListener("input", function () {
        this.value = this.value.replace(/\D/g, ''); // Menghapus karakter non-angka
    });

      // Mencegah paste teks non-angka
      nisInput.addEventListener("paste", function (event) {
        event.preventDefault();
      let pasted = (event.clipboardData || window.clipboardData).getData("text");
      this.value = pasted.replace(/\D/g, '');
    });

      // Mencegah input selain angka dari keyboard
      nisInput.addEventListener("keypress", function (event) {
      if (event.key < "0" || event.key > "9") {
        event.preventDefault();
      }
    });
  });
  </script>
  @endsection