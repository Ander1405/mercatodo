<?php

use App\Http\Controllers\AdminInvoiceController;
use App\Http\Controllers\AgainPaymentController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Car\ShoppingCarController;
use App\Http\Controllers\Car\ShoppingCarProductController;
use App\Http\Controllers\Product\ProductClientController;
use App\Http\Controllers\Product\ProductoController;
use App\Http\Controllers\Product\StatusProductController;
use App\Http\Controllers\Ptp\AmortizationController;
use App\Http\Controllers\Role\RolController;
use App\Http\Controllers\User\StatusUserController;
use App\Http\Controllers\User\UsuarioController;
use Illuminate\Support\Facades\Route;

//Agregamos controladores

//Controlador del producto

// Controladro cliente vista

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
    Route::get('/clients', [ProductClientController::class, 'index'])->name('clients');
});

Route::put('/statusChange/{user}', [StatusUserController::class,'update'])->name('statusChange');
Route::put('/productStatus/{product}',[StatusProductController::class,'update'])->name('productStatus');

// Ruta del middleware

Route::get('/disabled', [AuthenticatedSessionController::class, 'destroy'])
    ->middleware('auth')
    ->name('disabled');

//Carrito de compras

Route::post('/shopping-cars/{shoppingCar}/create/{product}', [ShoppingCarProductController::class, 'store'])
    ->name('shoppingCars.items.store');

Route::post('/shopping-cars/update/{product}', [ShoppingCarProductController::class, 'update'])
    ->name('shoppingCars.items.update');

Route::get('shoppingCar', [ShoppingCarController::class, 'index'])->name('shoppingCar');

Route::resource('shoppingCarItem', AmortizationController::class);

//Pasarela de pagos
Route::resource('api',AmortizationController::class);

//Reintentar pago PTP

Route::post('againAmortization/{amortization}',[AgainPaymentController::class,'store'])
    ->name('againAmortization');

//Pagos E-comerce

Route::get('invoicesAdmin',[AdminInvoiceController::class,'index'])
    ->name('invoicesAdmin');






