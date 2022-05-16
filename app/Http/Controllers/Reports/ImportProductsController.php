<?php

namespace App\Http\Controllers\Reports;

use App\Http\Controllers\Controller;
use App\Imports\ProductsImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ImportProductsController extends Controller
{
    public function index()
    {
        return view('reports.imports');
    }

    public function import(Request $request)
    {
//        dd($request);
        $file =$request->file('file')->getRealPath();
        Excel::import(new ProductsImport(), $file);

        return redirect('/')->with('success', 'All good!');
    }
}
