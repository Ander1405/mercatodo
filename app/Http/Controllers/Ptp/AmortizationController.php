<?php

namespace App\Http\Controllers\Ptp;

use App\Actions\Cache\RolCacheAction;
use App\Actions\Car\TotalPriceCarAction;
use App\Actions\PlaceToPayBridge\PlaceToPayBridgeAction;
use App\Contracts\AmortizationBridgeContract;
use App\Http\Controllers\Controller;
use App\Models\Amortization;
use App\Models\ShoppingCar;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AmortizationController extends Controller
{
    public function index(AmortizationBridgeContract $AmortizationBridgeContract)
    {
        $currency=config('app.currency');
        $userNew = auth()->user()->id;
        $amortizations = Amortization::where('user_id', $userNew)->paginate(10);
        foreach ($amortizations as $amortization) {
            $AmortizationBridgeContract->queryPayment($amortization);
        }

        return view('clients.amortization.history', compact('amortizations', 'currency'));
    }

    public function store(Request $request, AmortizationBridgeContract $AmortizationBridgeContract, PlaceToPayBridgeAction $placeToPayBridgeAction)
    {
        $shoppingCar = auth()->user()->shoppingCarActive();
        $Amortization = $AmortizationBridgeContract->createSession($shoppingCar, $request, $placeToPayBridgeAction);

        return $Amortization->status=='pending' ? redirect($Amortization->process_url) : redirect()->route('productos.index');
    }

    public function show($id): View
    {
        $amortization = Amortization::find($id);
        $shoppingCar = ShoppingCar::find($amortization->shopping_car_id);
        $user = User::find($amortization->user_id);
        $currency = config('currency');
        return view('clients.amortization.voucher', compact( 'shoppingCar','user','amortization', 'currency'));
    }

}
