@extends('layouts.main')
@section('content')
    <x-breadcrumb title="Ubah Data Alternatif" link="{{ route('alternatif.index') }}" item="Alternatif" subItem="Ubah Data" />
    <div class="card mb-3">
      <div class="card-body">
        <form action="{{ route('alternatif.update', [$alternatif->id]) }}" method="post">
            {{ csrf_field() }}
            {{ method_field('PUT') }}
            <div class="form-group">
                <label for="input-nama">Nama Alternatif</label>
                <input type="text" class="form-control @error('nama') is-invalid @enderror" id="input-nama" name="nama" placeholder="Masukkan Nama Alternatif" value="{{ old('nama') ?? $alternatif->nama }}">
                <x-errormessage error="nama" />
            </div>
            <button type="button" class="btn btn-primary" onclick="resetButton('{{ $alternatif->nama }}')">Reset</button>
            <button type="submit" class="btn btn-primary">Ubah</button>
        </form>
      </div>
    </div>
@endsection
<script>
    function resetButton(nama = "") {
        document.getElementById('input-nama').value = nama;
    }
</script>
