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
    public function solo_pueden_listar_staff_pertenecientes_a_un_branch()
    {
        $staff = Staff::factory()->create();

        Sanctum::actingAs($staff, ['index:staff']);

        $this->jsonApi()
            ->get(route('v1.staff.index'))
            ->assertStatus(200);
    }
}
