@foreach ($kriteria_ as $key => $kriteria)
<div class="form-group">
    <input type="hidden" name="kriteria[{{$key }}]" value="{{ $kriteria->id }}">
    <label for="nilai[{{ $kriteria->id }}]">Pilih Nilai {{ $kriteria->nama }}</label>
    <select name="nilai[{{ $kriteria->id }}]" id="nilai[{{ $kriteria->id }}]"
        class="form-control @if($errors->get('nilai.'.$kriteria->id)) is-invalid @endif">
        <option value="">Pilih</option>
        @foreach ($parameter_[$key] as $parameter)
            <option value="{{ $parameter->id }}" {{ old('nilai.'.$kriteria->id, $nilai[$key]->id_parameter ?? '') == $parameter->id ? 'selected' : '' }}>{{ $parameter->nama }}</option>
        @endforeach
    </select>
    <x-errormessage error="nilai.{{ $kriteria->id }}" />
</div>
@endforeach
<button type="reset" class="btn btn-primary">Reset</button>
<button type="submit" class="btn btn-primary">{{ $tombol }}</button>
