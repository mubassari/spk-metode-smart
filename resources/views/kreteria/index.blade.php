@extends('layouts.main')
@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Kreteria</h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Kreteria</a></li>
        <li class="breadcrumb-item">Data Kreteri</li>
    </ol>
</div>
<div class="row">
    <div class="col-lg-6 col-md-8 col-12 mb-5">
    <!-- Simple Tables -->
        <div class="card">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Data Kreteria</h6>
                <a href="#" class="btn btn-primary">Tambah Kreteria</a>
            </div>
            <div class="table-responsive">
                <table class="table align-items-center table-flush">
                <thead class="thead-light">
                    <tr>
                        <th>No</th>
                        <th>Kode</th>
                        <th>Nama Kreteria</th>
                        <th class="text-center">Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($kreteria_ as $kreteria)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $kreteria->kode }}</td>
                            <td>{{ $kreteria->nama_kreteria }}</td>
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
    </div>
</div>
@endsection
