<?php

namespace Tests\Feature\Admin\Users;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Tests\TestCase;

class StoreUserTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp(); // TODO: Change the autogenerated stub
        $this->artisan('db:seed --class=SeederTablaPermisos');
    }

    public function test_it_can_stores_a_new_user(): void
    {
        $data = $this->userData();
        $user = User::factory()->create()->givePermissionTo('crear-usuario');
        $response = $this->actingAs($user)->post(route('usuarios.store'), $data);
        $response->assertRedirect();
//        dd($response->getOriginalContent());
        $this->assertDatabaseHas('users', Arr::only($data, ['name', 'email']));

    }

    private function userData(): array
    {
        return [
            'name' => 'julian',
            'email' => 'julian@test.com',
            'password' => '12345678',
            'confirm-password' => '12345678',
        ];
    }
}
