<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this -> id,
            'name' => $this -> name,
            'description' => $this -> description,
            'image' => $this -> image,
            'price' => $this -> price,
            'storage' => $this -> storage,
            'ram' => $this -> ram,
            'processor' => $this -> processor,
            'graph' => $this -> graph,
            'brand' => $this -> brand,
            'stock' => $this -> stock,
            'category_id' => $this -> category_id
        ];
    }
}
