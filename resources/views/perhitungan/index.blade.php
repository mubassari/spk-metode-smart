@extends('layouts.main')
@section('content')
<x-breadcrumb title="Tampil Data Perhitungan" link="#" item="perhitungan" subItem="Tampil Data" />
    <div class="row">
        <div class="col-lg-12">
            <!-- Simple Tables -->
            <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h4 class="m-0 font-weight-bold text-primary">Normalisasi Kriteria</h4>
                </div>
                <div class="table-responsive">
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                            <tr>
                                @foreach ($kriteria_ as $kriteria)
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
                            <tr>
                                <td colspan="{{ count($kriteria_) }}">Nilai Ternomalisasi</td>
                            </tr>
                            <tr>
                                @foreach ($kriteria_ as $kriteria)
                                    <?php $value = round(($kriteria->bobot / $kriteria_->pluck('bobot')->sum()), 2); ?>
                                    <td>{{ $value }}</td>
                                    <?php $values [] = $value;
                                            $values = new \Illuminate\Support\Collection($values);
                                    ?>
                                @endforeach
                            </tr>
                            <tr>
                                <td class="text-left" colspan="{{ count($kriteria_) }}">Jumlah : {{ round($values->sum()) }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h4 class="m-0 font-weight-bold text-primary">Data Alternatif</h4>
                </div>
                <div class="table-responsive">
                    <table class="table align-items-center table-flush">
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
                <div class="table-responsive">
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                            <tr>
                                <th>Alternatif</th>
                                @foreach ($kriteria_ as $kriteria)
                                <th>{{ $kriteria->nama }}</th>
                                @endforeach
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($result->groupBy('nama_alternatif') as $key => $value)
                                <tr>
                                    <th>{{ $key }}</th>
                                    @foreach ($value as $key => $item)
                                        <?php $total = $item->bobot_parameter * $values->toArray()[$key]; ?>
                                            <td>{{ $total }}</td>
                                        <?php $total_[] = $total;
                                                $total_ = new \Illuminate\Support\Collection($total_);
                                        ?>
                                    @endforeach
                                    <th class="">{{ $total_->sum() }}</th>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
