<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Product\ProductClientController;
use App\Http\Controllers\Product\ProductoController;
use App\Http\Controllers\Product\StatusProductController;
use App\Http\Controllers\Role\RolController;
use App\Http\Controllers\StatusUserController;
use App\Http\Controllers\UsuarioController;
use Illuminate\Support\Facades\Route;

//Agregamos controladores

//Controlador del producto

// Controladro cliente vista

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
    Route::resource('productos',ProductoController::class);
});

Route::put('/statusChange/{user}', [StatusUserController::class,'update'])->name('statusChange');
Route::put('/productStatus/{product}',[StatusProductController::class,'update'])->name('productStatus');

// Ruta del middleware

Route::get('/disabled', [AuthenticatedSessionController::class, 'destroy'])
    ->middleware('auth')
    ->name('disabled');

// Ruta de vista personalizada del usuario

Route::get('/clients', [ProductClientController::class, 'index'])->name('clients');





