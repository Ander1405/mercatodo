<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
use Illuminate\View\View;

class ProductClientController extends Controller
{
    public function index(Request $request): View
    {
        $currency = config('app.currency');
        $products = Products::where('name', 'LIKE', '%' . $request->input('search') . '%')
            ->where('status','enabled')->paginate(6);
        return view('clients.index', compact('products','currency'));
    }
}
