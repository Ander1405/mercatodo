<?php

namespace Tests\Feature\Admin\Products;

use App\Models\Products;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Tests\TestCase;

class UpdateProductTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp(); // TODO: Change the autogenerated stub
        $this->artisan('db:seed --class=SeederTablaPermisos');
    }

    public function test_it_can_update_a_product(): void
    {
        $request = [
            'name' => 'Test product',
            'price' => 10,
            'image' => UploadedFile::fake()->image('product.jpg', 500, 250)->size(50),
        ];

        $product = Products::factory()->create();
        $user = User::factory()->create()->givePermissionTo('editar-producto');

        $response = $this->actingAs($user)->patch(route('productos.update', $product), $request);
        $response->assertRedirect();

        $product = $product->refresh();
        $this->assertEquals($request['name'], $product->name);

    }

    public function test_it_can_update_a_product_without_image(): void
    {
        $request = [
            'name' => 'Test product',
            'price' => 10
        ];

        $product = Products::factory()->create();
        $user = User::factory()->create()->givePermissionTo('editar-producto');

        $response = $this->actingAs($user)->patch(route('productos.update', $product), $request);
        $response->assertRedirect();

        $product = $product->refresh();
        $this->assertEquals($request['name'], $product->name);

    }
}
