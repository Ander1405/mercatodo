<?php

namespace App\Events;

use App\Models\Products;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ProductMoreSaleByCategorie
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public Products $products;
    public string $name;
    public string $category;

    public function __construct(Products $products, string $name, string $category)
    {
        $this->products = $products;
        $this->name = $name;
        $this->category = $category;
    }

}
