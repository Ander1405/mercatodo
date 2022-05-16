<?php

namespace App\Http\Controllers\Reports;

use App\Events\RegisterAdminEvent;
use App\Events\StoreExport;
use App\Exports\AdminFilesExport;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;

class AdminFilerExportController extends Controller
{
    public function adminExport()
    {
        $user = auth()->user();
        $filename = str::uuid();
        $type = 'type';
        $filepath = asset('storage/AdminFiles-'. $filename.'.xlsx');

        RegisterAdminEvent::dispatch($user,'Se a realizado una descarga del historial de exportes');
        StoreExport::dispatch($user,$filepath,$type);

        return Excel::download(new AdminFilesExport,'AdminFiles.xlsx');
    }
}
