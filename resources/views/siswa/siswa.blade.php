
@extends('templates.header')

@section('content') 
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <h3>Siswa</h3>
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
                    Tambah Data Siswa
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
                                                    <th>ID</th>
                                                    <th>Kelas</th>
                                                    <th>Jurusan</th>
                                                    <th>Nama Siswa</th>
                                                    <th>NIS</th>
                                                    <th>Jenis Kelamin</th>
                                                    <th>Email</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse ($siswa as $s)
                                                    <tr class="text-center">
                                                        <td>{{ $s->siswa_id }}</td>
                                                        <td>{{ $s->kelas->kelas ?? 'Tidak ada' }}</td>
                                                        <td>{{ $s->jurusan->nama_jurusan ?? 'Tidak ada' }}</td>
                                                        <td>{{ $s->nama_siswa }}</td>
                                                        <td>{{ $s->nis }}</td>
                                                        <td>{{ $s->jk }}</td>
                                                        <td>{{ $s->email }}</td>
                                                        <td>
                                                            <form action="{{ route('hapusSiswa', $s->siswa_id) }}"
                                                                method="POST"
                                                                onsubmit="return confirm('Yakin ingin menghapus?')">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn btn-outline-danger">
                                                                    <i class="mdi mdi-delete"></i>
                                                                </button>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                @empty
                                                    <tr>
                                                        <td colspan="8" class="text-center">Data tidak tersedia</td>
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
                    <h5 class="modal-title" id="modalLabel">Form Siswa</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="forms-sample" method="POST" action="{{ route('postSiswa') }}">
                        @csrf
                        <div class="form-group">
                            <label for="nis">NIS</label>
                            <input type="number" class="form-control" id="nis" name="nis"
                                placeholder="Masukkan NIS" required>
                        </div>
                        <div class="form-group">
                            <label for="nama_siswa">Nama Siswa</label>
                            <input type="text" name="nama_siswa" class="form-control" placeholder="Nama Siswa" required />
                        </div>
                        <div class="form-group">
                            <label for="kelas_id">Kelas</label>
                            <select name="kelas_id" class="form-select" required>
                                @foreach ($kelas as $k)
                                    <option value="{{ $k->kelas_id }}">{{ $k->kelas }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="jurusan_id">Jurusan</label>
                            <select name="jurusan_id" class="form-select" required>
                                @foreach ($jurusan as $j)
                                    <option value="{{ $j->jurusan_id }}">{{ $j->nama_jurusan }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="jk">Jenis Kelamin</label>
                            <select name="jk" class="form-select" required>
                                <option value="L">Laki-laki</option>
                                <option value="P">Perempuan</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" class="form-control" placeholder="Email" />
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