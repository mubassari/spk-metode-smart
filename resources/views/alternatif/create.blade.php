@extends('layouts.main')
@section('content')
    <x-breadcrumb title="Tambah Data Alternatif" link="{{ route('alternatif.index') }}" item="Alternatif" subItem="Tambah Data" />
    <div class="card mb-3">
      <div class="card-body">
        <form action="{{ route('alternatif.store') }}" method="post">
          {{ csrf_field() }}
          <div class="form-group">
            <label for="input-nama">Nama Alternatif</label>
            <input type="text" class="form-control @error('nama') is-invalid @enderror" id="input-nama" name="nama" placeholder="Masukkan Nama Alternatif" value="{{ old('nama') }}">
            <x-errormessage error="nama" />
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
