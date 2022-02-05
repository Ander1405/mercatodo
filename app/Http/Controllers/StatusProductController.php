<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\Products;

class StatusProductController extends Controller
{
    public function update($id): RedirectResponse
    {
        $product = Products::find($id);

        if ($product->status == 'enabled'){
            $product->status = 'disabled';
        }else{
            $product->status = 'enabled';
        }
        $product->save();
        return redirect()->route('productos.index');
    }
}
