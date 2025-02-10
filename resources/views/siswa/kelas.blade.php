@extends('templates.header')

@section('content') 
<div class="container mt-4">
    <h2>Tambah Kelas</h2>
    <form action="{{ route('kelas.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="kelas_id" class="form-label">ID Kelas</label>
            <input type="text" class="form-control" id="kelas_id" name="kelas_id" required>
        </div>
        <div class="mb-3">
            <label for="jurusan_id" class="form-label">Jurusan</label>
            <select class="form-control" id="jurusan_id" name="jurusan_id" required>
                <option value="">Pilih Jurusan</option>
                @foreach ($jurusan as $jrs)
                    <option value="{{ $jrs->jurusan_id }}">{{ $jrs->jurusan_nama }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="kelas" class="form-label">Nama Kelas</label>
            <input type="text" class="form-control" id="kelas" name="kelas" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection