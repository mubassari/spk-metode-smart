<?php

namespace App\Http\Controllers;

use App\Models\Kreteria;
use Illuminate\Http\Request;

class KreteriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('kreteria.index', ['kreteria_' => Kreteria::OrderBy('kode', 'ASC')->get()]);
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kreteria  $kreteria
     * @return \Illuminate\Http\Response
     */
    public function show(Kreteria $kreteria)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kreteria  $kreteria
     * @return \Illuminate\Http\Response
     */
    public function edit(Kreteria $kreteria)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kreteria  $kreteria
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kreteria $kreteria)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kreteria  $kreteria
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kreteria $kreteria)
    {
        //
    }
}
