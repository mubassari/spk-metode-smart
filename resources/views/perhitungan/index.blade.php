@extends('layouts.main')
@push('style')
<link href="{{ asset('assets/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endpush
@section('content')
<x-breadcrumb title="Tampil Data Perhitungan" link="#" item="Perhitungan" subItem="Tampil Data" />
@if (auth()->user()->level === 'admin' && count($result) !== 0)
<div class="mb-3 d-flex flex-row align-items-end justify-content-end">
    <button onclick="{{ 'window.location.href=\''.route('perhitungan.cetak').'\'' }};" class="btn btn-danger">
        <i class="fas fa-file-pdf"></i> Cetak Data
    </button>
</div>
@endif
<div class="card mb-4">
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h4 class="m-0 font-weight-bold text-primary">Normalisasi Kriteria</h4>
    </div>
    <div class="table-responsive px-3">
        <table class="table align-items-center table-hover table-bordered">
            <thead class="thead-light">
                <tr>
                    @foreach ((sizeof($kriteria_) !== 0 ? $kriteria_ : collect([(object)['nama'=>'Kriteria']])) as
                    $kriteria)
                    <th>{{ $kriteria->nama }}</th>
                    @endforeach
                </tr>
            </thead>
            <tbody>
                <tr>
                    @foreach ($kriteria_ as $kriteria)
                    <td>{{ $kriteria->bobot }}</td>
                    @endforeach
                </tr>
                <tr class="thead-light">
                    <th colspan="{{ count($kriteria_) }}">Nilai Ternomalisasi</th>
                </tr>
                <tr>
                    @foreach ($kriteria_ as $kriteria)
                    <?php $value = round(($kriteria->bobot / $kriteria_->pluck('bobot')->sum()), 2); ?>
                    <td>{{ $value }}</td>
                    <?php
                    $values[] = $value;
                        $values = collect($values);
                    ?>
                    @endforeach
                </tr>
            </tbody>
            <caption>Jumlah : {{ round(($values ?? collect())->sum()) }}</caption>
        </table>
    </div>
</div>
<div class="card mb-4">
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h4 class="m-0 font-weight-bold text-primary">Data Alternatif</h4>
    </div>
    <div class="table-responsive px-3 pb-3">
        <table class="table align-items-center table-hover table-bordered">
            <thead class="thead-light">
                <tr>
                    <th>Alternatif</th>
                    @foreach ($kriteria_ as $kriteria)
                    <th>{{ $kriteria->nama }}</th>
                    @endforeach
                </tr>
            </thead>
            <tbody>
                @foreach ($result->groupBy('nama_alternatif') as $key => $value)
                <tr>
                    <th>{{ $key }}</th>
                    @foreach ($value as $item)
                    <td>{{ $item->bobot_parameter }}</td>
                    @endforeach
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<div class="card mb-4">
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h4 class="m-0 font-weight-bold text-primary">Normalisasi Data Alternatif</h4>
    </div>
    <div class="table-responsive px-3 pb-3">
        <table class="table align-items-center table-hover table-bordered" id="hasil">
            <thead class="thead-light">
                <tr>
                    <th>Alternatif</th>
                    @foreach ($kriteria_ as $kriteria)
                    <th data-orderable="false">{{ $kriteria->nama }}</th>
                    @endforeach
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($result->groupBy('nama_alternatif') as $key => $value)
                <tr>
                    <th>{{ $key }}</th>
                    @foreach ($value as $key => $item)
                    <?php $total = $item->bobot_parameter * ($values ?? collect())->toArray()[$key]; ?>
                    <td>{{ $total }}</td>
                    <?php
                        $total_[] = $total;
                        $total_ = collect($total_);
                    ?>
                    @endforeach
                    <th class="">{{ $total_->sum() }}</th>
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
    $(document).ready(function ()   {
        $('#hasil').DataTable({
            info: false,
            paging: false,
            searching: false,
        }).columns(-1).order('desc').draw();
    });
</script>
@endpush