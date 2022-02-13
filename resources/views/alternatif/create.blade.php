@extends('layouts.main')
@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tambah Data Alternatif</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('alternatif.index') }}">Alternatif</a></li>
            <li class="breadcrumb-item">Tambah Data</li>
        </ol>
    </div>
    <div class="card mb-3">
      <div class="card-body">
        <form action="{{ route('alternatif.store') }}" method="post">
          {{ csrf_field() }}
          <div class="form-group">
            <label for="input-nama">Nama Alternatif</label>
            <input type="text" class="form-control @error('nama') is-invalid @enderror" id="input-nama" name="nama" placeholder="Masukkan Nama Alternatif" value="{{ old('nama') }}">
            @error('nama')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
          <button type="button" class="btn btn-primary" onclick="resetButton()">Reset</button>
          <button type="submit" class="btn btn-primary">Tambah</button>
        </form>
      </div>
    </div>
@endsection
<script>
    function resetButton(nama = "") {
        document.getElementById('input-nama').value = nama;
    }
</script>
