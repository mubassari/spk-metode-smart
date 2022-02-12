@extends('layouts.main')
@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Kriteria</h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Kriteria</a></li>
        <li class="breadcrumb-item">Data Kriteria</li>
    </ol>
</div>
<!-- Simple Tables -->
<div class="card">
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">Data Kriteria</h6>
        <a href="#" class="btn btn-primary">Tambah Kriteria</a>
    </div>
    <div class="table-responsive">
        <table class="table align-items-center table-flush">
        <thead class="thead-light">
            <tr>
                <th>No</th>
                <th>Kode</th>
                <th>Nama Kriteria</th>
                <th class="text-center">Opsi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($kriteria_ as $kriteria)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>C{{ str_pad($kriteria->id, 2, '0', STR_PAD_LEFT) }}</td>
                    <td>{{ $kriteria->nama }}</td>
                    <td class="text-center">
                        <a href="#" class="btn btn-sm btn-info">Edit</a>
                        <a href="#" class="btn btn-sm btn-danger">Hapus</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    </div>
</div>
@endsection
