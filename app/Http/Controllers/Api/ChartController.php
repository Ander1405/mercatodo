<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Amortization;
use App\Models\SalesByCategorie;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class ChartController extends Controller
{
    public function chart(): JsonResponse
    {

        $values = SalesByCategorie::select('category', DB::raw('count(*) as total'))->groupBy('category')
            ->get()
            ->toArray();

        return response()->json([
            'data' => Arr::pluck($values, 'total', 'category')
        ]);
    }

    public function chartPayments(): JsonResponse
    {

        $values = Amortization::select('status', DB::raw('count(*) as total'))->groupBy('status')
            ->get()
            ->toArray();

        return response()->json([
            'data' => Arr::pluck($values, 'total', 'status')
        ]);
    }
}
