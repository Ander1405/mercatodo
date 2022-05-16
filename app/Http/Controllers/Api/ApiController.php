<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Products\StoreProductRequest;
use App\Http\Requests\Admin\Products\UpdateProductRequest;
use App\Http\Resources\ProductResource;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Http\Response;

class ApiController extends Controller
{

    public function index(): ResourceCollection
    {
        return ProductResource::collection(Products::paginate());
    }


    public function store(StoreProductRequest $request)
    {
        $product = new Products();
        $product->name = $request['name'];
        $product->description = $request['description'];
        $product->image = $request['image'];
        $product->price = $request['price'];
        $product->storage = $request['storage'];
        $product->ram = $request['ram'];
        $product->processor = $request['processor'];
        $product->brand = $request['brand'];
        $product->stock = $request['stock'];
        $product->graph = $request['graph'];
        $product->category_id = $request['category_id'];

        $product->save();

        return ProductResource::make($product)->response()->setStatusCode(201);

    }


    public function show(Products $products)
    {
        return ProductResource::make($products);
    }


    public function edit($id)
    {
        //
    }


    public function update(UpdateProductRequest $request, Products $products): ProductResource
    {
        $products->name = $request['name'];
        $products->description = $request['description'];
        $products->image = $request['image'];
        $products->price = $request['price'];
        $products->storage = $request['storage'];
        $products->ram = $request['ram'];
        $products->processor = $request['processor'];
        $products->brand = $request['brand'];
        $products->stock = $request['stock'];
        $products->graph = $request['graph'];
        $products->category_id = $request['category_id'];

        $products->save();

        return ProductResource::make($products);
    }


    public function destroy(Products $products): Response
    {
        $products->delete();
        return response(null, 204);
    }
}
