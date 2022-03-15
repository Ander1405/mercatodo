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
            'name' => ['required', 'min:5', 'max:50'],
            'price' => ['required', 'integer', 'min:1'],
            'description' => ['min:5', 'max:250'],
            'storage',
            'ram',
            'processor',
            'graph',
            'brand',
        ];
    }

}
