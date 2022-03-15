<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Products\StoreProductRequest;
use App\Http\Requests\Admin\Products\UpdateProductRequest;
use App\Models\Products;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use function config;
use function redirect;
use function view;

class ProductoController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:ver-producto|crear-producto|editar-producto|borrar-producto',['only'=>['index']]);
        $this->middleware('permission:crear-producto' ,['only'=>['create','store']]);
        $this->middleware('permission:editar-producto' ,['only'=>['edit','update']]);
        $this->middleware('permission:borrar-producto' ,['only'=>['destroy']]);
    }

    public function index(Request $request): View
    {
        $currency = config('app.currency');
        $products = Products::where('name', 'LIKE', '%' . $request->input('search') . '%')->paginate(6);
        return view('productos.index', compact('products','currency'));
    }


    public function create(): View
    {
        return view('productos.crear');
    }

    public function show(Products $producto): view
    {
        $currency = config('app.currency');
        return view('productos.show', compact('producto','currency'));
    }

    public function store(StoreProductRequest $request): RedirectResponse
    {
        $producto = $request->all();

        if($imagen = $request->file('image')) {
            $rutaGuardarImg = 'image/';
            $imagenProducto = date('YmdHis'). "." . $imagen->getClientOriginalExtension();
            $imagen->move($rutaGuardarImg, $imagenProducto);
            $producto['image'] = "$imagenProducto";
        }

        Products::create($producto);
        return redirect()->route('productos.index');
    }

    public function edit(Products $producto): View
    {
        return view('productos.editar', compact('producto'));
    }


    public function update(UpdateProductRequest $request, Products $producto): RedirectResponse
    {
        $prod = $request->all();
        if($imagen = $request->file('image')){
            $rutaGuardarImg = 'image/';
            $imagenProducto = date('YmdHis') . "." . $imagen->getClientOriginalExtension();
            $imagen->move($rutaGuardarImg, $imagenProducto);
            $prod['image'] = "$imagenProducto";
        }else{
            unset($prod['image']);
        }
        $producto->update($prod);
        return redirect()->route('productos.index');
    }


    public function destroy(Products $producto): RedirectResponse
    {
        $producto->delete();
        return redirect()->route('productos.index');
    }
}
