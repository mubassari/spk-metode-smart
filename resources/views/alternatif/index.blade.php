@extends('layouts.main')
@section('content')
<x-breadcrumb title="Tampil Data Kriteria" link="{{ route('kriteria.index') }}" item="Kriteria" subItem="Tampil Data" />
<x-alertmessage />
<div class="card mb-3">
    <div class="card-header d-flex flex-row align-items-end justify-content-end">
        <a href="{{ route('alternatif.create') }}" class="btn btn-primary">Tambah Alternatif</a>
    </div>
    <div class="table-responsive  p-3">
        <table class="table align-items-center table-hover table-flush" id="alternatif">
            <thead class="thead-light">
                <tr>
                    <th>No</th>
                    <th>Kode</th>
                    <th>Nama Alternatif</th>
                    <th data-orderable="false">Opsi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($alternatif_ as $alternatif)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>A{{ str_pad($alternatif->id, 2, '0', STR_PAD_LEFT) }}</td>
                    <td>{{ $alternatif->nama }}</td>
                    <td class="d-flex justify-content-around">
                        <a href="{{ route('alternatif.edit', [$alternatif->id]) }}" class="btn btn-sm btn-info">Ubah</a>
                        <form method="POST" action="{{ route('alternatif.destroy', [$alternatif->id]) }}">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <input type="submit" class="btn btn-sm btn-danger"
                                onclick="return confirm('Hapus data ini?')" value="Hapus">
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection

@push('script')
<script>
    $(document).ready(function ()   {
        $('#alternatif').DataTable({
            paging: false,
            searching: false
        });
    });
</script>
@endpush
