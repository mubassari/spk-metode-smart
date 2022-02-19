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
            margin: 25px;
        }

        table {
            width: 100%;
            border-spacing: 0px;
            border-collapse: collapse;
            margin: auto;
        }

        tr,
        th {
            border: thin solid black;
            vertical-align: middle;
            text-align: center;
            padding: 10px;
        }

        tr,
        td {
            border: thin solid black;
            padding: 5px;
        }
    </style>
</head>

<body>
    <h4 class="header">Normalisasi Kriteria</h4>
    <table>
        <thead>
            <tr>
                @foreach ($kriteria_ as $kriteria)
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
                <th>
                    <?= str_replace(' ', '<br>', $kriteria->nama) ?>
                </th>
                @endforeach
            </tr>
        </thead>
        <tbody>
            @foreach ($result->groupBy('nama_alternatif') as $key => $value)
            <tr>
                <td style="font-weight: bold">{{ $key }}</td>
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
                <td style="font-weight: bold">Alternatif</td>
                @foreach ($kriteria_ as $kriteria)
                <th>
                    <?= str_replace(' ', '<br>', $kriteria->nama) ?>
                </th>
                @endforeach
                <th>Total</th>
                <th>Peringkat</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($nilai->sortByDesc('total') as $key => $item)
            <tr @once style="font-weight: bold" @endonce>
                <td>{{ $item['nama_alternatif'] }}</td>
                @foreach ($item['nilai_parameter'] as $value)
                <td>{{ $value }}</td>
                @endforeach
                <td>{{ $item['total'] }}</td>
                <td>{{ $loop->iteration }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
