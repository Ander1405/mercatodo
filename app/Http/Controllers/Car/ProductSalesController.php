<?php

namespace App\Http\Controllers\Car;

use App\Helper\PlaceToPayIntegration;
use App\Http\Controllers\Controller;
use App\Models\ProductSale;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;

class ProductSalesController extends Controller
{
    public function index(): View
    {
        $sales = ProductSale::where('user_id', auth()->user()->id)->paginate(5);
        $currency = config('app.currency');
        return view('client.sale.index', compact('sales', 'currency'));
    }

    public function create(){

    }

    public function store(Request $request)
    {

        $shoppingCar = auth()->user()->shoppingCarActive()->shoppingCarItems;

        //calcula el valor de la compra
        $description = 'purchase:';
        $value = 0;
        foreach ($shoppingCar as $item) {
            $nameItem = $item->product->name;
            $valueItem = $item->product->value;
            $amountItem = $item->amount;

            $value += $valueItem * $amountItem;
            $description = $description . ' ' . $nameItem . ' value:' . $valueItem . ',amount:' . $amountItem . ',';
        }

        if ($value == 0) {
            return redirect()->route('shoppingCar.index');
        }


        $placetopay = PlaceToPayIntegration::createConnectionPTP();

        $reference = Str::random(20);
        $request = [
            'payment' => [
                'reference' => $reference,
                'description' => $description,
                'amount' => [
                    'currency' => 'USD',
                    'total' => $value,
                ],
            ],
            'expiration' => date('c', strtotime('+2 days')),
            'returnUrl' => route('sale.index'),
            'ipAddress' => $request->ip(),
            'userAgent' => $request->userAgent(),
        ];

        $response = $placetopay->request($request);

        auth()->user()->sales()->create([
            'description' => $description,
            'value' => $value,
            'reference' => $reference,
            'status' => 'in process',
            'ptpid' => $response->requestId()
        ]);
        if ($response->isSuccessful()) {
            return redirect($response->processUrl());
        } else {
            $user = auth()->user();
            $data = (['error' => $response->status()->message()]);
            $user->update($data);
            return redirect()->route('error.index');
        }

    }

    public function update(ProductSale $sale)
    {
        $reference = $sale->ptpid;

        $placetopay = PlaceToPayIntegration::createConnectionPTP();

        $response = $placetopay->query($reference);

        //solo guardar estado, en caso de fallo redireccionar y mostrar error
        if ($response->isSuccessful()) {
            $sale->status=$response->status()->status();
        } else {
            return redirect()->back()->withErrors($response->status()->message());
        }
        $sale->save();
        return redirect()->route('sale.index');
    }

}
