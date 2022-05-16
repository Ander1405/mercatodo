<?php

namespace App\Http\Controllers\Reports;

use App\Actions\Cache\CategoryCacheAction;
use App\Events\RegisterAdminEvent;
use App\Events\StoreExport;
use App\Exports\ProductsExport;
use App\Http\Controllers\Controller;
use App\Jobs\NotifyUserCompletedExport;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;

class ExportProductsController extends Controller
{
    public function index(CategoryCacheAction $cacheAction)
    {
        $categories = $cacheAction->cacheIndex();
        return view('reports.exports', compact('categories'));
    }

    public function export(Request $request, CategoryCacheAction $cacheAction)
    {
        $user = auth()->user();
        $filename = str::uuid();
        $type = 'products';
        $filepath = asset('storage/products-'. $filename .'.xlsx');


        Excel::store((new ProductsExport)
            ->forDate($request->query('date'))
            ->forEndDate($request->query('endDate'))
            ->forPrice($request->query('price'))
            ->forEndPrice($request->query('endPrice'))
            ->forCategory($request->query('category_id')),'products-'. $filename .'.xlsx', 'public')
            ->chain([new NotifyUserCompletedExport($user, $filepath,)]);

        RegisterAdminEvent::dispatch($user,'Exporte realizado con exito');
        StoreExport::dispatch($user,$filepath, $type);
        $categories = $cacheAction->cacheIndex();

        return view('reports.exports', compact('categories'));
    }

}


