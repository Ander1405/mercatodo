<?php

namespace App\Actions\Car;

use App\Models\ShoppingCar;

class TotalPriceCarAction
{
    public function execute(): int
    {
        $totalPrice = 0;
        $shoppingCar = auth()->user()->shoppingCarActive();
        foreach ($shoppingCar->shoppingCarItems as $product) {
            $priceProduct = $product->product->price;
            $productQuantity = $product->quantity;
            $totalPrice += $priceProduct * $productQuantity;
        }

        return $totalPrice;
    }
}
