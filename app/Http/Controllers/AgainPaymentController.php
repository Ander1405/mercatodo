<?php

namespace App\Http\Controllers;

use App\Contracts\AmortizationBridgeContract;
use App\Models\Amortization;
use App\Models\ShoppingCar;
use Illuminate\Http\Request;

class AgainPaymentController extends Controller
{
    public function store (Request $request, AmortizationBridgeContract $AmortizationBridgeContract, Amortization $Amortization)
    {
        $idCar = $Amortization->shopping_car_id;
        $shoppingCar= ShoppingCar::find($idCar);

        $payment = $AmortizationBridgeContract->createSession($shoppingCar, $request);

        return $payment->status=='pending' ? redirect($payment->process_url): redirect()->route('productos.index');
    }
}
