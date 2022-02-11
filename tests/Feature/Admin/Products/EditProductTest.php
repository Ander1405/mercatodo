<?php

namespace Tests\Feature\Admin\Products;

use App\Models\Products;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class EditProductTest extends TestCase
{
    use RefreshDatabase;
    public function setUp(): void
    {
        parent::setUp(); // TODO: Change the autogenerated stub
        $this->artisan('db:seed --class=SeederTablaPermisos');
    }
    public function test_it_can_edit_product(): void
    {
        $product = Products::factory()->create();
        $user = User::factory()->create()->givePermissionTo('editar-producto');
        $response = $this->actingAs($user)->get("/productos/{$product->id}/edit");
        $response->assertStatus(200);
        $response->assertViewIs('productos.editar');
    }
}
