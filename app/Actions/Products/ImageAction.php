<?php

namespace App\Actions\Products;

class ImageAction
{
    public function image($image): array
    {
        $routeSaveImg = 'image/';
        $imageProduct = date('YmdHis'). "." . $image->getClientOriginalExtension();
        $image->move($routeSaveImg, $imageProduct);
        $data['image'] = "$imageProduct";

        return $data;
    }
}
