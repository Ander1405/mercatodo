<?php

namespace App\Http\Controllers\Car;

use App\Actions\Car\StoreCarAction;
use App\Actions\Car\UpdateCarAction;
use App\Contracts\AmortizationBridgeContract;
use App\Events\ProductMoreSaleByCategorie;
use App\Http\Controllers\Controller;
use App\Http\Requests\Car\StoreShoppingCarProductRequest;
use App\Http\Requests\Car\UpdateShoppingCarProductRequest;
use App\Models\Amortization;
use App\Models\Products;
use App\Models\ProductSale;
use App\Models\ShoppingCar;
use App\Models\ShoppingCarProduct;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ShoppingCarProductController extends Controller
{

    public function store(Request $request, ShoppingCar $shoppingCar, Products $product, StoreCarAction $storeCarAction)
    {
        return $storeCarAction->storeCar($request->all(),$shoppingCar, $product);
    }

    public function update(Request $request, Products $product, UpdateCarAction $updateCarAction)
    {
        return $updateCarAction->updateCar($request->all(), $product);
    }

    public function destroy($id)
    {
        $itemShoppingCar = ShoppingCarProduct::find($id);
        $itemShoppingCar->delete();
        return redirect()->route('productos.index');
    }
}
