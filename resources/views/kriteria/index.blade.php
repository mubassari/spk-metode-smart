@extends('layouts.main')
@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Tampil Data Kriteria</h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('kriteria.index') }}">Kriteria</a></li>
        <li class="breadcrumb-item">Tampil Data</li>
    </ol>
</div>
<!-- Simple Tables -->
<div class="card">
    <div class="card-header py-3 d-flex flex-row align-items-end justify-content-end">
        <a href="{{ route('kriteria.create') }}" class="btn btn-primary">Tambah Kriteria</a>
    </div>
    <div class="table-responsive">
        <table class="table align-items-center table-flush">
        <thead class="thead-light">
            <tr>
                <th>No</th>
                <th>Kode</th>
                <th>Nama Kriteria</th>
                <th>Bobot Kriteria</th>
                <th class="text-center">Opsi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($kriteria_ as $kriteria)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>C{{ str_pad($kriteria->id, 2, '0', STR_PAD_LEFT) }}</td>
                    <td>{{ $kriteria->nama }}</td>
                    <td>{{ $kriteria->bobot }}</td>
                    <td class="text-center d-flex justify-content-around">
                        <a href="{{ route('kriteria.edit', [$kriteria->id]) }}" class="btn btn-sm btn-info">Ubah</a>
                        <form method="POST" action="{{ route('kriteria.destroy', [$kriteria->id]) }}">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <input type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Hapus data ini?')" value="Hapus">
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    </div>
</div>
@endsection
