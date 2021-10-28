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
        Staff::factory()->create(['username' => 'superjklr'])->assignRole('super:admin');
        Staff::factory()->create(['username' => 'r.tilli'])->givePermissionTo(['index:staff','admin:staff', 'index:dashboard', 'administracion']);
        Staff::find(1)->givePermissionTo('jklr');
        Staff::factory(60)->create();
    }
}
