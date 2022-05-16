<?php

namespace App\Actions\Cache;

use App\Models\Amortization;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;

class RolCacheAction
{
    public function cacheIndex()
    {
        return Cache::rememberForever('roles', function () {
            return Role::all()->paginate(1);
        });
    }
}
