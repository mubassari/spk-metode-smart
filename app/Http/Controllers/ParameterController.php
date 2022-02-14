<?php

namespace App\Http\Controllers;

use App\Http\Requests\FormParameterRequest;
use App\Models\Kriteria;
use App\Models\Parameter;

class ParameterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result = Parameter::select("parameter.*", "kriteria.nama as nama_kriteria")->join("kriteria", "kriteria.id", "=", "parameter.id_kriteria")->orderBy('id_kriteria')->orderBy('bobot')->get();
        return view('parameter.index', [
            'parameter_' => $result,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('parameter.create', ['kriteria' => Kriteria::Select('id', 'nama')->get()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FormParameterRequest $request)
    {
        $request->validated();
        Parameter::create($request->only(['id_kriteria', 'nama', 'bobot']));

        return redirect()->route('parameter.index')->with(['pesan' => "Data $request->nama berhasil ditambahkan."]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Parameter  $parameter
     * @return \Illuminate\Http\Response
     */
    public function show(Parameter $parameter)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Parameter  $parameter
     * @return \Illuminate\Http\Response
     */
    public function edit(Parameter $parameter)
    {
        return view('parameter.edit', [
            'kriteria' => Kriteria::Select('id', 'nama')->get(),
            'parameter' => $parameter,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Parameter  $parameter
     * @return \Illuminate\Http\Response
     */
    public function update(Parameter $parameter, FormParameterRequest $request)
    {
        $request->validated();
        $parameter->update($request->only(['id_kriteria', 'nama', 'bobot']));

        return redirect()->route('parameter.index')->with(['pesan' => "Data $request->nama berhasil diperbarui."]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Parameter  $parameter
     * @return \Illuminate\Http\Response
     */
    public function destroy(Parameter $parameter)
    {
        $parameter->delete();

        return redirect()->route('parameter.index')->with(['pesan' => "Data $parameter->nama berhasil dihapus."]);
    }
}
