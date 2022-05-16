<?php

namespace App\Actions\Car;

use App\Events\ProductMoreSaleByCategorie;
use App\Models\Products;
use App\Models\ShoppingCar;
use Illuminate\Http\RedirectResponse;

class StoreCarAction
{
    public function storeCar(array $data, ShoppingCar $shoppingCar, Products $product): RedirectResponse
    {
        $shoppingCartItem= auth()->user()->shoppingCarActive()->shoppingCarItems;
        $itemSelected = 0;
        $totalQuantity = 0 ;
        foreach ($shoppingCartItem as $item) {
            if ($item->product_id == $product->id) {
                $itemSelected = $item;
                $totalQuantity = ($item->quantity) + ($data['quantity']);
            }
        }
        if ($totalQuantity <= $product->stock and $totalQuantity != 0) {
            $data = (['amount' => $totalQuantity]);
            $itemSelected->update($data);
            return redirect()->route('shoppingCar');
        } elseif ($totalQuantity > $product->stock) {
            return redirect()->route('shoppingCar');
        }
        if ($data['quantity'] <= $product->stock) {
            $shoppingCar->shoppingCarItems()->create([
                'product_id' => $product->getKey(),
                'quantity' => $data['quantity']
            ]);

            return redirect()->route('shoppingCar');
        } else {
            return redirect()->route('shoppingCar');
        }
    }
}
