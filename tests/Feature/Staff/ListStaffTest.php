<?php

namespace Tests\Feature\Staff;

use App\Models\Staff;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

class ListStaffTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    // se verifica que un usuario del mismo staff puede ver a otros miembros del staff
    public function solo_pueden_listar_staff_pertenecientes_a_un_mismo_branch()
    {
        $staff = Staff::factory()->create();

        Sanctum::actingAs($staff, ['index:staff']);

        $this->jsonApi()
            ->get(route('v1.staff.index', ['filter[branch_id]=1']))
            ->assertStatus(200);
    }

    /** @test */
    // se verifica que un usuario de una sucursal no pueda ver los empleados de otra sucursal
    public function un_usuario_no_puede_listar_staff_de_otro_branch()
    {
        $staff = Staff::factory()->create();
        Staff::factory(20)->create();

        Sanctum::actingAs($staff, ['index:staff']);

        $this->jsonApi()
            ->get(route('v1.staff.index', ['filter[branch_id]=4']))
            ->assertStatus(403);
    }
    /** @test */
    public function un_usuario_puede_ver_sus_datos(){
        $staff = Staff::factory()->create();

        Sanctum::actingAs($staff, ['read:staff']);

        $this->jsonApi()
            ->get(route('v1.staff.read', $staff))
            ->assertStatus(200);
    }

    /** @test */
    public function un_usuario_no_puede_ver_los_datos_de_otro_usuario(){
        $staff = Staff::factory()->create();

        $other_user = Staff::factory()->create(['id'=>'123']);
        Sanctum::actingAs($staff, ['read:staff']);

        $this->jsonApi()
            ->get(route('v1.staff.read', $other_user))
            ->assertStatus(403);
    }


    /** @test */
    public function un_administrador_de_puede_ver_los_datos_de_sus_empleados(){
        $staff = Staff::factory()->create(); // me logueo como adm
        $staff2 = Staff::factory()->create(['branch_id'=> $staff->branch_id]); // creo otro usuario dentro del branch

        Sanctum::actingAs($staff, ['admin:staff']);

        $this->jsonApi()
            ->get(route('v1.staff.read', $staff2))
            ->assertStatus(200);
    }

    /** @test */
    public function un_administrador_no_puede_ver_los_datos_de_empleados_de_otro_branch(){
        $staff = Staff::factory()->create(); // me logueo como adm
        $staff2 = Staff::factory()->create(); // creo otro usuario de otro branch

        Sanctum::actingAs($staff, ['admin:staff']);

        $this->jsonApi()
            ->get(route('v1.staff.read', $staff2))
            ->assertStatus(403);
    }

    /** @test */
    public function un_administrador_puede_ver_los_empleado_de_su_sucursal(){
        $staff = Staff::factory()->create(); // me logueo como adm
        Staff::factory(20)->create([
            'branch_id' => $staff->branch_id
        ]); // creo otros usuarios de otro branch d
        Sanctum::actingAs($staff, ['admin:staff']);
        $this->jsonApi()
            ->get(route('v1.staff.index', ['filter[branch_id]='.$staff->branch_id]))
            ->assertStatus(200);
    }

    /** @test */
    public function un_administrador_no_puede_ver_los_empleado_de_otra_sucursal(){
        $staff = Staff::factory()->create(); // me logueo como adm
         Staff::factory(20)->create(); // creo otros usuarios de otro branch

        Sanctum::actingAs($staff, ['admin:staff']);

        $this->jsonApi()
            ->get(route('v1.staff.index', ['filter[branch_id]=4']))
            ->assertStatus(403);
    }

}
