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
                        <th>User ID</th>
                        <th>Nama Barang</th>
                        <th>Status</th>
                        <th>Tanggal Terima</th>
                        <th>Tanggal Entry</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      @forelse ($barangs as $barang)
              <tr class="text-center">
              <td>{{ $barang->br_kode }}</td>
              <td>{{ $barang->jenisBarang->jns_brg_nama ?? '-' }}</td>
              <td>{{ $barang->user_id }}</td>
              <td>{{ $barang->br_nama }}</td>
              <td>{{ $barang->br_status == 1 ? 'Kondisi Baik' : 'Kondisi Rusak' }}</td>
              <td>{{ $barang->br_tgl_terima }}</td>
              <td>{{ $barang->br_tgl_entry }}</td>
              <td>
                <button class="btn btn-outline-info edit-btn" data-bs-toggle="modal"
                data-bs-target="#editBarangModal" data-br_kode="{{ $barang->br_kode }}"
                data-br_nama="{{ $barang->br_nama }}" data-br_status="{{ $barang->br_status }}"
                data-jns_brg_kode="{{ $barang->jenisBarang->jns_brg_kode ?? '' }}">
                <i class="mdi mdi-pencil"></i>
                </button>

                <button type="button" class="btn btn-outline-danger delete-btn mt-2" data-bs-toggle="modal"
                data-bs-target="#deleteConfirmModal" data-br_kode="{{ $barang->br_kode }}">
                <i class="mdi mdi-delete"></i>
                </button>
              </td>
              </tr>
            @empty
          <tr>
          <td colspan="7" class="text-center">Data tidak tersedia</td>
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

  <!-- Modal Edit -->
  <div class="modal fade" id="editBarangModal" tabindex="-1" aria-labelledby="editPeminjamanModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editModal">Edit Barang</h5>
        </div>
        <div class="modal-body">
          <form action="" method="POST" id="editBarangForm">
            @csrf
            @method('PUT')
            <div class="mb-3">
              <label for="br_nama" class="form-label">Nama Barang</label>
              <input type="text" class="form-control" id="br_nama" name="br_nama" required>
            </div>
            <div class="form-group">
              <label for="editJenis">Jenis Barang</label>
              <select name="jns_brg_kode" id="editJenis" class="form-select" required>
                @foreach ($jeniss as $jenis)
          <option value="{{ $jenis->jns_brg_kode }}">{{ $jenis->jns_brg_nama }}</option>
        @endforeach
              </select>
            </div>
            <div class="form-group">
              <label for="editStatus">Jenis Barang</label>
              <select name="br_status" id="editStatus" class="form-select" required>
                <option value="1">Baik</option>
                <option value="2">Rusak</option>
              </select>
            </div>
            <div class="mb-3">
              <button type="submit" class="btn btn-primary w-100">Update</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal Konfirmasi Hapus -->
  <div class="modal fade" id="deleteConfirmModal" tabindex="-1" aria-labelledby="deleteConfirmLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="deleteConfirmLabel">Konfirmasi Hapus</h5>
        </div>
        <div class="modal-body">
          <p>Apakah Anda yakin ingin menghapus barang ini?</p>
        </div>
        <div class="modal-footer">
          <form id="deleteForm" method="POST">
            @csrf
            @method('DELETE')
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-danger">Hapus</button>
          </form>
        </div>
      </div>
    </div>
  </div>

  <script>
    document.addEventListener("DOMContentLoaded", function () {
      let editButtons = document.querySelectorAll(".edit-btn");

      editButtons.forEach((button) => {
        button.addEventListener("click", function () {
          let br_kode = this.dataset.br_kode;
          let br_nama = this.dataset.br_nama;
          let br_status = this.dataset.br_status;
          let jns_brg_kode = this.dataset.jns_brg_kode;

          document.getElementById("br_nama").value = br_nama;

          let editJenis = document.getElementById("editJenis");
          for (let option of editJenis.options) {
            option.selected = option.value === jns_brg_kode;
          }
          let editStatus = document.getElementById("editStatus");
          for (let option of editStatus.options) {
            option.selected = option.value === br_status;
          }

          // Update the form action dynamically
          document.getElementById("editBarangForm").action = `/penerimaan/${br_kode}`;
        });
      });
    });

    document.addEventListener("DOMContentLoaded", function () {
      let deleteButtons = document.querySelectorAll(".delete-btn");

      deleteButtons.forEach((button) => {
        button.addEventListener("click", function () {
          let br_kode = this.dataset.br_kode;
          document.getElementById("deleteForm").action = `/penerimaan/${br_kode}`;
        });
      });
    });
  </script>
  @endsection