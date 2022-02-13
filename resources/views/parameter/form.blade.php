<div class="form-group">
    <label for="input-nama">Pilih Kriteria</label>
    <select name="id_kriteria" id="id_kriteria" class="form-control @error('id_kriteria') is-invalid @enderror"">
        <option value="">Pilih</option>
        @foreach ($kriteria as $kriteria)
            <option {{ old('id_kriteria', ($parameter->id_kriteria ?? '')) == $kriteria->id ? 'selected' : '' }} value="{{ $kriteria->id }}">{{ $kriteria->nama }}</option>
        @endforeach
    </select>
    <x-errormessage error="id_kriteria" />
</div>
<div class="form-group">
    <label for="input-nama">Nama Parameter</label>
    <input type="text" class="form-control @error('nama') is-invalid @enderror" id="input-nama" name="nama" placeholder="Masukkan Nama Parameter" value="{{ old('nama', ($parameter->nama ?? '')) }}">
    <x-errormessage error="nama" />
</div>
<div class="form-group">
    <label for="input-bobot">Bobot Parameter</label>
    <div class="input-group">
        <input type="text" class="form-control @error('bobot') is-invalid @enderror" id="input-bobot" name="bobot" placeholder="Masukkan Bobot Parameter" value="{{ old('bobot', ($parameter->bobot ?? '')) }}">
        <div class="input-group-append">
            <span class="input-group-text">%</span>
        </div>
        <x-errormessage error="bobot" />
    </div>
</div>
    <button type="reset" class="btn btn-primary">Reset</button>
    <button type="submit" class="btn btn-primary">{{ $tombol }}</button>
