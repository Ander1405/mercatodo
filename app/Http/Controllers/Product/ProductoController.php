<?php

namespace App\Http\Controllers\Product;

use App\Actions\Cache\CategoryCacheAction;
use App\Actions\Delete_for_all\DeleteAction;
use App\Actions\Products\ImageAction;
use App\Actions\Products\StoreProductAction;
use App\Actions\Products\UpdateProductAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Products\StoreProductRequest;
use App\Http\Requests\Admin\Products\UpdateProductRequest;
use App\Models\Category;
use App\Models\Products;
use App\Models\ShoppingCar;
use Dflydev\DotAccessData\Data;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use function config;
use function redirect;
use function view;

class ProductoController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:ver-producto|crear-producto|editar-producto|borrar-producto', ['only'=>['index']]);
        $this->middleware('permission:crear-producto', ['only'=>['create','store']]);
        $this->middleware('permission:editar-producto', ['only'=>['edit','update']]);
        $this->middleware('permission:borrar-producto', ['only'=>['destroy']]);
    }

    public function index(Request $request, CategoryCacheAction $cacheAction): View
    {
        $categories = $cacheAction->cacheIndex();
        $currency = config('app.currency');
        $products = Products::where('name', 'LIKE', '%' . $request->input('search') . '%')->paginate(10);
        return view('productos.index', compact('products', 'currency','categories'));
    }


    public function create(): View
    {
        $categories = Category::get();
        return view('productos.crear', compact('categories'));
    }

    public function show(Products $producto): view
    {
        $shoppingCart=auth()->user()->shoppingCarActive();
        $currency = config('app.currency');
        return view('productos.show', compact('producto', 'currency','shoppingCart'));
    }

    public function store( StoreProductRequest $request, StoreProductAction $storeProductAction, ImageAction $imageAction): RedirectResponse
    {
//        $categorie = $request['categorie'];
        $product = $storeProductAction->execute($request->all(), new Products(), $imageAction->image($request->file('image')),$request['category_id']);
        return redirect()->route('productos.index', compact('product'));
    }

    public function edit(Products $producto): View
    {
        $categories = Category::get();
        return view('productos.editar', compact('producto', 'categories'));
    }


    public function update(Request $request, Products $producto, UpdateProductAction $updateProductAction, ImageAction $imageAction): RedirectResponse
    {
//        $categorie = $request['categorie'];
        $updateProductAction->execute($request->all(), $producto, $imageAction->image($request->file('image')),$request['category_id']);

        return redirect()->route('productos.index');
    }


    public function destroy(Products $producto): RedirectResponse
    {
        $producto->delete();
        return redirect()->route('productos.index');
    }
}
