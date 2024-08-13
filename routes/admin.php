<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HcitaController;
use App\Http\Controllers\HoraUserController;
use App\Http\Controllers\TipoHorarioController;
use App\Models\TipoHorario;
use App\Models\User;
use App\Models\Hora_User;
use GuzzleHttp\Middleware;

Route::get('', function(){
    return view('admin.index');
})->middleware(['auth']);

//Route::get('/hcitas', [HcitaController::class, 'index']);
Route::resource('hcitas', HcitaController::class)
    ->only(['index','create','store'])
    ->Middleware('auth');

Route::resource('tiphora', TipoHorarioController::class);

Route::get('users/', function(){
    $users = User::all();
    return view('admin.users.index', compact('users'));
});

/*Route::get('/usrAsignHor', [HoraUserController::class, 'create']
 function(){
    return view('admin.users.asighorario');}
)->name('usrasighor');*/

/*Route::post('/usrAsignHor/store', [HoraUserController::class, 'store']
)->name('usrasighor.store'); */
Route::resource('usrAsignHor', HoraUserController::class);
