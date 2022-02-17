<?php

namespace App\Http\Controllers;

use App\Models\Nilai;
use App\Models\Kriteria;
use App\Models\Parameter;
use App\Models\Alternatif;
use App\Http\Requests\FormNilaiRequest;
use Illuminate\Http\Request;

class NilaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result = Nilai::select(
            "kriteria.nama as nama_kriteria",
            "alternatif.id as id_alternatif",
            "alternatif.nama as nama_alternatif",
            "parameter.nama as nama_parameter",
            "parameter.bobot as bobot_parameter"
        )
            ->join("kriteria", "kriteria.id", "=", "nilai.id_kriteria")
            ->join("parameter", "parameter.id", "=", "nilai.id_parameter")
            ->join("alternatif", "alternatif.id", "=", "nilai.id_alternatif")
            ->get();
        return view('nilai.index', [
            'result' => $result,
            'alternatif_' => Alternatif::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (request('id_alternatif') === null) {
            return redirect(route("nilai.index"))->with(['status' => 'warning', 'pesan' => 'Alternatif harus dipilih.']);
        }
        $alternatif =  Nilai::where('id_alternatif', '=', request('id_alternatif'))->count();
        if ($alternatif > 0) {
            $alternatif = Alternatif::find(request('id_alternatif'));
            return redirect(route("nilai.index"))->with(['status' => 'warning', 'pesan' => 'Alternatif sudah terdaftar.']);
        }
        $result = Parameter::select(
            "parameter.id",
            "parameter.nama as nama_parameter",
            "parameter.id_kriteria",
            "kriteria.nama as nama_kriteria",
        )
            ->join("kriteria", "kriteria.id", "=", "parameter.id_kriteria")->get();
        return view('nilai.create', ['result' => $result, 'nama_alternatif' => Alternatif::find(request('id_alternatif'))->nama]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        for ($i = 0; $i < count($request->id_alternatif); $i++) {
            if ($request->id_parameter[$i] === null) {
                return redirect(route("nilai.create") . "?id_alternatif=" . $request->id_alternatif[$i])->with(['status' => 'warning', 'pesan' => 'Nilai pilihan kriteria tidak lengkap.']);
            } else {
                Nilai::create([
                    'id_alternatif' => $request->id_alternatif[$i],
                    'id_kriteria' => $request->id_kriteria[$i],
                    'id_parameter' => $request->id_parameter[$i],
                ]);
            }
        }
        return redirect(route("nilai.index"))->with(['status' => 'success', 'pesan' => 'Data nilai alternatif berhasil ditambahkan']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Nilai  $nilai
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $id_alternatif = Alternatif::firstWhere("nama", $request->nama_alternatif)->id;
        $nilai = Nilai::where("id_alternatif", $id_alternatif)->get();
        $id_parameter = $nilai->pluck('id_parameter');
        $result = Parameter::select(
            "parameter.id",
            "parameter.nama as nama_parameter",
            "parameter.id_kriteria",
            "kriteria.nama as nama_kriteria",
        )
            ->join("kriteria", "kriteria.id", "=", "parameter.id_kriteria")->get();
        return view('nilai.edit', ['result' => $result, 'id_parameter' => $id_parameter, 'id_alternatif' => $id_alternatif, 'nama_alternatif' => Alternatif::firstWhere("nama", $request->nama_alternatif)->nama]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Nilai  $nilai
     * @return \Illuminate\Http\Response
     */
    public function update($id_alternatif, Request $request)
    {
        $nilai = Nilai::where('id_alternatif', $id_alternatif)->get();
        foreach ($nilai as $key => $value) {
            if ($request->id_parameter[$key] === null) {
                return redirect(route("nilai.index"))->with(['status' => 'warning', 'pesan' => 'Gagal memperbarui nilai alternatif.']);
            } else {
                $value->update([
                    'id_parameter' => $request->id_parameter[$key],
                ]);
            }
        }
        return redirect(route("nilai.index"))->with(['status' => 'success', 'pesan' => 'Data nilai alternatif berhasil diperbarui.']);
    }

    public function delete(Request $request)
    {
        Nilai::where("id_alternatif", Alternatif::firstWhere("nama", $request->nama_alternatif)->id)->delete();
        return redirect(route('nilai.index'))->with(['status' => 'success', 'pesan' => 'Data nilai alternatif berhasil dihapus.']);
    }
}
