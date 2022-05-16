<?php

namespace App\Console\Commands;

use App\Jobs\ResolvedAmortization;
use App\Models\Amortization;
use Illuminate\Console\Command;

class ConsutAmortization extends Command
{

    protected $signature = 'amortization:resolve';
    protected $description = 'Command description';

    public function handle()
    {
        $amortizations = Amortization::where('status', 'pending')->get();
        foreach ($amortizations as $amortization){
            ResolvedAmortization::dispatch($amortization);
        }
    }
}
