<?php

namespace App\Http\Controllers\Product;

use App\Actions\Cache\CategoryCacheAction;
use App\Actions\Categories\StoreCategoryAction;
use App\Actions\Categories\UpdateCategoryAction;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{

    public function index(CategoryCacheAction $cacheAction)
    {
        $categories = $cacheAction->cacheIndex();
        return view('productos.categories.index', compact('categories'));
    }


    public function create()
    {
        return view('productos.categories.create');
    }


    public function store(Request $request, StoreCategoryAction $categoryAction)
    {
        Cache::forget('categories');
        $newCategory = $categoryAction->storeCategory($request->all(),new Category());
        return redirect()->route('category.index', compact('newCategory'));
    }

    public function edit(Category $category)
    {
        return view('productos.categories.edit', compact('category'));
    }


    public function update(Request $request, UpdateCategoryAction $categoryAction, Category $category)
    {
        Cache::forget('categories');
        $categoryAction->executeUpdate($request->all(),$category);
        return redirect()->route('category.index', compact('categoryAction'));
    }


    public function destroy($id)
    {
        Cache::forget('categories');
        DB::table('categories')->where('id',$id)->delete();

        return redirect()->route('category.index');
    }
}
