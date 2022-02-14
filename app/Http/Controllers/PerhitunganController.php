<?php

namespace App\Http\Controllers;

use App\Models\Kriteria;
use App\Models\Nilai;
use Illuminate\Http\Request;

class PerhitunganController extends Controller
{
    public function kalkulasi()
    {
        $result = Nilai::select(
            "kriteria.nama as nama_kriteria",
            "alternatif.id as id_alternatif",
            "alternatif.nama as nama_alternatif",
            "parameter.bobot as bobot_parameter"
        )
            ->join("kriteria", "kriteria.id", "=", "nilai.id_kriteria")
            ->join("parameter", "parameter.id", "=", "nilai.id_parameter")
            ->join("alternatif", "alternatif.id", "=", "nilai.id_alternatif")
            ->get();
        $kriteria_ = Kriteria::all();
        return view('perhitungan.index', ['kriteria_' => $kriteria_, 'result' => $result]);
    }
}
