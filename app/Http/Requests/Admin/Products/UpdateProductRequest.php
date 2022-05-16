<?php

namespace App\Http\Requests\Admin\Products;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' =>['required'],
            'description'=>['required'],
            'price'=>['required'],
            'categorie'=>['required'],
            'image'=>['required'],
            'storage'=>['required'],
            'stock'=>['required'],
            'ram'=>['required'],
            'processor'=>['required'],
            'graph'=>['required'],
            'brand'=>['required'],
        ];
    }
}
