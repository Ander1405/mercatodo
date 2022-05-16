<?php

namespace App\Jobs;

use App\Contracts\AmortizationBridgeContract;
use App\Models\Amortization;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ResolvedAmortization implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected Amortization $amortization;
    protected AmortizationBridgeContract $bridgeContract;

    public function __construct(Amortization $amortization)
    {
        $this->amortization = $amortization;
        $this->bridgeContract = resolve(AmortizationBridgeContract::class);
    }

    public function handle(): void
    {
        $this->bridgeContract->queryPayment($this->amortization);
    }
}
