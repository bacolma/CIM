<?php

use App\Http\Controllers\AgendaController;
use App\Http\Controllers\HistoriaController;
use App\Http\Controllers\PacienteController;
use App\Http\Controllers\reportes;
use App\Models\Agenda;
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

/*Route::get('/', function () {
    return view('welcome');
}); */

//Route::redirect('/','/citas');
Route::redirect('/', 'paciente/buscar');
Route::redirect('/home', 'paciente/buscar/');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
Route::get('/citas/list/{fecha?}', [AgendaController::class,'list'])
    ->middleware(['auth'])->name('citas.list');
Route::resource('/citas', AgendaController::class)->middleware(['auth']);
Route::get('/paciente/buscar', [PacienteController::class,'buscar'])
    ->middleware(['auth'])->name('paciente.buscar');
Route::resource('/paciente',PacienteController::class)->middleware(['auth']);
Route::get('/historia/reporte', [HistoriaController::class, 'reporte'])->middleware(['auth'])->name('reporte');
Route::resource('/historia', HistoriaController::class)->middleware(['auth']);
Route::get('/atenc/{fecha?}', [reportes::class,'atenc'])->middleware(['auth']);
Route::get('/prtAten', [reportes::class,'prtAtnc'])->middleware(['auth'])->name('reporte.prtAtnc');
Route::get('/genInfMed', [reportes::class,'genInfMed'])->middleware('auth')->name('reporte.genInfMed');
Route::view('/prueba', 'prueba')->name('prueba');
Route::view('/prueba2','prueba2')->name('prueba2');
