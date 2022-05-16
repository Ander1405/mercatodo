<?php

namespace App\Http\Controllers\Reports;

use App\Http\Controllers\Controller;
use App\Models\Export;
use Illuminate\Support\Str;

class ExportAdminController extends Controller
{
    public function index()
    {

        $filename = str::uuid();
        $filepath = asset('storage/AdminFiles-'. $filename.'.xlsx');
        $exports = Export::all();
        return view('reports.exportadmin', compact('exports', 'filename', 'filepath'));
    }
}
