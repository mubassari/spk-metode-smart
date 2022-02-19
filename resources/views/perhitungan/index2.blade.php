@extends('layouts.main')
@push('style')
<link href="{{ asset('assets/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endpush
@section('content')
<x-breadcrumb title="Tampil Data Perhitungan" link="#" item="Perhitungan" subItem="Tampil Data" />
@if (auth()->user()->level === 'admin')
<div class="mb-3 d-flex flex-row align-items-end justify-content-end d-print-none">
    <button onclick="{{ 'window.location.href=\''.route('perhitungan.cetak').'\'' }}" class="btn btn-danger">
        <i class="fas fa-file-pdf"></i> Cetak Data
    </button>
</div>
@endif
<div class="card mb-4">
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h4 class="m-0 font-weight-bold text-primary">Normalisasi Kriteria</h4>
    </div>
    <div class="table-responsive px-3 pb-3">
        <table class="table align-items-center table-hover table-bordered">
            <thead class="thead-light">
                <tr>
                    <th>Nama Bobot</th>
                    <th>Bobot</th>
                    <th>Normalisasi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($kriteria_ as $kriteria)
                <tr>
                    <th>{{ $kriteria->nama }}</th>
                    <td>{{ $kriteria->bobot }}</td>
                    <td>{{ $kriteria->normalisasi }}</td>
                </tr>
                @endforeach
            </tbody>
            <tfoot class="thead-light">
                <th>Jumlah</th>
                <th>{{ $kriteria_->pluck('bobot')->sum() }}</th>
                <th>{{ $kriteria_->pluck('normalisasi')->sum() }}</th>
            </tfoot>
        </table>
    </div>
</div>
@foreach ($nilai as $value)
<div class="card mb-4">
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h4 class="m-0 font-weight-bold text-primary">Data Alternatif {{ $value['nama_alternatif'] }}</h4>
    </div>
    <div class="table-responsive px-3 pb-3">
        <table class="table align-items-center table-hover table-bordered" id="alternatif" data-order="[]">
            <thead class="thead-light">
                <tr>
                    <th>Nama Kriteria</th>
                    <th>Nilai Alternatif</th>
                    <th>Hasil Perhitungan</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($kriteria_ as $key => $kriteria)
                <tr>
                    <th>{{ $kriteria->nama }}</th>
                    <td>{{ $value['bobot_parameter'][$key] }}</td>
                    <td>{{ $value['nilai_parameter'][$key] }}</td>
                </tr>
                @endforeach
            </tbody>
            <tfoot class="thead-light">
                <tr>
                    <th colspan="2">Total</th>
                    <th>{{ $value['total'] }}</th>
                </tr>
            </tfoot>
        </table>
    </div>
</div>
@endforeach
<div class="card mb-4">
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h4 class="m-0 font-weight-bold text-primary">Perankingan Alternatif</h4>
    </div>
    <div class="table-responsive px-3 pb-3">
        <table class="table align-items-center table-hover table-bordered" id="hasil" data-order="[]">
            <thead class="thead-light">
                <tr>
                    <th>Alternatif</th>
                    <th data-orderable="false">Total</th>
                    <th>Peringkat</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($nilai->sortByDesc('total', SORT_NATURAL) as $value)
                <tr @once class="bg-primary text-white" @endonce>
                    <th>{{ $value['nama_alternatif'] }}</th>
                    <td>{{ round($value['total'], 3) }}</td>
                    <td>{{ $loop->iteration }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
@push('script')
<script src="{{ asset('assets/vendor/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
<script>
    $(document).ready(function () {
        $('#alternatif').DataTable({
            info: false,
            paging: false,
            searching: false,
        });
        $('#hasil').DataTable({
            info: false,
            paging: false,
            searching: false,
        }).columns(2).order('asc').draw();
    });
</script>
@endpush
