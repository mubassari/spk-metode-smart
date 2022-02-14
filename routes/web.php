<?php

use App\Http\Controllers\KriteriaController;
use App\Http\Controllers\ParameterController;
use App\Http\Controllers\AlternatifController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\NilaiController;
use App\Http\Controllers\PerhitunganController;
use App\Http\Controllers\RegisterController;
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
    return view('beranda');
});

Route::get('login', function () {
    return view('auth.login');
})->name('login');
Route::post('login', [LoginController::class, 'prosesLogin'])->name('login');

Route::post('logout', [LoginController::class, 'logout'])->name('logout');

Route::get('register', function () {
    return view('auth.register');
})->name('register');
Route::post('register', [RegisterController::class, 'prosesRegister'])->name('register');

Route::middleware(['auth'])->group(function () {
    Route::resource('kriteria', KriteriaController::class)->except(['show']);
    Route::resource('parameter', ParameterController::class)->except(['show']);
    Route::resource('alternatif', AlternatifController::class)->except(['show']);
    Route::resource('alternatif', AlternatifController::class)->except(['show']);
    Route::resource('nilai', NilaiController::class)->only(['index', 'edit', 'update']);
    Route::get('perhitungan', [PerhitunganController::class, 'kalkulasi'])->name('perhitungan.kalkulasi');
});
