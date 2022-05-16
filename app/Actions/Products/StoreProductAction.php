<?php

namespace App\Actions\Products;

use App\Models\Products;

class StoreProductAction
{
    public function execute(array $data, Products $products, $image): Products
    {
        $products->name = $data['name'];
        $products->description = $data['description'];
        $products->image = $image['image'];
        $products->price = $data['price'];
        $products->storage = $data['storage'];
        $products->ram = $data['ram'];
        $products->processor = $data['processor'];
        $products->graph = $data['graph'];
        $products->brand = $data['brand'];
        $products->stock = $data['stock'];
//        $products->category()->associate($id);
        $products->category_id = $data['category_id'];
        $products->save();

        return $products;
    }
}




//Products::create($producto);
//return redirect()->route('productos.index');
