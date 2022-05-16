<?php

namespace App\Actions\Products;

use App\Models\Products;

class UpdateProductAction
{
    public function execute(array $data, Products $products, $image, $id): Products
    {
//        info('string*', [$products]);
//        dd($products);
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
        $products->categorie = $data['categorie'];
        $products->save();

        return $products;
    }
}
