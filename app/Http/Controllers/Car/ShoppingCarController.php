<?php

namespace App\Http\Controllers\Car;

use App\Actions\Car\TotalPriceCarAction;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ShoppingCarController extends Controller
{
    public function index(TotalPriceCarAction $totalPriceCarAction)
    {
        $totalPrice = $totalPriceCarAction->execute();
        $shoppingCar=auth()->user()->shoppingCarActive()->shoppingCarItems;
        $currency=config('app.currency');
        return view('car.index', compact('shoppingCar', 'currency', 'totalPrice'));
    }
}
