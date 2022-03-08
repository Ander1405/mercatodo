<?php

namespace Roles;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use function route;

class CreateRoleTest extends TestCase
{
    use RefreshDatabase;
    public function setUp(): void
    {
        parent::setUp(); // TODO: Change the autogenerated stub
        $this->artisan('db:seed --class=SeederTablaPermisos');
    }

    public function test_it_can_access_to_the_creation_users_route(): void
    {
        $user = User::factory()->create()->givePermissionTo('crear-rol');
        $response = $this->actingAs($user)->get(route('roles.create'));
        $response->assertStatus(200);
    }

    public function test_it_user_doesnt_permissions_cant_list_users(): void
    {
        $user2 = User::factory()->create();
        $response = $this->actingAs($user2)->get(route('roles.create'));
        $response->assertForbidden();
    }
}
