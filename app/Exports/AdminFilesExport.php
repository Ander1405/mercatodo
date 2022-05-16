<?php

namespace App\Exports;

use App\Models\Export;
use Maatwebsite\Excel\Concerns\FromCollection;

class AdminFilesExport implements FromCollection
{
    public function collection()
    {
        return Export::all();
    }
}
