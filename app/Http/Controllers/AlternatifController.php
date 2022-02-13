<?php

namespace App\Http\Controllers;

use App\Models\Alternatif;
use App\Http\Requests\FormAlternatifRequest;

class AlternatifController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $alternatif =  Alternatif::all();
        return view('alternatif.index', ['alternatif_' => $alternatif]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('alternatif.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FormAlternatifRequest $request)
    {
        $request->validated();
        $alternatif = $request->all();
        Alternatif::create($alternatif);

        return redirect(route('alternatif.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Alternatif  $alternatif
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Alternatif  $alternatif
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $alternatif = Alternatif::find($id);
        return view('alternatif.edit', ['alternatif' => $alternatif]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Alternatif  $alternatif
     * @return \Illuminate\Http\Response
     */
    public function update($id, FormAlternatifRequest $request)
    {
        $request->validated();
        $input = $request->all();
        $alternatif = Alternatif::find($id);
        $alternatif->fill($input)->save();

        return redirect(route('alternatif.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Alternatif  $alternatif
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $alternatif = Alternatif::find($id);
        $alternatif->delete();

        return redirect(route('alternatif.index'));
    }
}
