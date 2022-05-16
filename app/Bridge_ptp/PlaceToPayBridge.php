<?php

namespace App\Bridge_ptp;

use App\Actions\Car\TotalPriceCarAction;
use App\Actions\PlaceToPayBridge\PlaceToPayBridgeAction;
use App\Contracts\AmortizationBridgeContract;
use App\Events\ProductMoreSaleByCategorie;
use App\Exceptions\AmortizationException;
use App\Models\Amortization;
use App\Models\ShoppingCar;
use App\Models\User;
use App\Notifications\AmortizationNotification;
use Carbon\Carbon;
use Dnetix\Redirection\PlacetoPay;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Throwable;

class PlaceToPayBridge implements AmortizationBridgeContract
{
    protected PlacetoPay $placetopay;

    public function connection(array $settings): self
    {
        $this->placetopay = new PlacetoPay([
            'login' => Arr::get($settings,'login'),
            'tranKey' => Arr::get($settings, 'tranKey'),
            'baseUrl' => Arr::get($settings, 'baseUrl'),
            'timeout' => 10,
        ]);
        return $this;
    }

    public function createSession (ShoppingCar $shoppingCar, Request $request, PlaceToPayBridgeAction $placeToPayBridgeAction): Amortization
    {
        $totalPrice = $placeToPayBridgeAction->priceCheckOut($shoppingCar);

        try {
            $amortization = $placeToPayBridgeAction->started($shoppingCar, $totalPrice);
            $request = [
                'payment' => [
                    'reference' => $amortization->reference,
                    'description' => $amortization->description,
                    'amount' => [
                        'currency' => 'COP',
                        'total' => $totalPrice,
                    ],
                ],
                'payer' => [
                    'document' => $amortization->user->document,
                    'documentType' => 'CC',
                    'name' => $amortization->user->name,
                    'surname' => $amortization->user->surname,
                    'email' => $amortization->user->email,
                    'mobile' => $amortization->user->phone_number,
                ],
                'expiration' => date('c',strtotime('+30 minutes')),
                'returnUrl' => route('clients', $amortization),
                'ipAddress' => $request->ip(),
                'userAgent' => $request->userAgent(),
            ];
            $response = $this->placetopay->request($request);

            return $placeToPayBridgeAction->updated($amortization, $response);

        }catch (Throwable $exception){
            report($exception);
            throw new AmortizationException($exception->getMessage());
        }
    }

    public function queryPayment(Amortization $amortization): Amortization
    {
        $response = $this->placetopay->query($amortization->request_id);

        try {
            if ($response->isSuccessful()){
                if ($response->status()->isApproved()){
                    $amortization->status = 'successful';
                    $userNotify = User::find($amortization->user_id);
                    $userNotify->notify(new AmortizationNotification($amortization));
                    $amortization->paid_at = new Carbon($response->status()->date());
                    $amortization->receipt = Arr::get($response->payment(),'receipt');
                    $idCart = $amortization->shopping_car_id;
                    $shoppingCar = ShoppingCar::find($idCart);
                    foreach ($shoppingCar->shoppingCarItems as $product){
                        $productQuantity = $product->quantity;
                        $productStock = $product->product->stock ;
                        $stockNow = $productStock - $productQuantity ;
                        $product->product->stock = $stockNow;
                        $product->product->save();
                        $count = 1;
                        while ($count <= $productQuantity) {
                            ProductMoreSaleByCategorie::dispatch($product->product, $product->product->name, $product->product->category->name);
                            $count++;
                        }

                    }
                }elseif ($response->status()->isRejected()){
                    $amortization->status = 'rejected';
                }

                $amortization->save();
            }
        }
        catch (Throwable $exception)
        {
            report($exception);
            throw new AmortizationException($exception->getMessage());
        }
        return $amortization;
    }

}
