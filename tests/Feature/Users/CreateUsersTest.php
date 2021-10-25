<?php

namespace Tests\Feature\Users;

use App\Models\Staff;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Sanctum\Sanctum;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Tests\TestCase;

class CreateUsersTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    // creacion de usuarios desde dashboard != register
    public function usuario_no_autenticado_no_puede_crear_usuarios()
    {
        $this->jsonApi()
            ->post(route('v1.users.create'))
            ->assertStatusCode(401);
    }

    /** @test */
    public function usuario_no_autorizado_no_puede_crear_usuarios()
    {
        $user = User::factory()->create();

        Sanctum::actingAs($user);

        $this->jsonApi()
            ->post(route('v1.users.create'))
            ->assertStatusCode(403);
    }

    /** @test */
    public function usuario_puede_crear_usuarios()
    {
        Permission::create([
            'guard_name'    => 'sanctum',
            'name'          => 'create:user'
        ]);
        $user = User::factory()->create();

        Sanctum::actingAs($user, ['create:user']);

        $this->assertDatabaseMissing('users', [
            'name' => 'Rodrigo',
            'email' => 'rodrigoti@mail.com'
        ]);

        $this->jsonApi()->withData([
                'type' => 'users',
                'attributes' => [
                    'name' => 'Rodrigo',
                    'email' => 'rodrigoti@mail.com'
                ],
            ])
            ->post(route('v1.users.create'))
            ->assertCreated();

        $this->assertDatabaseHas('users',[
            'name' => 'Rodrigo',
            'email' => 'rodrigoti@mail.com'
        ]);
    }

    /** @test */
    public function super_admin_puede_crear_usuarios()
    {
        Role::create([
            'guard_name'    => 'sanctum',
            'name'          => 'super:admin'
        ]);
        $staff = Staff::factory()->create()->assignRole(['super:admin']);

        Sanctum::actingAs($staff);

        $this->assertDatabaseMissing('users', [
            'name' => 'Rodrigo',
            'email' => 'rodrigoti@mail.com'
        ]);

        $this->jsonApi()->withData([
            'type' => 'users',
            'attributes' => [
                'name' => 'Rodrigo',
                'email' => 'rodrigoti@mail.com'
            ],
        ])
            ->post(route('v1.users.create'))
            ->assertCreated();

        $this->assertDatabaseHas('users',[
            'name' => 'Rodrigo',
            'email' => 'rodrigoti@mail.com'
        ]);
    }
}
