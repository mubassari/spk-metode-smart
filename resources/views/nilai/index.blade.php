@extends('layouts.main')
@section('content')
<x-breadcrumb title="Tampil Data Nilai" link="{{ route('nilai.index') }}" item="Nilai" subItem="Tampil Data" />
<div class="row">
    <div class="col-lg-6">
        <div class="card mb-4">
                <div class="card-body">
                    <h6 class="m-0 font-weight-bold text-primary">Daftarkan Alternatif</h6>
                    <form action="{{ route('nilai.create') }}" method="GET" class="mt-3">
                        <div class="form-group">
                            <select name="id_alternatif" class="form-control" id="namaAlternatif">
                                <option value="">Pilih</option>
                                @foreach ($alternatif_ as $alternatif)
                                    <option value="{{ $alternatif->id }}">{{ $alternatif->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Daftar</button>
                    </form>
                </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="card mb-4">
                <div class="card-body">
                    <h4 class="mb-2 font-weight-bold text-primary">Alternatif yang sudah terdaftar</h4>
                    <ul class="list-group">
                        @foreach ($result->groupBy('nama_alternatif')->keys() as $value)
                            <li class="list-group-item">{{ $value }}</li>
                        @endforeach
                    </ul>
                </div>
        </div>
    </div>
</div>
<div class="col-lg-12 mb-4">
    <!-- Simple Tables -->
    @foreach ($result->groupBy('nama_alternatif') as $key => $value)
        <div class="card mb-4">
            <div class="card-header py-3">
                <h4 class="mb-2 font-weight-bold text-primary">Nama Alternatif : {{ $key }}</h4>
                <div class="d-flex">
                    <form method="POST" action="{{ route('nilai.delete') }}" class="mr-2">
                        {{ csrf_field() }}
                        <input type="hidden" name="nama_alternatif" value="{{ $key }}">
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Hapus data ini?')">Hapus</button>
                    </form>
                    <form method="POST" action="{{ route('nilai.edit') }}">
                        {{ csrf_field() }}
                        <input type="hidden" name="nama_alternatif" value="{{ $key }}">
                        <button type="submit" class="btn btn-sm btn-info">Ubah</button>
                    </form>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table align-items-center table-flush">
                    <thead class="thead-light">
                        <tr>
                            @foreach ($value->groupBy("nama_kriteria")->keys() as $kriteria)
                                <th class="text-center">{{ $kriteria }}</th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            @foreach ($value->groupBy("nama_parameter")->keys() as $parameter)
                                <td class="text-center">{{ $parameter }}</td>
                            @endforeach
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    @endforeach
@endsection
