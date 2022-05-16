<?php

namespace App\Http\Controllers\Reports;

use App\Events\RegisterAdminEvent;
use App\Events\StoreExport;
use App\Exports\AmortizationExport;
use App\Http\Controllers\Controller;
use App\Models\Amortization;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;

class ExportAmortizationController extends Controller
{

    public function index()
    {
        return view('reports.amortizationexports');
    }

    public function export()
    {
        $user = auth()->user();
        $filename = str::uuid();
        $type = 'amortization';
        $filepath = asset('storage/amortizations-'. $filename .'.xlsx');

        RegisterAdminEvent::dispatch($user,'Exporte de transacciones realizado con exito');
        StoreExport::dispatch($user,$filepath, $type);

        Excel::store(new AmortizationExport, 'amortizations-'. $filename .'.xlsx', 'public');
        return view('reports.amortizationexports');
    }
}
