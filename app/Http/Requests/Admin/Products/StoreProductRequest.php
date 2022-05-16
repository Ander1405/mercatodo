<?php

namespace App\Http\Requests\Admin\Products;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreProductRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name',
            'description',
            'price',
            'categorie',
            'image',
            'storage',
            'stock',
            'ram',
            'processor',
            'graph',
            'brand' ,
        ];
    }
}
