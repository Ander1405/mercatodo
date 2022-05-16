<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\View\View;
use function config;
use function view;

class ProductClientController extends Controller
{
    public function index(Request $request): View
    {
        $shoppingCart=auth()->user()->shoppingCarActive();
        $currency = config('app.currency');
        $products = Products::where('name', 'LIKE', '%' . $request->input('search') . '%')
            ->where('status', 'enabled')->paginate(10);
        return view('clients.index', compact('products', 'currency', 'shoppingCart'));
    }
}
