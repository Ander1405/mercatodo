<?php

namespace App\Http\Controllers\Payments;

use App\Actions\Cache\RolCacheAction;
use App\Http\Controllers\Controller;
use App\Models\Amortization;
use Illuminate\Http\Request;
use function view;

class AdminInvoiceController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:ver-historial', ['only'=>['index']]);
    }

    public function index(RolCacheAction $histoyCacheAction)
    {
        $amortizations=$histoyCacheAction->cacheIndex();
        $invoices = Amortization::paginate(12);
        return view('invoices.index', compact('invoices', 'amortizations'));
    }
}
