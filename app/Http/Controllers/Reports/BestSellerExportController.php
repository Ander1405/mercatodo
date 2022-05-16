<?php

namespace App\Http\Controllers\Reports;

use App\Exports\BestSellerExport;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\SalesByCategorie;

class BestSellerExportController extends Controller
{
    public function index()
    {
        return view('reports.bestseller');
    }

    public function export()
    {
        return Excel::download(new BestSellerExport, 'bestseller.xlsx');
    }
}
