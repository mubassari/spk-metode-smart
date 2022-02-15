@extends('layouts.main')
@section('content')
@push('style')
<link href="{{ asset('assets/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endpush
<x-breadcrumb title="Tampil Data Nilai" link="{{ route('nilai.index') }}" item="Nilai" subItem="Tampil Data" />
<div class="card mb-3">
    <div class="table-responsive p-3">
        <table class="table align-items-center table-hover table-bordered" id="nilai">
            <thead class="thead-light">
                <tr>
                    <th>No</th>
                    <th>Nama Alternatif</th>
                    @foreach ($kriteria_ as $kriteria)
                    <th>{{ $kriteria->nama }}</th>
                    @endforeach
                    <th data-orderable="false">Opsi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($alternatif_ as $key => $alternatif)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $alternatif->nama }}</td>
                    @foreach (($nilai_[$key] ?: $kriteria_) as $nilai)
                    <td>{{ empty($nilai_[$key]) ? '' : $nilai->nama }}</td>
                    @endforeach
                    <td>
                        <a href="{{ route('nilai.edit', [$alternatif->id]) }}" class="btn btn-sm btn-info">Ubah</a>
                    </td>
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
        $('#nilai').DataTable({
            info: false,
            paging: false,
            searching: false
        });
    });
</script>
@endpush
