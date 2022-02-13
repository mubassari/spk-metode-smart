<?php

namespace App\Http\Controllers;

use App\Models\Kriteria;
use App\Http\Requests\FormKriteriaRequest;

class KriteriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kriteria =  Kriteria::all();
        return view('kriteria.index', ['kriteria_' => $kriteria]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('kriteria.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FormKriteriaRequest $request)
    {
        $request->validated();
        Kriteria::create($request->only(['nama', 'bobot']));

        return redirect(route('kriteria.index'))->with(['pesan' => "Data $request->nama  berhasil ditambahkan."]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kriteria  $kriteria
     * @return \Illuminate\Http\Response
     */
    public function show(Kriteria $kriteria)
    {
        //
    }

    /**
     * Show
     * the form for editing the specified resource.
     *
     * @param  \App\Models\Kriteria  $kriteria
     * @return \Illuminate\Http\Response
     */
    public function edit(Kriteria $kriterium)
    {
        $kriteria = $kriterium;
        return view('kriteria.edit', ['kriteria' => $kriteria]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kriteria  $kriteria
     * @return \Illuminate\Http\Response
     */
    public function update(FormKriteriaRequest $request, Kriteria $kriterium)
    {
        $request->validated();
        $kriteria = $kriterium;
        $kriteria->update($request->only(['nama', 'bobot']));

        return redirect(route('kriteria.index'))->with(['pesan' => "Data $request->nama  berhasil diperbarui."]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kriteria  $kriteria
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kriteria $kriterium)
    {
        $kriteria = $kriterium;
        $kriteria->delete();
        return redirect(route('kriteria.index'))->with(['pesan' => "Data $kriteria->nama  berhasil dihapus."]);
    }
}
