@extends('layouts.main')
@section('content')
    <x-breadcrumb title="Tambah Data Kreteria" link="{{ route('kriteria.index') }}" item="Kreteria" subItem="Tambah Data" />
    <div class="card mb-3">
      <div class="card-body">
        <form action="{{ route('kriteria.store') }}" method="post">
          {{ csrf_field() }}
          <div class="form-group">
            <label for="input-nama">Nama Kriteria</label>
            <input type="text" class="form-control @error('nama') is-invalid @enderror" id="input-nama" name="nama" placeholder="Masukkan Nama Kriteria" value="{{ old('nama') }}">
            <x-errormessage error="nama" />
        </div>
        <div class="form-group">
            <label for="input-bobot">Bobot Kriteria</label>
            <div class="input-group">
                <input type="text" class="form-control @error('bobot') is-invalid @enderror" id="input-bobot" name="bobot" placeholder="Masukkan Bobot Kriteria" value="{{ old('bobot') }}" onkeypress="return checkNumber(event)">
                <div class="input-group-append">
                    <span class="input-group-text">%</span>
                </div>
                <x-errormessage error="bobot" />
            </div>
          </div>
          <button type="button" class="btn btn-primary" onclick="resetButton()">Reset</button>
          <button type="submit" class="btn btn-primary">Tambah</button>
        </form>
      </div>
    </div>
@endsection
<script>
    function checkNumber(value) {
        return /(^\d+$)/.test(value.key);
    }
    function resetButton(nama = "", bobot = "") {
        document.getElementById('input-nama').value = nama;
        document.getElementById('input-bobot').value = bobot;
    }
</script>
