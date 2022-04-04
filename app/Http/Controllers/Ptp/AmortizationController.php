<?php

namespace App\Http\Controllers\Ptp;

use App\Contracts\AmortizationBridgeContract;
use App\Http\Controllers\Controller;
use App\Models\Amortization;
use Illuminate\Http\Request;

class AmortizationController extends Controller
{
    public function index(AmortizationBridgeContract $AmortizationBridgeContract)
    {
        $currency=config('app.currency');
        $userNew = auth()->user()->id;
        $amortizations = Amortization::where('user_id', $userNew)->paginate(10);
        foreach ($amortizations as $amortization)
        {
            $AmortizationBridgeContract->queryPayment($amortization);
        }

        return view('clients.amortization.history', compact('amortizations', 'currency'));

    }
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
