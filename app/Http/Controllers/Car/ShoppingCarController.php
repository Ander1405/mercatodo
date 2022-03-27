<?php

namespace App\Http\Controllers\Car;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ShoppingCarController extends Controller
{
    public function index()
    {
        $totalPrice = 0;
        $shoppingCar = auth()->user()->shoppingCarActive();
        foreach ($shoppingCar->shoppingCarItems as $product){
            $priceProduct = $product->product->price;
            $productQuantity = $product->quantity;
            $totalPrice += $priceProduct * $productQuantity;
        }

        $shoppingCar=auth()->user()->shoppingCarActive()->shoppingCarItems;
        $currency=config('app.currency');
        return view('car.index',compact('shoppingCar','currency', 'totalPrice'));
    }
}
