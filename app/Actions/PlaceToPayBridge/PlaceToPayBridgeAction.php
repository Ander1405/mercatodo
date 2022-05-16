<?php

namespace App\Actions\PlaceToPayBridge;

use App\Models\Amortization;
use App\Models\ShoppingCar;
use Illuminate\Support\Str;

class PlaceToPayBridgeAction
{
    public function started(ShoppingCar $shoppingCar, $totalPrice): Amortization
    {
        $amortization = new Amortization();
        $amortization->shopping_car_id = $shoppingCar->id;
        $amortization->reference = Str::random(10);
        $amortization->status = 'pending';
        $amortization->user_id = auth()->user()->id;
        $amortization->payer_document = auth()->user()->document;
        $amortization->amount = $totalPrice;
        $amortization->save();

        return $amortization;
    }

    public function updated(Amortization $amortization, $response)
    {
        if ($response->isSuccessful()){
            auth()->user()->shoppingCarNew();
            $amortization->process_url = $response->processUrl();
            $amortization->request_id = $response->requestId();
            $amortization->status = 'pending';
            $amortization->save();

            return $amortization;
        }
        $amortization->status = 'rejected';
        $amortization->save();
        return $amortization;
    }

    public function priceCheckOut(ShoppingCar $shoppingCar)
    {
        $totalPrice = 0;
        foreach ($shoppingCar->shoppingCarItems as $product) {
            $priceProduct = $product->product->price;
            $productQuantity = $product->quantity;
            $totalPrice += $priceProduct * $productQuantity;
        }
        return $totalPrice;
    }
}
