<?php

namespace App\Http\Controllers\Payments;

use App\Actions\Car\TotalPriceCarAction;
use App\Actions\PlaceToPayBridge\PlaceToPayBridgeAction;
use App\Contracts\AmortizationBridgeContract;
use App\Http\Controllers\Controller;
use App\Models\Amortization;
use App\Models\ShoppingCar;
use Illuminate\Http\Request;
use function redirect;

class AgainPaymentController extends Controller
{

    public function store(Request $request, AmortizationBridgeContract $AmortizationBridgeContract, Amortization $Amortization, PlaceToPayBridgeAction $placeToPayBridgeAction)
    {
        $idCar = $Amortization->shopping_car_id;
        $shoppingCar= ShoppingCar::find($idCar);

        $Amortization = $AmortizationBridgeContract->createSession($shoppingCar, $request, $placeToPayBridgeAction);

        return $Amortization->status=='pending' ? redirect($Amortization->process_url) : redirect()->route('productos.index');
    }
}
