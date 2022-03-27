<?php

namespace App\Bridge_ptp;

use App\Contracts\AmortizationBridgeContract;
use App\Exceptions\AmortizationException;
use App\Models\Amortization;
use App\Models\ShoppingCar;
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

    public function createSession(ShoppingCar $shoppingCar, Request $request): Amortization
    {
        $totalPrice = 0;
        foreach ($shoppingCar->shoppingCarItems as $product){
            $priceProduct = $product->product->price;
            $productQuantity = $product->quantity;
            $totalPrice += $priceProduct * $productQuantity;
        }

        try {
            $payment = new Amortization();
            $payment->shopping_car_id = $shoppingCar->id;
            $payment->reference = Str::random(10);
            $payment->status = 'pending';
            $payment->user_id = auth()->user()->id;
            $payment->amount = $totalPrice;
            $payment->save();
            $request = [
                'payment' => [
                    'reference' => $payment->reference,
                    'description' => $payment->description,
                    'amount' => [
                        'currency' => 'COP',
                        'total' => $totalPrice,
                    ],

                ],
                'payer' => [
                    'document' => $payment->user->document,
                    'documentType' => 'CC',
                    'name' => $payment->user->name,
                    'surname' => $payment->user->surname,
                    'email' => $payment->user->email,
                    'mobile' => $payment->user->phone_number,
                ],
                'expiration' => date('c',strtotime('+30 minutes')),
                'returnUrl' => route('clients', $payment),
                'ipAddress' => $request->ip(),
                'userAgent' => $request->userAgent(),
            ];
            $response = $this->placetopay->request($request);
            if ($response->isSuccessful()){
                $payment->process_url = $response->processUrl();
                $payment->request_id = $response->requestId();
                $payment->status = 'pending';
                $payment->save();
                foreach ($shoppingCar->shoppingCarItems as $product){
                    $productQuantity = $product->quantity;
                    $productStock = $product->product->stock ;
                    $stockNow = $productStock - $productQuantity ;
                    $product->product->stock = $stockNow;
                    $product->product->save();
                }

                return $payment;
            }
            $payment->status = 'rejected';
            $payment->save();
            return $payment;
        }catch (Throwable $exception){
            report($exception);
            throw new AmortizationException($exception->getMessage());
        }
    }

    public function queryPayment(Amortization $payment): Amortization
    {
        $response = $this->placetopay->query($payment->request_id);

        try {
            if ($response->isSuccessful()){
                if ($response->status()->isApproved()){
                    $payment->status = 'successful';
                    $payment->paid_at = new Carbon($response->status()->date());
                    $payment->receipt = Arr::get($response->payment(),'receipt');
                }elseif ($response->status()->isRejected()){
                    $payment->status = 'rejected';
                }
                $payment->save();
            }
        }
        catch (Throwable $exception)
        {
            report($exception);
            throw new AmortizationException($exception->getMessage());
        }
        return $payment;
    }

}
