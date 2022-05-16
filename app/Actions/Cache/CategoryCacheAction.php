<?php

namespace App\Actions\Cache;

use App\Models\Category;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class CategoryCacheAction
{
    public function cacheIndex()
    {
        return Cache::rememberForever('categories', function () {
            return Category::all();
        });
    }
}
