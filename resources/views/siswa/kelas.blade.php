@extends('templates.header')

@section('content') 
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <h3>Kelas</h3>
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
                    Tambah Kelas
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
                                                    <th>Jurusan</th>
                                                    <th>Kelas</th>
                                                    <th>No</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse ($kelas as $k)
                                                    <tr class="text-center">
                                                        <td>{{ $k->kelas_id }}</td>
                                                        <td>{{ $k->jurusan->nama_jurusan }}</td>
                                                        <td>{{ $k->kelas }}</td>
                                                        <td>{{ $k->no_kelas }}</td>
                                                        <td>
                                                            <form action="{{ route('hapusKelas', $k->kelas_id) }}"
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
                                                        <td colspan="2" class="text-center">Data tidak tersedia</td>
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
                    <h5 class="modal-title" id="modalLabel">Form Kelas</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="forms-sample" method="POST" action="{{ route('kelas') }}">
                        @csrf
                        <div class="form-group">
                            <label for="kelas">Kelas</label>
                            <input type="text" name="kelas" class="form-control" placeholder="Kelas" required />
                          </div>
                        <div class="form-group">
                            <label for="jns_brg_kode">Jurusan</label>
                            <select name="jns_brg_kode" class="form-select" required>
                                @foreach ($jurusan as $j)
                                    <option value="{{ $j->jurusan_id }}">{{ $j->nama_jurusan }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="no_kelas">No</label>
                            <input type="text" name="no_kelas" class="form-control" placeholder="No Kelas" required />
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