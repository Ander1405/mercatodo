<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\Products;
use Illuminate\View\View;

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


    public function store(Request $request):RedirectResponse
    {
        $request->validate([
            'name' => 'required', 'description' => 'required', 'image' => 'required|image|mimes:jpeg,jpg,png,svg|max:1024'
        ]);

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


    public function show($id)
    {
        //
    }


    public function edit(Products $producto):View
    {
        return view('productos.editar', compact('producto'));
    }


    public function update(Request $request, Products $producto): RedirectResponse
    {
        $request->validate([
            'name' => 'required', 'description' => 'required'
        ]);
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
