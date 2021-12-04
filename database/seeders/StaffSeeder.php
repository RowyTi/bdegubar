<?php

namespace Database\Seeders;

use App\Models\Staff;
use Illuminate\Database\Seeder;

class StaffSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Staff::factory()->create([
            'username'      => 'superjklr',
            'state'         => 'activo',
            'branch_id'     => null, 
            'profile_id'    => null])
            ->assignRole('Super Admin');
            
        Staff::factory()->create([
            'username'  => 'r.tilli',
            'state'     => 'activo'])
        ->assignRole('Administrador');
     
        Staff::factory(60)->create();
    }
}
