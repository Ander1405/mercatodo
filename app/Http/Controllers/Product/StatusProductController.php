<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Models\Products;
use Illuminate\Http\RedirectResponse;
use function redirect;

class StatusProductController extends Controller
{
    public function update($id): RedirectResponse
    {
        $product = Products::find($id);

        if ($product->status == 'enabled') {
            $product->status = 'disabled';
        } else {
            $product->status = 'enabled';
        }
        $product->save();
        return redirect()->route('productos.index');
    }
}
