<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StatusUserController;

//Agregamos controladores

use App\Http\Controllers\RolController;
use App\Http\Controllers\UsuarioController;

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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified','status'])->name('dashboard');

require __DIR__.'/auth.php';

//Rutas de los controladores

Route::group(['middleware' => ['auth']], function (){
    Route::resource('roles',RolController::class);
    Route::resource('usuarios', UsuarioController::class);
});

Route::put('/statusChange/{user}', [StatusUserController::class,'update'])->name('statusChange');

// Ruta del middleware

Route::get('/disabled', [AuthenticatedSessionController::class, 'destroy'])
    ->middleware('auth')
    ->name('disabled');


