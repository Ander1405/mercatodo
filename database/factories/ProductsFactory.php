<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Http\UploadedFile;

class ProductsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->words(2, true),
            'price' => $this->faker->randomDigitNotZero(),
            'description' => 'Esto es una prueba',
            'storage' => '500 GB',
            'stock' => '150',
            'ram' => '16',
            'processor' => 'AMD Ryzen 5',
            'graph' => '1660 TI',
            'brand' => 'Asus',
            'image' => UploadedFile::fake()->image('product.jpg', 500, 250)->size(50),
        ];
    }
}
