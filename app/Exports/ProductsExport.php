<?php

namespace App\Exports;

use App\Models\Products;
use Illuminate\Contracts\Queue\ShouldQueue;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromQuery;

class ProductsExport implements FromQuery, ShouldQueue
{
    use Exportable;
    private ? string $date;
    private ? string $endDate;
    private ? string $price;
    private ? string $endPrice;
    private ? string $category;
    private ? string $bestSellers;

    public function forDate(?string $date)
    {
        $this->date = $date;

        return $this;
    }

    public function forEndDate(?string $endDate)
    {
        $this->endDate = $endDate;

        return $this;
    }

    public function forPrice(?string $price)
    {
        $this->price = $price;

        return $this;
    }

    public function forEndPrice(?string $endPrice)
    {
        $this->endPrice = $endPrice;

        return $this;
    }

    public function forCategory(?string $category)
    {
        $this->category =$category;

        return $this;
    }

    public function bestSeller(?string $bestSellers)
    {
        $this->bestSellers = $bestSellers;

        return $this;
    }


    public function query()
    {
        return Products::query()->when($this->date,function ($query){$query->whereBetween('created_at',[$this->date,$this->endDate]);})
        ->when($this->price,function ($query){$query->whereBetween('price', [$this->price,$this->endPrice]);})
        ->when($this->price,function ($query){$query->where('category_id',$this->category);});
    }

}
