<?php

namespace Tests\Feature\Admin\Products;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CreateProductTest extends TestCase
{
    use RefreshDatabase;
    public function setUp(): void
    {
        parent::setUp(); // TODO: Change the autogenerated stub
        $this->artisan('db:seed --class=SeederTablaPermisos');
    }

    public function test_it_can_access_to_the_creation_route(): void {

        $user = User::factory()->create()->givePermissionTo('crear-producto');
        $response = $this->actingAs($user)->get(route('productos.create'));
        $response->assertStatus(200);
    }
}