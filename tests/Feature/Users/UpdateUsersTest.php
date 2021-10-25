<?php

namespace Tests\Feature\Users;

use App\Models\Staff;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Sanctum\Sanctum;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Tests\TestCase;

class UpdateUsersTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    // un usuario no authenticado no puede actualizar su informacion de usuario
    public function usuario_no_auth_no_actualizar_su_usuario()
    {
       $user = User::factory()->create();

        $this->jsonApi()
            ->patch(route('v1.users.update', $user))
            ->assertStatusCode(401);
    }

    /**  @test */
    //  usuario que si esta authenticado, pero no tiene el permiso para editar su usuario
    public function usuario_no_autorizado_no_puede_actualizar_su_usuario()
    {
        $user = User::factory()->create();

        Sanctum::actingAs($user);


        $this->jsonApi()
            ->patch(route('v1.users.update', $user))
            ->assertStatusCode(403);
    }

    /**  @test */
    // usuario puede editar su usuario
    public function un_usuario_puede_editar_su_usuario()
    {
        Permission::create(['guard_name' => 'sanctum', 'name' => 'update:user']);

        $user = User::factory()->create()
            ->givePermissionTo('update:user');

        Sanctum::actingAs($user, ['update:user']);

        $this->jsonApi()
            ->withData([
                'type' => 'users',
                'id' => (string)$user->getRouteKey(),
                'attributes' => [
                    'name' => 'Nombre Actualizado'
                ]
            ])
            ->patch(route('v1.users.update', $user))
            ->assertStatus(200);

        $this->assertDatabaseHas('users', [
            'name'  =>  'Nombre Actualizado',
        ]);
    }

    /**  @test */
    // usuario no puede editar otro usuario
    public function un_usuario_no_puede_editar_otro_usuario()
    {
        Permission::create(['guard_name' => 'sanctum', 'name'=> 'update:user']);

       $other_user=User::factory()->create();

        $user = User::factory()->create()
            ->givePermissionTo('update:user');

        Sanctum::actingAs($user, ['update:user']);

        $this->jsonApi()
            ->withData([
                'type'  => 'users',
                'id'    => (string) $user->getRouteKey(),
                'attributes' => [
                    'name'  =>  'Nombre Actualizado'
                ]
            ])
            ->patch(route('v1.users.update', $other_user))
            ->assertStatus(403);
        $this->assertDatabaseMissing('users', [
            'name'  =>  'Nombre Actualizado',
        ]);
    }

    /**  @test */
    // super Admin puede editar cualquier usuario
    public function super_admin_puede_editar_cualquier_usuario()
    {
        Role::create(['guard_name' => 'sanctum', 'name'=> 'super:admin']);
        $user = User::factory()->create();
        $staff = Staff::factory()->create()
            ->assignRole('super:admin');

        Sanctum::actingAs($staff);

        $this->jsonApi()
            ->withData([
                'type' => 'users',
                'id' => (string)$user->getRouteKey(),
                'attributes' => [
                    'name' => 'Nombre Actualizado'
                ]
            ])
            ->patch(route('v1.users.update', $user))
            ->assertStatus(200);

        $this->assertDatabaseHas('users', [
            'name'  =>  'Nombre Actualizado',
        ]);
    }

}
