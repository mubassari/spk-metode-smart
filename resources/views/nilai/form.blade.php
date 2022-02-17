@foreach ($result->groupBy("nama_kriteria") as $key => $value)
        <input type="hidden" value="{{ request("id_alternatif") }}" name="id_alternatif[]">
        <div class="forum-group">
                <?php
                    $arr_kriteria = $value->unique("id_kriteria")->pluck("nama_kriteria", "id_kriteria");
                ?>
                <label for="kriteri">Pilih Kriteria <strong>{{ $arr_kriteria->values()[0] }}</strong></label>
                <input type="hidden" value="{{ $arr_kriteria->keys()[0] }}" name="id_kriteria[]">
        </div>
        <div class="form-group">
            <select name="id_parameter[]" id="" class="form-control">
                <option value="">Pilih</option>
                @foreach ($value as $parameter)
                    <option {{ in_array($parameter->id, isset($id_parameter) ? $id_parameter->toArray() : []) ? 'selected' : '' }} value="{{ $parameter->id }}">{{ $parameter->nama_parameter }}</option>
                @endforeach
            </select>
        </div>
@endforeach

<div class="mt-3">
        <button type="reset" class="btn btn-primary">Reset</button>
        <button type="submit" class="btn btn-primary">{{ $tombol }}</button>
    </div>
