<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cetak Data | {{ config('app.name')}}</title>
    <style>
        .print-doc {
            color: black !important;
            font-family: "Times New Roman", Times, serif !important;
        }

        .header {
            font-weight: bold;
            text-align: center;
            text-decoration: underline solid black auto;
            margin-bottom: 25px;
        }

        table {
            width: 100%;
            border-spacing: 0px;
            border-collapse: collapse;
        }

        tr,
        th {
            border: thin solid black;
            vertical-align: middle;
            text-align: center;
            padding: 2px;
        }

        tr,
        td {
            border: thin solid black;
            padding: 2px;
        }
    </style>
</head>

<body>
    <h4 class="header">Normalisasi Kriteria</h4>
    <table>
        <thead>
            <tr>
                @foreach ((sizeof($kriteria_) !== 0 ? $kriteria_ : collect([(object)['nama'=>'Kriteria']])) as $kriteria)
                <th>{{ $kriteria->nama }}</th>
                @endforeach
            </tr>
        </thead>
        <tbody>
            <tr>
                @foreach ((sizeof($kriteria_) !== 0 ? $kriteria_ : collect([(object)['bobot'=>0]])) as $kriteria)
                <td>{{ $kriteria->bobot }}</td>
                @endforeach
            </tr>
            <tr>
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
    </table>
    <h4 class="header">Data Alternatif</h4>
    <table>
        <thead>
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
    <h4 class="header">Normalisasi Data Alternatif</h4>
    <table>
        <thead>
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
                <th>{{ $total_->sum() }}</th>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
