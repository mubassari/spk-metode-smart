@extends('layouts.main')
@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tambah Data Kriteria</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('kriteria.index') }}">Kriteria</a></li>
            <li class="breadcrumb-item">Tambah Data</li>
        </ol>
    </div>
    <div class="card mb-3">
      <div class="card-body">
        <form action="{{ route('kriteria.store') }}" method="post">
          {{ csrf_field() }}
          <div class="form-group">
            <label for="input-nama">Nama Kriteria</label>
            <input type="text" class="form-control @error('nama') is-invalid @enderror" id="input-nama" name="nama" placeholder="Masukkan Nama Kriteria" value="{{ old('nama') }}">
            @error('nama')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
          <div class="form-group">
            <label for="input-bobot">Bobot Kriteria</label>
            <div class="input-group">
                <input type="text" class="form-control @error('bobot') is-invalid @enderror" id="input-bobot" name="bobot" placeholder="Masukkan Bobot Kriteria" value="{{ old('bobot') }}">
                <div class="input-group-append">
                    <span class="input-group-text">%</span>
                </div>
                @error('bobot')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
          </div>
          <button type="button" class="btn btn-primary" onclick="resetButton()">Reset</button>
          <button type="submit" class="btn btn-primary">Tambah</button>
        </form>
      </div>
    </div>
@endsection
<script>
    function resetButton(nama = "", bobot = "") {
        document.getElementById('input-nama').value = nama;
        document.getElementById('input-bobot').value = bobot;
    }
</script>
