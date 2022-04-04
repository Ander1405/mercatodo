<?php

namespace App\Providers;

use App\Contracts\AmortizationBridgeContract;
use Illuminate\Support\Arr;
use Illuminate\Support\ServiceProvider;

class AmortizationBridgeProvider extends ServiceProvider
{
    public function boot()
    {
        $this->app->bind(AmortizationBridgeContract::class, function(){
            $service = config('payment.services.current');
            $gateway = config('payment.services.'.$service);
            $gatewayClass = Arr::get($gateway,'class');
            return (new $gatewayClass())->connection(Arr::get($gateway, 'settings'));
        });
    }
}
