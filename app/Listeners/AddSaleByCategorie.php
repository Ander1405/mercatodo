<?php

namespace App\Listeners;

use App\Events\ProductMoreSaleByCategorie;
use App\Models\SalesByCategorie;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class AddSaleByCategorie
{

    public function handle(ProductMoreSaleByCategorie $event): void
    {

          SalesByCategorie::create([
            'product_id' => $event->products->id,
            'name' => $event->name,
            'category' => $event->category,
        ]);
    }
}
