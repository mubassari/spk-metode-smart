@extends('layouts.main')
@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Ubah Data Kriteria</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('kriteria.index') }}">Kriteria</a></li>
            <li class="breadcrumb-item">Ubah Data</li>
        </ol>
    </div>
    <div class="card">
      <div class="card-body">
        <form action="{{ route('kriteria.update', [$kriteria->id]) }}" method="post">
            {{ csrf_field() }}
            {{ method_field('PUT') }}
            <div class="form-group">
                <label for="input-nama">Nama Kriteria</label>
                <input type="text" class="form-control @error('nama') is-invalid @enderror" id="input-nama" name="nama" placeholder="Masukkan Nama Kriteria" value="{{ $kriteria->nama }}">
                @error('nama')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="input-bobot">Bobot Kriteria</label>
                <div class="input-group">
                    <input type="number" class="form-control @error('bobot') is-invalid @enderror" id="input-bobot" name="bobot" placeholder="Masukkan Bobot Kriteria" value="{{ $kriteria->bobot }}" required>
                    <div class="input-group-append">
                        <span class="input-group-text">%</span>
                    </div>
                    @error('bobot')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror

                </div>
          </div>
          <button type="reset" class="btn btn-primary">Reset</button>
          <button type="submit" class="btn btn-primary">Ubah</button>
        </form>
      </div>
    </div>
@endsection
