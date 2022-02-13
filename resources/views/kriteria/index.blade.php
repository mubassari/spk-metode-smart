@extends('layouts.main')
@section('content')
<x-breadcrumb title="Tampil Data Kriteria" link="{{ route('kriteria.index') }}" item="Kriteria" subItem="Tampil Data" />
<x-alertmessage />
<div class="card mb-3">
    <div class="card-header d-flex flex-row align-items-end justify-content-end">
        <a href="{{ route('kriteria.create') }}" class="btn btn-primary">Tambah Kriteria</a>
    </div>
    <div class="table-responsive p-3">
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
