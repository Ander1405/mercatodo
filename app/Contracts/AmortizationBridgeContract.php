<?php

namespace App\Contracts;

use App\Models\Amortization;
use App\Models\ShoppingCar;
use Dnetix\Redirection\PlacetoPay;
use Illuminate\Http\Request;

interface AmortizationBridgeContract
{
    public function connection(array $settings): self;
    public function createSession(ShoppingCar $shoppingCar, Request $request): Amortization;
    public function queryPayment(Amortization $payment):Amortization;
}
