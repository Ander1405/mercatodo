<?php

namespace App\Http\Controllers\Ptp;

use App\Contracts\AmortizationBridgeContract;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AmortizationController extends Controller
{
    public function store(Request $request, AmortizationBridgeContract $AmortizationBridgeContract)
    {
        $shoppingCar = auth()->user()->shoppingCarActive();
        $payment = $AmortizationBridgeContract->createSession($shoppingCar, $request);

        return $payment->status=='pending' ? redirect($payment->process_url): redirect()->route('productos.index');
    }

    public function show($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }
}
