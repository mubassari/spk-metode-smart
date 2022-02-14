<?php

namespace App\Http\Controllers;

use App\Models\Nilai;
use App\Models\Kriteria;
use App\Models\Parameter;
use App\Models\Alternatif;
use App\Http\Requests\FormNilaiRequest;
use Illuminate\Support\Facades\DB;

class NilaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kriteria = Kriteria::all();
        $alternatif = Alternatif::all();
        $nilai_temp = Nilai::select("nilai.id_alternatif", "parameter.nama")->join("parameter", "parameter.id", "=", "nilai.id_parameter")->orderBy('id_alternatif')->get();
        $nilai = collect();
        foreach ($alternatif as $value) {
            $nilai->push($nilai_temp->filter(function ($item) use ($value) {
                return $item->id_alternatif == $value->id;
            })->all());
        }

        return view('nilai.index', [
            'kriteria_' => $kriteria,
            'nilai_' => $nilai,
            'alternatif_' => $alternatif
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FormNilaiRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Nilai  $nilai
     * @return \Illuminate\Http\Response
     */
    public function show(Nilai $nilai)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Nilai  $nilai
     * @return \Illuminate\Http\Response
     */
    public function edit(Nilai $nilai)
    {
        $kriteria = Kriteria::Select('id', 'nama')->get();
        $param_temp = Parameter::Select('id', 'id_kriteria', 'nama')->get();
        $alternatif = Nilai::select('id_parameter')->where("id_alternatif", $nilai->id)->get();
        $parameter = collect();

        foreach ($kriteria as $value) {
            $parameter->push($param_temp->filter(function ($item) use ($value) {
                return $item->id_kriteria == $value->id;
            })->all());
        }

        return view('nilai.edit', [
            'kriteria_' => $kriteria,
            'parameter_' => $parameter,
            'alternatif' => $nilai,
            'nilai' => $alternatif
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Nilai  $nilai
     * @return \Illuminate\Http\Response
     */
    public function update(Nilai $nilai, FormNilaiRequest $request)
    {
        $request->validated();

        try {
            DB::beginTransaction();
            foreach ($request->kriteria as $key => $kriteria) {
                $nilai->updateOrCreate(
                    ['id_alternatif' => $request->alternatif, 'id_kriteria' => $kriteria],
                    ['id_parameter' => $request->nilai[$key + 1]]
                );
            }
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollback();
        }

        return redirect()->route('nilai.index')->with(['pesan' => "Data $request->nama berhasil diperbarui."]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Nilai  $nilai
     * @return \Illuminate\Http\Response
     */
    public function destroy(Nilai $nilai)
    {
        //
    }
}
