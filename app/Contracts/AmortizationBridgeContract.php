<?php

namespace App\Contracts;

use App\Actions\PlaceToPayBridge\PlaceToPayBridgeAction;
use App\Models\Amortization;
use App\Models\ShoppingCar;
use Illuminate\Http\Request;

interface AmortizationBridgeContract
{
    public function connection(array $settings): self;
    public function createSession(ShoppingCar $shoppingCar, Request $request, PlaceToPayBridgeAction $placeToPayBridgeAction): Amortization;
    public function queryPayment(Amortization $amortization):Amortization;
}
