<?php

namespace App\Actions\Car;

use App\Models\Products;

class UpdateCarAction
{
    public function updateCar(array $data, Products $product)
    {
        $shoppingCartItem= auth()->user()->shoppingCarActive()->shoppingCarItems;
        $totalQuantity = $data['quantity'];
        foreach ($shoppingCartItem as $item) {
            if ($item->product_id == $product->id) {
                $itemSelected = $item;
                if ($totalQuantity > $product->stock) {
                    return redirect()->route('shoppingCar');
                } else {
                    $data=(['quantity'=>$totalQuantity]);
                    $itemSelected->update($data);
                    return redirect()->route('shoppingCar');
                }
            }
        }
    }
}
