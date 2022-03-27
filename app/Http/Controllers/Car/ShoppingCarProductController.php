<?php

namespace App\Http\Controllers\Car;

use App\Contracts\AmortizationBridgeContract;
use App\Http\Controllers\Controller;
use App\Http\Requests\Car\StoreShoppingCarProductRequest;
use App\Http\Requests\Car\UpdateShoppingCarProductRequest;
use App\Models\Amortization;
use App\Models\Products;
use App\Models\ProductSale;
use App\Models\ShoppingCar;
use App\Models\ShoppingCarProduct;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ShoppingCarProductController extends Controller
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

    public function store(Request $request, ShoppingCar $shoppingCar, Products $product): RedirectResponse
    {
        $shoppingCartItem= auth()->user()->shoppingCarActive()->shoppingCarItems;
        $itemSelected = 0;
        $totalQuantity = 0 ;
        foreach($shoppingCartItem as $item){
            if($item->product_id == $product->id ){
                $itemSelected = $item;
                $totalQuantity = ($item->quantity) + ($request->input('quantity'));
            }
        }
        if($totalQuantity <= $product->stock and $totalQuantity != 0){
            $data = (['amount' => $totalQuantity]);
            $itemSelected->update($data);
            return redirect()->route('shoppingCar');
        }elseif ($totalQuantity > $product->stock){
            return redirect()->route('shoppingCar');
        }
        if($request->input('quantity') <= $product->stock){
            $shoppingCar->shoppingCarItems()->create([
                'product_id' => $product->getKey(),
                'quantity' => $request->input('quantity')
            ]);
            return redirect()->route('shoppingCar');
        } else {
            return redirect()->route('shoppingCar');
        }
    }

    public function show(ShoppingCarProduct $ShoppingCarProduct)
    {
        //
    }

    public function edit(ShoppingCarProduct $ShoppingCarProduct)
    {
        //
    }

    public function update(Request $request,Products $product)
    {
        $shoppingCartItem= auth()->user()->shoppingCarActive()->shoppingCarItems;
        $totalQuantity = $request->input('quantity');
        foreach ($shoppingCartItem as $item){
            if ($item->product_id == $product->id){
                $itemSelected = $item;
                if ($totalQuantity > $product->stock){
                    return redirect()->route('shoppingCar');
                }else{
                    $data=(['quantity'=>$totalQuantity]);
                    $itemSelected->update($data);
                    return redirect()->route('shoppingCar');
                }
            }
        }
    }

    public function destroy($id)
    {
        $itemShoppingCar = ShoppingCarProduct::find($id);
        $itemShoppingCar->delete();
        return redirect()->route('productos.index');
    }
}
