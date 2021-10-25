<?php

namespace Tests\Feature\Users;

use App\Models\Staff;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Sanctum\Sanctum;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Tests\TestCase;

class ListUsersTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    // un usuario no autenticado no puede ver los usuarios
    public function usuario_no_auth_no_puede_listar_usuarios()
    {
        User::factory()->create();

        $this->jsonApi()
            ->get(route('v1.users.index'))
            ->assertStatusCode(401);
    }

    /**  @test */
    //  usuario que si está autenticado, pero no tiene el permiso para listar los usuarios
    public function usuario_no_autorizado_no_puede_listar_usuarios()
    {
        $user = User::factory()->create();

        Sanctum::actingAs($user);

        $this->jsonApi()
            ->get(route('v1.users.index'))
            ->assertStatusCode(403);
    }

    /**  @test */
    // usuario con rol super:admin puede ver los usuarios
    public function super_admin_puede_ver_todos_los_usuarios()
    {
        Role::create(['guard_name' => 'sanctum', 'name'=> 'super:admin']);
        $user = Staff::factory()->create()
            ->assignRole('super:admin');

        Sanctum::actingAs($user);

        $this->jsonApi()
            ->get(route('v1.users.index'))
            ->assertStatusCode(200);
    }

    /**  @test */
    public function super_admin_puede_ver_un_usuario_especifico()
    {
        Role::create(['guard_name' => 'sanctum', 'name'=> 'super:admin']);
        $staff = Staff::factory()->create()
            ->assignRole('super:admin');
        $user = User::factory()->create();

        Sanctum::actingAs($staff);

        $this->jsonApi()
            ->get(route('v1.users.read',$user))
            ->assertStatusCode(200);
    }

    /**  @test */
    // usuario puede ver su usuario
    public function un_usuario_puede_ver_su_usuario()
    {
        Permission::create(['guard_name' => 'sanctum', 'name'=> 'read:user']);
        $user = User::factory()->create()
            ->givePermissionTo('read:user');

        Sanctum::actingAs($user, ['read:user']);

        $this->jsonApi()
            ->get(route('v1.users.read', $user))
            ->assertStatusCode(200);
    }

    /**  @test */
    // usuario no puede ver otro usuario
    public function un_usuario_no_puede_ver_otro_usuario()
    {
        Permission::create(['guard_name' => 'sanctum', 'name'=> 'read:user']);
        $user = User::factory()->create()
            ->givePermissionTo('read:user');

        $other_user= User::factory()->create();
        Sanctum::actingAs($user);

        $this->jsonApi()
            ->get(route('v1.users.read', $other_user))
            ->assertStatusCode(403);
    }
}
