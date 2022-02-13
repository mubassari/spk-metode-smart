@extends('layouts.main')
@section('content')
<x-breadcrumb title="Tampil Data Kriteria" link="{{ route('kriteria.index') }}" item="Kreteria" subItem="Tampil Data" />
<x-alertmessage />
<div class="card mb-3">
    <div class="card-header d-flex flex-row align-items-end justify-content-end">
        <a href="{{ route('parameter.create') }}" class="btn btn-primary">Tambah Parameter</a>
    </div>
    <div class="table-responsive p-3">
        <table class="table align-items-center table-flush">
        <thead class="thead-light">
            <tr>
                <th>No</th>
                <th>Nama Kriteria</th>
                <th>Nama Sub Kriteria</th>
                <th>Bobot Kriteria</th>
                <th class="text-center">Opsi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($parameter_ as $parameter)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $parameter->nama_kriteria }}</td>
                    <td>{{ $parameter->nama }}</td>
                    <td>{{ $parameter->bobot }}</td>
                    <td class="text-center d-flex justify-content-around">
                        <a href="{{ route('parameter.edit', [$parameter->id]) }}" class="btn btn-sm btn-info">Ubah</a>
                        <form method="POST" action="{{ route('parameter.destroy', [$parameter->id]) }}">
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