<?php

use App\Http\Controllers\KriteriaController;
use App\Http\Controllers\ParameterController;
use App\Http\Controllers\AlternatifController;
use App\Http\Controllers\NilaiController;
use App\Http\Controllers\PerhitunganController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('blank-page');
});
Route::resource('kriteria', KriteriaController::class)->except(['show']);
Route::resource('parameter', ParameterController::class)->except(['show']);
Route::resource('alternatif', AlternatifController::class)->except(['show']);
Route::resource('alternatif', AlternatifController::class)->except(['show']);
Route::resource('nilai', NilaiController::class)->only(['index', 'edit', 'update']);
Route::get('perhitungan', [PerhitunganController::class, 'kalkulasi'])->name('perhitungan.kalkulasi');
