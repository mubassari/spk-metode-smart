@extends('layouts.main')
@section('content')
    <x-breadcrumb title="Ubah Data Nilai" link="{{ route('nilai.index') }}" item="Nilai" subItem="Ubah Data" />
    <div class="card mb-3">
        <div class="card-body">
            <form action="{{ route('nilai.update', ['nilai' => $alternatif->id]) }}" method="post">
                {{ csrf_field() }}
                {{ method_field('PUT') }}
                <input type="hidden" name="alternatif" value="{{ $alternatif->id }}">
                @include('nilai.form', ['tombol' => 'Ubah'])
            </form>
        </div>
    </div>
@endsection
