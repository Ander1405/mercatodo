<?php

namespace App\Imports;

use App\Models\Products;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithUpsertColumns;
use Maatwebsite\Excel\Concerns\WithUpserts;
use Maatwebsite\Excel\Concerns\WithValidation;

class ProductsImport implements ToModel,WithHeadingRow, WithValidation, WithUpserts
{

    public function model(array $row): Products
    {
        return new Products([
            'name' =>  $row['name'],
            'description' => $row['description'],
            'image' => $row['image'],
            'price' => $row['price'],
            'storage' => $row['storage'],
            'ram' => $row['ram'],
            'processor' => $row['processor'],
            'graph' => $row['graph'],
            'brand' => $row['brand'],
            'stock' =>$row['stock'],
        ]);
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'min:5', 'max:100'],
            'description' =>['required', 'min:10', 'max:250'],
            'price' => ['required', 'integer', 'min:1'],
            'image',
            'storage' => ['required', 'min:1'],
            'stock' => ['required', 'min:1', 'max:250'],
            'ram' => ['required', 'integer', 'min:1'],
            'processor' => ['required', 'min:5'],
            'graph' => ['required', 'min:5'],
            'brand' => ['required', 'min:1'],
        ];
    }

    public function uniqueBy()
    {
        return 'name';
    }
}
