<?php

namespace App\Exports;

use App\Models\Amortization;
use Illuminate\Contracts\Queue\ShouldQueue;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;

class AmortizationExport implements FromQuery, ShouldQueue
{

    public function query()
    {
        return Amortization::query();
    }
}
