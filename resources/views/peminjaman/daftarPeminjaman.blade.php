@extends('templates.header')

@section('content') 
<div class="main-panel">
  <div class="content-wrapper">
    <div class="row">
      <div class="col-md-12 grid-margin">
        <h3 class="mb-4">Daftar Peminjaman</h3>
        <a href="{{ route('peminjaman') }}" class="btn btn-primary mb-3 p-3">
          <i class="mdi mdi-plus-circle-outline px-1"></i>
          Tambah Peminjaman
        </a>
        <div class="card">
          <div class="card-body">
            <div class="row">
              <div class="col-12">
                <div class="table-responsive">
                  <table id="peminjamanTable" class="display expandable-table" style="width:100%">
                    <thead>
                      <tr class="text-center">
                        <th>ID</th>
                        <th>User</th>
                        <th>Tanggal Peminjaman</th>
                        <th>Tanggal Kembali</th>
                        <th>Detail</th>
                        <th>Status</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($peminjaman as $pem)
                      <tr class="text-center">
                        <td>{{ $pem->pb_id }}</td>
                        <td>{{ $pem->user->user_nama ?? 'Tidak ada' }}</td>
                        <td>{{ $pem->pb_tgl }}</td>
                        <td>{{ $pem->pb_harus_kembali_tgl }}</td>
                        <td>
                          <a href="#" data-bs-toggle="modal" data-bs-target="#peminjamanModal-{{ $pem->pb_id }}">
                            Detail Peminjaman
                          </a>
                        </td>
                        <td>
                          <p class="{{ $pem->pb_stat == 1 ? 'status-active' : 'status-pinjam' }}">
                            {{ $pem->pb_stat == 1 ? 'dipinjam' : 'dikembalikan' }}
                          </p>
                        </td>
                      </tr>

                      <!-- Modal Detail Peminjaman -->
                      <div class="modal fade" id="peminjamanModal-{{ $pem->pb_id }}" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title">Detail Peminjaman</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>
                            <div class="modal-body">
                              <div class="form-group d-flex align-items-center">
                                <label for="nis" class="me-2">NIS :</label>
                                <p>{{ $pem->pb_no_siswa }}</p>
                              </div>
                              <div class="form-group d-flex align-items-center">
                                <label for="nis" class="me-2">Nama Siswa :</label>
                                <p>{{ $pem->pb_nama_siswa }}</p>
                              </div>
                              <div class="form-group d-flex align-items-center">
                                <label for="kelas" class="me-2">Kelas :</label>
                                <p>{{ $pem->kelas->kelas ?? 'Tidak ada' }}</p>
                              </div>
                              <div class="form-group d-flex align-items-center">
                                <label for="jurusan" class="me-2">Jurusan :</label>
                                <p>{{ $pem->jurusan->nama_jurusan ?? 'Tidak ada' }}</p>
                              </div>

                              <hr>
                              <h5 class="mb-3">Barang Dipinjam</h5>
                              @if(!empty($pem->barang) && count($pem->barang) > 0)
                                <ul>
                                  @foreach($pem->barang as $barang)
                                    <li>
                                      <p class="mb-3">{{ $barang->barangInventaris->br_nama ?? 'Tidak ada' }} - {{ $barang->barangInventaris->jenisBarang->jns_brg_nama ?? 'Tidak ada' }}</p>
                                    </li>
                                  @endforeach
                                </ul>
                              @else
                                <p>Tidak ada barang dipinjam.</p>
                              @endif
                            </div>
                          </div>
                        </div>
                      </div>
                      @endforeach
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
@endsection