<?php

namespace App\Actions\Categories;

use App\Models\Category;

class StoreCategoryAction
{
    public function storeCategory(array $data, Category $category): Category
    {
        $category->name = $data['name'];
        $category->description = $data['description'];
        $category->save();

        return $category;
    }
}
