@extends('layouts.main')
@push('style')
<link href="{{ asset('assets/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endpush
@section('content')
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
                    @if (auth()->user()->level === 'admin')
                        <th data-orderable="false">Opsi</th>
                    @endif
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
                    @if (auth()->user()->level === 'admin')
                        <td>
                            <a href="{{ route('nilai.edit', [$alternatif->id]) }}" class="btn btn-sm btn-info">Ubah</a>
                        </td>
                    @endif
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
