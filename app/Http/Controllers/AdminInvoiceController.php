<?php

namespace App\Http\Controllers;

use App\Models\Amortization;
use Illuminate\Http\Request;

class AdminInvoiceController extends Controller
{
    public function index (Request $request)
    {

        $invoices = Amortization::paginate(5);
        return view('invoices.index', compact('invoices'));
    }
}
