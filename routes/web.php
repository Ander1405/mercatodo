<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Car\ShoppingCarController;
use App\Http\Controllers\Car\ShoppingCarProductController;
use App\Http\Controllers\Payments\AdminInvoiceController;
use App\Http\Controllers\Payments\AgainPaymentController;
use App\Http\Controllers\Product\CategoryController;
use App\Http\Controllers\Product\ProductClientController;
use App\Http\Controllers\Product\ProductoController;
use App\Http\Controllers\Product\StatusProductController;
use App\Http\Controllers\Ptp\AmortizationController;
use App\Http\Controllers\Reports\AdminFilerExportController;
use App\Http\Controllers\Reports\BestSellerExportController;
use App\Http\Controllers\Reports\ExportAdminController;
use App\Http\Controllers\Reports\ExportAmortizationController;
use App\Http\Controllers\Reports\ExportProductsController;
use App\Http\Controllers\Reports\ImportProductsController;
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

Route::group(['middleware' => ['auth', 'verified']], function (){
    Route::resource('roles',RolController::class);
    Route::resource('usuarios', UsuarioController::class);
    Route::resource('productos',ProductoController::class);
    Route::resource('category',CategoryController::class);
    Route::resource('shoppingCarProduct', ShoppingCarProductController::class);
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

//Pasarela de pagos // Comprobante
Route::resource('api',AmortizationController::class);

//Reintentar pago PTP

Route::post('againAmortization/{amortization}',[AgainPaymentController::class,'store'])
    ->name('againAmortization');

//Pagos E-comerce

Route::get('invoicesAdmin',[AdminInvoiceController::class,'index'])
    ->name('invoicesAdmin');


// Importes

Route::post('import/products', [ImportProductsController::class, 'import'])
    ->name('imports');

Route::get('importsView',[ImportProductsController::class,'index'])
    ->name('importsView');

//Exportes

Route::get('products/export/', [ExportProductsController::class, 'export'])
    ->name('exports');

Route::get('exportsView',[ExportProductsController::class,'index'])
    ->name('exportsView');

//Esportes de transacciones

Route::get('amortizatioExport',[ExportAmortizationController::class, 'index'])
    ->name('amortizatioExport');

Route::get('paymnets',[ExportAmortizationController::class,'export'])
    ->name('paymnets');

//ExportAdmin

Route::get('export/index', [ExportAdminController::class,'index'])
    ->name('export.index');

Route::get('admin/export/', [AdminFilerExportController::class, 'adminExport'])
    ->name('export.files.admin');

//Export for products best seller

Route::get('export/bestseller',[BestSellerExportController::class, 'export'])
    ->name('export/bestseller');

Route::get('bestseller/index',[BestSellerExportController::class, 'index'])
    ->name('bestseller/index');




