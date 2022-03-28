<?php

namespace Database\Seeders;

use App\Models\Products;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Products::create([
            'name' => 'PS5',
            'price' => 200,
            'description' => 'Esto es un test',
            'image' => 'https://images.unsplash.com/photo-1542496658-e33a6d0d50f6?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=750&q=80',
            'storage' => '500 GB',
            'ram' => '16',
            'processor' => 'AMD Ryzen 5',
            'graph' => '1660 TI',
            'brand' => 'Sony',
            'stock' => '2'
        ]);
        Products::create([
            'name' => 'Xbox',
            'price' => 300,
            'description' => 'Esto es un test',
            'image' => 'https://images.unsplash.com/photo-1542496658-e33a6d0d50f6?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=750&q=80',
            'storage' => '500 GB',
            'ram' => '16',
            'processor' => 'AMD Ryzen 5',
            'graph' => '1660 TI',
            'brand' => 'Sony',
            'stock' => '4'
        ]);
        Products::create([
            'name' => 'Portatil Asus',
            'price' => 200,
            'description' => 'Esto es un test',
            'image' => 'https://images.unsplash.com/photo-1542496658-e33a6d0d50f6?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=750&q=80',
            'storage' => '500 GB',
            'ram' => '16',
            'processor' => 'AMD Ryzen 5',
            'graph' => '1660 TI',
            'brand' => 'Sony',
            'stock' => '2'
        ]);
        Products::create([
            'name' => 'Pc de mesa',
            'price' => 200,
            'description' => 'Esto es un test',
            'image' => 'https://images.unsplash.com/photo-1542496658-e33a6d0d50f6?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=750&q=80',
            'storage' => '500 GB',
            'ram' => '16',
            'processor' => 'AMD Ryzen 5',
            'graph' => '1660 TI',
            'brand' => 'Sony',
            'stock' => '2'
        ]);
        Products::create([
            'name' => 'Audifonos',
            'price' => 200,
            'description' => 'Esto es un test',
            'image' => 'https://images.unsplash.com/photo-1542496658-e33a6d0d50f6?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=750&q=80',
            'storage' => '500 GB',
            'ram' => '16',
            'processor' => 'AMD Ryzen 5',
            'graph' => '1660 TI',
            'brand' => 'Sony',
            'stock' => '2'
        ]);
        Products::create([
            'name' => 'Iphone 13 pro max',
            'price' => 200,
            'description' => 'Esto es un test',
            'image' => 'https://images.unsplash.com/photo-1542496658-e33a6d0d50f6?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=750&q=80',
            'storage' => '500 GB',
            'ram' => '16',
            'processor' => 'AMD Ryzen 5',
            'graph' => '1660 TI',
            'brand' => 'Sony',
            'stock' => '2'
        ]);

    }
}
