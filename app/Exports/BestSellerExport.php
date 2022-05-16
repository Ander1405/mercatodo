<?php

namespace App\Exports;

use App\Models\SalesByCategorie;
use Maatwebsite\Excel\Concerns\FromCollection;

class BestSellerExport implements FromCollection
{
    public function collection()
    {
        return SalesByCategorie::all();
    }
}
