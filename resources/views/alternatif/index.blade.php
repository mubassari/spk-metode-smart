@extends('layouts.main')
@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Tampil Data Alternatif</h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('alternatif.index') }}">Alternatif</a></li>
        <li class="breadcrumb-item">Tampil Data</li>
    </ol>
</div>
<div class="card mb-3">
    <div class="card-header d-flex flex-row align-items-end justify-content-end">
        <a href="{{ route('alternatif.create') }}" class="btn btn-primary">Tambah Alternatif</a>
    </div>
    <div class="table-responsive p-3">
        <table class="table align-items-center table-flush">
        <thead class="thead-light">
            <tr>
                <th>No</th>
                <th>Kode</th>
                <th>Nama Alternatif</th>
                <th class="text-center">Opsi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($alternatif_ as $alternatif)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>A{{ str_pad($alternatif->id, 2, '0', STR_PAD_LEFT) }}</td>
                    <td>{{ $alternatif->nama }}</td>
                    <td class="text-center d-flex justify-content-around">
                        <a href="{{ route('alternatif.edit', [$alternatif->id]) }}" class="btn btn-sm btn-info">Ubah</a>
                        <form method="POST" action="{{ route('alternatif.destroy', [$alternatif->id]) }}">
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
